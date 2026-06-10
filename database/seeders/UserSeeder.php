<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat 1 akun
        User::create([
            'name' => 'Admin Myteam',
            'email' => 'admin@myteam.com',
            'password' => Hash::make('admin123')
        ]);
    }
}