<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordResetLinkSent;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin-auth')]
class ForgotPassword extends Component
{
    public string $email = '';

    public bool $sent = false;

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
        ];
    }

    /**
     * Send the password reset link through the native Laravel broker (Resend).
     */
    public function sendResetLink(): void
    {
        $validated = $this->validate();

        // Validar en PostgreSQL que la cuenta exista y sea de administrador.
        $user = User::query()
            ->where('email', $validated['email'])
            ->first();

        if (! $user instanceof User || ! $user->is_admin) {
            $this->addError('email', 'We couldn\'t find an admin account associated with that email.');

            return;
        }

        $status = Password::sendResetLink(['email' => $validated['email']]);

        if ($status === Password::RESET_LINK_SENT) {
            event(new PasswordResetLinkSent($user));

            $this->sent = true;

            return;
        }

        $this->addError('email', 'We couldn\'t send the recovery link. Please try again.');
    }

    public function render()
    {
        return view('livewire.admin.auth.forgot-password');
    }
}
