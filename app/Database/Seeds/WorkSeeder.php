<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class WorkSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id');
        for ($i = 0; $i < 10; $i++) { 
            $model = model('WorkModel');
            $model->insert([
                'shift_name'=> $faker->name,
                'employee_id'=> $faker->phoneNumber,
                'status'=> $faker->randomElement(['active', 'ended']),
                'remarks'=> $faker->randomElement(['remarks', 'description']),'status'=> $faker->randomElement(['complete', 'pending']),
                'shift_rules'=> $faker->name,
                'deleted_at'=> null,
            ]);
        }
    }
}
