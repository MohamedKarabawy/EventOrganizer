<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@admin.cc',
            'phone_number' => '010034616411',
            'password' => Hash::make('admin1234')
        ]);
    }
}
