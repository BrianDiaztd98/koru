<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('components.layouts.admin-auth')]
class ResetPassword extends Component
{
    #[Url]
    public string $email = '';

    public string $token = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function mount(string $token, ?string $email = null): void
    {
        $this->token = $token;

        if ($email !== null) {
            $this->email = $email;
        }
    }

    protected function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email', 'max:255'],
            'password' => User::passwordRules(),
            'password_confirmation' => ['required', 'string'],
        ];
    }

    /**
     * Reset the user's password through the native Laravel broker.
     */
    public function resetPassword(): void
    {
        $validated = $this->validate();

        $status = Password::reset(
            [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'password_confirmation' => $validated['password_confirmation'],
                'token' => $validated['token'],
            ],
            function (User $user, string $password): void {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => null,
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('status', 'Your password has been reset successfully. You can now log in.');

            $this->redirect(route('admin.login'), navigate: true);

            return;
        }

        $this->addError('email', match ($status) {
            Password::INVALID_USER => 'We couldn\'t find an account with that email address.',
            Password::INVALID_TOKEN => 'The reset link is invalid or has expired.',
            default => 'We couldn\'t reset the password. Please try again.',
        });
    }

    public function render()
    {
        return view('livewire.admin.auth.reset-password');
    }
}
