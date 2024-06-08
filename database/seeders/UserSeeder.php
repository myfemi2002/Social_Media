<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin 
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'adminlord@admin.com',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
                'status' => '1',
            ],
                // Instructor 
            [
                'name' => 'Instructor',
                'username' => 'instructor',
                'email' => 'instructor@admin.com',
                'password' => Hash::make('password'),
                'role' => 'instructor',
                'status' => '1',
            ],
                // User Data 
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@admin.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => '1',
            ], 

            // [
            //     'name' => Str::random(10),
            //     'email' => Str::random(10).'@admin.com',
            //     'password' => Hash::make('password'),
            //     'role' => 'user',
            //     'status' => '1',
            // ],

        ]);
    }
}
