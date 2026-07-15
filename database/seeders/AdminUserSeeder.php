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
            ['email' => 'dessingertd@gmail.com'],
            [
                'primer_nombre' => 'Brian',
                'segundo_nombre' => 'Diaz',
                'password' => Hash::make('AdminPass123!'),
                'is_admin' => true,
                'role' => 'admin',
                'status' => 'activo',
                'email_verified_at' => now(),
            ],
        );
    }
}
