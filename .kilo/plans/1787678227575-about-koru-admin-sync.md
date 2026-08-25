# Plan: Sincronizar About KORU — Admin vs Vista Pública

## Hallazgos

La sección **About KORU** tiene desajustes entre el panel administrativo (`AboutPageManager`) y la vista pública (`about-us.blade.php`):

| Campo / Sección | Vista Pública | Admin Actual | Estado |
|---|---|---|---|
| `title` | Sí | Sí | OK |
| `subtitle` | Sí | Sí | OK |
| `description` | Sí | Sí | OK |
| `philosophy` | Sí | Sí | OK |
| `vision` | Sí | Sí | Etiqueta confusa ("System Vision") |
| `mission` | Sí | **No** | FALTA |
| `image_1`, `image_2`, `image_3` | Sí | Sí | OK |
| `image_4` | Sí | **No** | FALTA |
| Tagline "PAIN FREE, BETTER LIFE." | Hardcode | N/A | No gestionable |
| "KORU at a glance" (6 artículos) | Hardcode | **No** | No gestionable |
| `feature_1/feature_2` | **No** | Sí | Código muerto en público |

**Conclusión:** El admin NO está completo ni coincide con la vista pública. Faltan `mission`, `image_4` y los 6 artículos de "KORU at a glance" no son editables.

## Decisión de Diseño

1. **Agregar `mission` y `image_4`** a la tabla `abouts`, modelo, admin, seeder y factory.
2. **Crear tabla relacionada `about_glance_items`** para los 6 artículos de "KORU at a glance" (consistentes con el patrón de `hero_slides`, `team_members`, etc.).
3. **Eliminar del admin** los campos `feature_1/feature_2` (no se usan en público) — se mantienen en BD por backward compatibility, pero dejan de editarse.
4. **Renombrar en admin** la etiqueta `vision` a "Misión / Visión" para alinear semantics con el público.
5. **Actualizar la vista pública** para consumir `glance_items` desde BD en vez de hardcode.

## Tareas

### 1. Migraciones
- Agregar a `abouts`: `mission` (text, nullable) e `image_4` (string, nullable).
- Crear migración nueva `create_about_glance_items_table`:
  - `id`, `about_id` (FK a `abouts`), `order` (integer), `title` (string 80), `description` (text 500), `timestamps`.
  - Índice en `about_id` + `order`.

### 2. Modelos
- `About`:
  - Agregar `mission`, `image_4` a `$fillable`.
  - Agregar `getImage4UrlAttribute()`.
  - Agregar relación `glanceItems()` → `hasMany(AboutGlanceItem::class)`.
  - Actualizar `getAboutData()` para incluir `glance_items` eager-loaded.
- Nuevo `AboutGlanceItem`:
  - `$fillable`: `about_id`, `order`, `title`, `description`.
  - Relación `about()` → `belongsTo(About::class)`.

### 3. Admin — Componente `AboutPageManager`
- Propiedades nuevas:
  - `?string $mission`
  - `?TemporaryUploadedFile $image_4`
  - `array $glanceItems = []` (colección Livewire para los 6 artículos)
- En `mount()`:
  - Cargar `mission` desde `About`.
  - Cargar colección de `AboutGlanceItem` ordenada por `order`.
- En `rules()`:
  - Agregar reglas para `mission`, `image_4`.
  - Eliminar reglas de `feature_1/feature_2`.
- En `save()`:
  - Incluir `mission` en `$data`.
  - Procesar `image_4` con `handleUploadedImages`.
  - Sincronizar `AboutGlanceItem`: eliminar los que ya no estén en `$glanceItems`, crear/actualizar los nuevos, respetando `order`.
- En `deleteConfirmed()`:
  - Eliminar también `glance_items` asociados (o confiar en FK con `onDelete('cascade')`).
- Nuevos métodos:
  - `addGlanceItem()`
  - `removeGlanceItem(int $index)`
- Remover propiedades y lógica de `feature_1/feature_2`.

### 4. Admin — Vista `about-section-create-form.blade.php`
- **Tab Copy:**
  - Reemplazar campo "System Vision" por label "Misión / Visión" (campo `vision`).
  - Agregar textarea `mission`.
- **Tab Media:**
  - Agregar upload slot `image_4` (Slot D).
- **Tab Features:**
  - Reemplazar "Feature Module 01/02" por nueva sección **"KORU at a glance"** con lista dinámica de 6 items (cada uno con título + descripción, campos `order`, título, descripción).
  - Botones para agregar/eliminar items.
- Remover todo rastro de `feature_1/feature_2`.

### 5. Seeder y Factory
- `AboutSeeder`:
  - Agregar `mission` e `image_4` con valores de ejemplo.
  - Después de crear `About`, crear 6 `AboutGlanceItem` con los textos hardcodeados actuales del público.
- `AboutFactory`:
  - Agregar `mission` e `image_4`.
  - Crear estado/factory para `AboutGlanceItem` con 6 items por defecto.

### 6. Vista Pública `about-us.blade.php`
- Reemplazar bloque hardcodeado de "KORU at a glance" por bucle sobre `$aboutData['glance_items']` (o mantener fallback con los 6 textos actuales si está vacío).
- Reemplazar `image_4` hardcodeada por `$aboutData['image_4']`.
- Usar `$aboutData['mission']` (ya existe, solo asegurar que llegue desde BD).

### 7. Pruebas
- `AboutPageTest.php`:
  - Actualizar aserciones de actualización para incluir `mission` y `image_4`.
  - Remover aserciones de `feature_1/feature_2`.
  - Agregar test: al guardar, se crean 6 `AboutGlanceItem` por defecto.
  - Agregar test: se pueden agregar/eliminar items de glance y persisten.
- `AboutPageSimpleTest.php`:
  - Mantener test simple; asegurar que sigue pasando con nueva estructura.

### 8. Validación Manual
- Verificar que la sección admin carga, edita y guarda correctamente.
- Verificar que la landing page muestra el contenido actualizado.
- Ejecutar: `php artisan test --compact tests/Feature/AboutPageTest.php tests/Feature/AboutPageSimpleTest.php`

## Riesgos
- Si `About::getAboutData()` no incluye `glance_items`, la vista pública caerá al fallback hardcodeado. Se mitigará actualizando el método para eager-load y devolver los items como array.
- Migración `image_4` no afecta registros existentes (nullable).
- `feature_1/feature_2` se mantienen en BD por seguridad, pero dejan de usarse.
