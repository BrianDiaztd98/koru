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
        User::query()->updateOrCreate(
            ['email' => 'info@korucenter.com'],
            [
                'primer_nombre' => 'KORU',
                'segundo_nombre' => 'CMS',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
                'role' => 'admin',
                'status' => 'activo',
                'email_verified_at' => now(),
            ],
        );
    }
}
