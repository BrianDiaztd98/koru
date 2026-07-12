<?php

namespace App\Models;

use App\Notifications\AdminResetPasswordNotification;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Password;

#[Fillable(['primer_nombre', 'segundo_nombre', 'email', 'password', 'status', 'creator_id', 'role', 'is_admin'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'status' => 'string',
        ];
    }

    /**
     * Get the user's full name.
     */
    public function getNameAttribute(): string
    {
        return trim("{$this->primer_nombre} {$this->segundo_nombre}");
    }

    /**
     * Set the user's full name (for backward compatibility).
     */
    public function setNameAttribute(string $value): void
    {
        $parts = explode(' ', trim($value), 2);
        $this->primer_nombre = $parts[0] ?? '';
        $this->segundo_nombre = $parts[1] ?? null;
    }

    /**
     * Get the user that created this user (audit trail).
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Get the users created by this user.
     */
    public function createdUsers(): HasMany
    {
        return $this->hasMany(User::class, 'creator_id');
    }

    /**
     * Check if the user is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'activo';
    }

    /**
     * Check if the user has a specific role.
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Check if the user is an admin (backward compatibility with is_admin).
     */
    public function isAdmin(): bool
    {
        return $this->is_admin || $this->role === 'admin';
    }

    /**
     * Send the password reset notification using the Koru-branded mail.
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    /**
     * Get the validation rules for password.
     */
    public static function passwordRules(): array
    {
        return [
            'required',
            'string',
            'confirmed',
            Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(),
        ];
    }

    /**
     * Get the password validation rules for login (without confirmed).
     */
    public static function loginPasswordRules(): array
    {
        return [
            'required',
            'string',
            Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(),
        ];
    }
}
