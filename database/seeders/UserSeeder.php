<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ],
            [
                'email' => 'intania@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'customer'
            ],
            [
                'email' => 'mentari@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'customer'
            ],
            [
                'email' => 'mustika@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'customer'
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
