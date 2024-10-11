<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@bank.co.id',
            'email_verified_at' => now(),
            'cabang_id' => 1,
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}
