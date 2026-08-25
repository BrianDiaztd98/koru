# Plan: Rediseño y evolución de KORU

> Plan verificado contra el código existente el 17 de agosto de 2026.

## Contexto

- Aplicación: Laravel 13, Livewire 4, Flux UI v2 y Tailwind v4.
- Landing pública: `resources/views/livewire/pages/landing-page.blade.php`.
- Administración: componentes Livewire bajo `app/Livewire/Admin`.
- Decisiones de producto:
  - CE funciona inicialmente como formulario de inscripción, sin pasarela de pago.
  - Las reseñas se cargan manualmente desde administración.
  - `medical_services` no se muestra en la landing pública.
  - KORU at Home muestra `Price may vary.`.

## Fase 1: Landing pública

### Marca y estructura

- [x] Hacer que el primer Hero presente quién es KORU y qué hace antes de mostrar servicios.
- [x] Cambiar el CTA inicial a `Learn About KORU` y dejar el contacto como acción secundaria.
- [x] Hacer explícitos en About los seis ejes: quiénes somos, qué hacemos, para quién trabajamos, cómo trabajamos, qué nos diferencia y qué representa KORU.
- [x] Eliminar `wire:lazy.1s` de About.
- [x] Justificar los textos de About y añadir el párrafo de misión.
- [x] Convertir la galería de About a un grid 2x2 con cuatro imágenes.
- [x] Eliminar Experience KORU, `VideoModal` y sus referencias.

### Servicios y paquetes

- [x] Ocultar `medical_services` del listado público.
- [x] Mostrar `Price may vary.` para KORU at Home.
- [x] Unificar IV Therapy y Booster Shots en `IvTherapy`, con menú a la izquierda y detalle a la derecha.
- [x] Retirar los componentes antiguos de IV y boosters.
- [x] Ajustar el CTA principal de paquetes a `Buy a Package`.
- [x] Eliminar `Read More` y mostrar el contenido completo de los paquetes.

### Contenido y presentación

- [x] Aplicar `text-justify` en Services, IV Therapy, Packages, Education y Team.
- [x] Ajustar el estado vacío de Education sin CTA de WhatsApp.
- [x] Actualizar Testimonials para usar contenido administrable.
- [x] Ajustar textos, email y layout del footer.

### Validación

- [x] Validar la landing pública con los tests relevantes.
- [x] Validar que IV y Booster Shots se muestran juntos con `tests/Feature/IvTherapyShowcaseTest.php`.
- [x] Sembrar y validar el Hero institucional con `tests/Unit/HeroSlideTest.php`.
- [x] Confirmar que no quedan referencias a Experience KORU ni a los componentes eliminados.

## Fase 2: Administración de contenido

### Reseñas Google

- [x] Crear `GoogleReview` y su migración.
  - Campos: `author_name`, `author_role`, `rating`, `content`, `image_path`, `sort_order`, `is_active`.
- [x] Crear `GoogleReviewManager` con creación, edición, activación, ocultación y eliminación.
- [x] Registrar rutas administrativas de reseñas.
- [x] Añadir Google Reviews al sidebar administrativo.
- [x] Conectar las reseñas activas con el showcase público.
- [x] Validar el flujo con `tests/Feature/GoogleReviewManagementTest.php`.

### Cursos CE

- [x] Crear `CourseEnrollment` y su migración.
- [x] Crear `EducationBoardManager` para crear, editar, publicar, ocultar y eliminar cursos.
- [x] Mostrar las inscripciones existentes en el panel administrativo.
- [x] Registrar rutas administrativas de educación.
- [x] Añadir CE Courses al sidebar administrativo.

## Fase 3: Inscripción pública CE

- [x] Crear el componente Livewire público para inscribirse a un curso.
- [x] Añadir el formulario a la sección Education cuando existan cursos activos.
- [x] Validar nombre, email, teléfono y curso seleccionado.
- [x] Guardar la inscripción en `course_enrollments`.
- [x] Enviar notificación por email al centro.
- [x] Enviar el correo inmediatamente, sin depender de `php artisan queue:work`.
- [x] Mostrar estados de éxito y errores sin abandonar la landing.
- [x] Añadir tests de validación, persistencia y notificación.
- [x] Añadir número de licencia obligatorio con formato `MA` + 5 dígitos y mostrarlo en admin/email.
- [ ] Integrar pago online cuando KORU defina el proveedor.

## Mejoras posteriores recomendadas

- [ ] Añadir imagen del autor desde administración para reseñas.
- [ ] Añadir filtros y paginación al listado de reseñas e inscripciones.
- [ ] Añadir protección anti-spam al formulario público CE.
- [ ] Añadir estado de seguimiento a las inscripciones: nueva, contactada, confirmada y cerrada.
- [ ] Ejecutar la suite completa después de integrar la inscripción pública.

## Estado general

- Landing pública: **completada**.
- Base administrativa de reseñas: **completada y validada**.
- Base administrativa de cursos CE: **completada**.
- Inscripción pública CE: **completada**.
- Número de licencia CE: **completado y validado**.
- Entrega real de email CE: **pendiente de una API key válida de Resend**.