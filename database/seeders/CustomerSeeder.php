<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'user_id' => 2,
                'name' => 'Intania',
                'address' => 'Bali, Indonesia, Bumi, Galaksi Andromeda',
                'phone' => '08732822738292',
                'sim_card' => '8137399-13791291-87328392'
            ],
            [
                'user_id' => 3,
                'name' => 'Mentari',
                'address' => 'Bali, Indonesia, Bumi, Galaksi Andromeda',
                'phone' => '08732842738292',
                'sim_card' => '8137399-13791271-87328392'
            ],
            [
                'user_id' => 4,
                'name' => 'Mustika',
                'address' => 'Bali, Indonesia, Bumi, Galaksi Andromeda',
                'phone' => '08732822738392',
                'sim_card' => '8137309-13791291-87328392'
            ],
        ];

        foreach($customers as $customer){
            Customer::create($customer);
        }
    }
}
