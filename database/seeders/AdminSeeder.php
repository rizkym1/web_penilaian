<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Membuat akun admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'), // Ganti dengan password yang lebih aman
            'role' => 'guru',  // Atau admin sesuai kebutuhan
        ]);
    }
}
