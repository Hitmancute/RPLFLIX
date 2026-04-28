<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'        =>  'Hitmancute',
            'gender'      =>  'male',
            'email'       =>  'hitmancute@admin.com',
            'password'    =>  Hash::make('admin123'),
            'role'        =>  'admin',
        ]);

        User::create([
            'name'        =>  'guest123',
            'gender'      =>  'male',
            'email'       =>  'hitmancute@gmail.com',
            'password'    =>  Hash::make('member123'),
            'role'        =>  'member',
        ]);
    }
}
