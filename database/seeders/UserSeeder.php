<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'nom_prenom' => 'Zongo Arlette',
                'email' => 'arlette@gmail.com',
                'email_verified_at' => now(),
                'password' => 'password',
                'remember_token' => Str::random(10),
                'role' => 'admin',
            ]
        );

        User::create(
            [
                'nom_prenom' => 'SABIDANI Elisee',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => 'password',
                'remember_token' => Str::random(10),
                'role' => 'admin',
            ]
        );

        User::create(
            [
                'nom_prenom' => 'Ouedraogo Jean',
                'email' => 'jean@gmail.com',
                'email_verified_at' => now(),
                'password' => 'password',
                'role' => 'user',
                'remember_token' => Str::random(10),
            ]
        );

        User::create(
            [
                'nom_prenom' => 'Kafando Rose',
                'email' => 'rose@gmail.com',
                'email_verified_at' => now(),
                'password' => 'password',
                'remember_token' => Str::random(10),
                'role' => 'user',
            ]
        );
    }
}
