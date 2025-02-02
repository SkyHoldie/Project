<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role; // Tambahkan ini untuk menggunakan role

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Membuat pengguna admin
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), // Ubah sesuai kebutuhan
            'role' =>'admin' // Ubah sesuai kebutuhan
        ]);

        // Pastikan role 'admin' sudah ada atau buat role baru
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
      // Debug untuk memastikan role admin sudah ada

        // Menugaskan peran 'admin' ke pengguna
        $user->assignRole($adminRole);

        // Debug untuk memastikan apakah role berhasil ditugaskan
        
    }
}
