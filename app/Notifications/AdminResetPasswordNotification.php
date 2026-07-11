<?php

namespace App\Notifications;

use App\Mail\AdminResetPasswordMail;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword as BaseResetPassword;

class AdminResetPasswordNotification extends BaseResetPassword
{
    public function __construct(#[\SensitiveParameter] string $token)
    {
        parent::__construct($token);
    }

    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(mixed $notifiable): AdminResetPasswordMail
    {
        /** @var User $notifiable */
        $username = $notifiable->name;
        $resetUrl = $this->resetUrl($notifiable);
        $expireMinutes = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        $toEmail = $notifiable->getEmailForPasswordReset();

        return new AdminResetPasswordMail($username, $resetUrl, $expireMinutes, $toEmail);
    }

    protected function resetUrl(mixed $notifiable): string
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        }

        return url(route('admin.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }
}
