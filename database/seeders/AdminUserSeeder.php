<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $email = (string) env('ADMIN_EMAIL', 'admin@korucenter.com');
        $password = (string) env('ADMIN_PASSWORD', 'KoruCenter2026!');

        User::query()->updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Koru Admin',
                'password' => Hash::make($password),
                'is_admin' => true,
                'email_verified_at' => now(),
            ],
        );
    }
}
