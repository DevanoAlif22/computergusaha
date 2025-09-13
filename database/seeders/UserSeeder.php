<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin OTW',
            'email' => 'admin@gusaha.id',
            'password' => Hash::make('password123'),
        ]);
    }
}
