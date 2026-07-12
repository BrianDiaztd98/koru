<?php

namespace Tests\Feature;

use App\Livewire\Admin\Auth\ForgotPassword;
use App\Livewire\Admin\Auth\ResetPassword;
use App\Models\User;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Livewire\Livewire;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_forgot_password_page_renders(): void
    {
        $this->get(route('admin.password.request'))
            ->assertStatus(200)
            ->assertSee('Recover access');
    }

    public function test_forgot_password_sends_link_for_existing_admin(): void
    {
        Notification::fake();

        $user = User::factory()->admin()->create(['email' => 'admin@koru.center']);

        Livewire::test(ForgotPassword::class)
            ->set('email', 'admin@koru.center')
            ->call('sendResetLink')
            ->assertHasNoErrors()
            ->assertSet('sent', true);

        Notification::assertSentTo($user, AdminResetPasswordNotification::class);
    }

    public function test_forgot_password_rejects_unknown_email(): void
    {
        Notification::fake();

        Livewire::test(ForgotPassword::class)
            ->set('email', 'ghost@koru.center')
            ->call('sendResetLink')
            ->assertHasErrors('email')
            ->assertSet('sent', false);

        Notification::assertNothingSent();
    }

    public function test_forgot_password_rejects_non_admin_account(): void
    {
        Notification::fake();

        User::factory()->create(['email' => 'client@koru.center', 'is_admin' => false]);

        Livewire::test(ForgotPassword::class)
            ->set('email', 'client@koru.center')
            ->call('sendResetLink')
            ->assertHasErrors('email')
            ->assertSet('sent', false);

        Notification::assertNothingSent();
    }

    public function test_reset_password_page_renders(): void
    {
        $user = User::factory()->admin()->create();
        $token = Password::createToken($user);

        $this->get(route('admin.password.reset', ['token' => $token, 'email' => $user->email]))
            ->assertStatus(200)
            ->assertSee('New password');
    }

    public function test_reset_password_updates_credentials_and_allows_login(): void
    {
        $user = User::factory()->admin()->create(['email' => 'admin@koru.center']);
        $token = Password::createToken($user);

        Livewire::test(ResetPassword::class, ['token' => $token])
            ->set('email', 'admin@koru.center')
            ->set('password', 'N3wS3cret!')
            ->set('password_confirmation', 'N3wS3cret!')
            ->call('resetPassword')
            ->assertHasNoErrors();

        $this->assertTrue(
            auth()->guard('web')->attempt(['email' => 'admin@koru.center', 'password' => 'N3wS3cret!']),
            'The user should be able to log in with the new password.'
        );

        // The token should have been consumed (deleted from the table).
        $this->assertDatabaseMissing('password_reset_tokens', ['email' => 'admin@koru.center']);
    }

    public function test_reset_password_rejects_invalid_token(): void
    {
        $user = User::factory()->admin()->create(['email' => 'admin@koru.center']);

        Livewire::test(ResetPassword::class, ['token' => 'invalid-token'])
            ->set('email', 'admin@koru.center')
            ->set('password', 'N3wS3cret!')
            ->set('password_confirmation', 'N3wS3cret!')
            ->call('resetPassword')
            ->assertHasErrors('email');
    }

    public function test_reset_notification_includes_username(): void
    {
        Notification::fake();

        $user = User::factory()->admin()->create([
            'name' => 'Dr. Koru',
            'email' => 'admin@koru.center',
        ]);

        Password::sendResetLink(['email' => $user->email]);

        Notification::assertSentTo($user, AdminResetPasswordNotification::class, function ($notification, $channels, $notifiable) {
            $mail = $notification->toMail($notifiable);

            // The username must appear explicitly in the email.
            $rendered = $mail->render();

            return str_contains($rendered, 'Dr. Koru');
        });
    }
}
