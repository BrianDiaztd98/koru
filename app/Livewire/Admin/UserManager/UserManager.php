<?php

namespace App\Livewire\Admin\UserManager;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\WithPagination;

class UserManager extends Component
{
    use WithPagination;

    public ?User $user = null;

    public string $primer_nombre = '';

    public string $segundo_nombre = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $status = 'activo';

    public string $role = 'admin';

    public bool $showForm = false;

    public bool $isEdit = false;

    protected function rules(): array
    {
        $rules = [
            'primer_nombre' => ['required', 'string', 'max:100'],
            'segundo_nombre' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'status' => ['required', 'in:activo,inactivo'],
            'role' => ['required', 'string', 'in:admin'],
        ];

        if ($this->isEdit) {
            $rules['email'][] = 'unique:users,email,'.$this->user->id;
            $rules['password'] = ['nullable', 'string', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()];
        } else {
            $rules['email'][] = 'unique:users,email';
            $rules['password'] = ['required', 'string', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()];
        }

        return $rules;
    }

    public function mount(?User $user = null): void
    {
        $this->user = $user;
        $this->isEdit = $user !== null;
        $this->showForm = request()->routeIs('admin.users.create') || request()->routeIs('admin.users.edit');

        if ($this->user) {
            $this->fill([
                'primer_nombre' => $this->user->primer_nombre ?? '',
                'segundo_nombre' => $this->user->segundo_nombre ?? '',
                'email' => $this->user->email ?? '',
                'status' => $this->user->status ?? 'activo',
                'role' => $this->user->role ?? 'admin',
            ]);
        }
    }

    public function openCreateForm(): void
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function openEditForm(int $userId): void
    {
        $user = User::findOrFail($userId);
        $this->user = $user;
        $this->isEdit = true;
        $this->fill([
            'primer_nombre' => $user->primer_nombre ?? '',
            'segundo_nombre' => $user->segundo_nombre ?? '',
            'email' => $user->email ?? '',
            'status' => $user->status ?? 'activo',
            'role' => $user->role ?? 'admin',
        ]);
        $this->showForm = true;
    }

    public function closeForm(): void
    {
        $this->resetForm();

        if (request()->routeIs('admin.users.create') || request()->routeIs('admin.users.edit')) {
            $this->redirectRoute('admin.users.index');
        }
    }

    public function save(): void
    {
        $validated = $this->validate();

        // Set creator_id to current authenticated user
        $validated['creator_id'] = auth()->id();

        if ($this->user && $this->user->exists) {
            // Don't update password if not provided
            if (empty($validated['password'])) {
                unset($validated['password'], $validated['password_confirmation']);
            }
            $this->user->update($validated);
            session()->flash('success', 'Usuario actualizado correctamente.');
        } else {
            User::query()->create($validated);
            session()->flash('success', 'Usuario creado correctamente.');
        }

        $this->closeForm();
    }

    public function toggleStatus(int $userId): void
    {
        $user = User::findOrFail($userId);

        // Prevent deactivating yourself
        if ($user->id === auth()->id()) {
            session()->flash('error', 'No puedes desactivar tu propia cuenta.');

            return;
        }

        $newStatus = $user->status === 'activo' ? 'inactivo' : 'activo';
        $user->update(['status' => $newStatus]);

        session()->flash('success', "Usuario {$newStatus} correctamente.");
    }

    public function resetForm(): void
    {
        $this->user = null;
        $this->isEdit = false;
        $this->primer_nombre = '';
        $this->segundo_nombre = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->status = 'activo';
        $this->role = 'admin';
        $this->showForm = false;
    }

    public function render(): View
    {
        return view('livewire.admin.user-manager.user-manager-page', [
            'users' => User::query()
                ->with('creator')
                ->orderByDesc('id')
                ->paginate(15),
        ])
            ->layout('components.layouts.admin');
    }
}
