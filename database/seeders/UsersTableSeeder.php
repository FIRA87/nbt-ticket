<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::Table('users')->insert([
            // Admin
            [
                'name' => 'Администратор',
                'username' => 'admin',
                'email ' => 'olimov.88@inbox.ru',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
                'status' => 'active',
            ],

            // manager
            [
                'name' => 'Менаджер',
                'username' => 'manager',
                'email ' => 'user@user.com',
                'password' => Hash::make('123456789'),
                'role' => 'manager',
                'status' => 'active',
            ],

            // user

            [
                'name' => 'Мониторинг',
                'username' => 'user',
                'email ' => 'user1@user.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'status' => 'active',
            ],


        ]);


    }



}
