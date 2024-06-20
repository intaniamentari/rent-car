<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'user_id' => 1,
            'name' => 'Admin',
            'phone' => '0862982738292',
            'address' => 'Bali, Indonesia, Bumi, Galaksi Andromeda'
        ];

        Admin::create($admin);
    }
}
