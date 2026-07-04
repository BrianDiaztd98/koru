<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function login(): void
    {
        $validated = $this->validate();

        if (! Auth::guard('web')->attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ], $this->remember)) {
            $this->addError('', 'The provided credentials do not match an admin account.');

            return;
        }

        if (! Auth::user()->is_admin) {
            Auth::logout();

            $this->addError('', 'This account is not authorized for the admin dashboard.');

            return;
        }

        $this->redirect(route('admin.management.index'));
    }

    public function render()
    {
        return view('livewire.admin.auth.login')
            ->layout('components.layouts.admin-auth');
    }
}
