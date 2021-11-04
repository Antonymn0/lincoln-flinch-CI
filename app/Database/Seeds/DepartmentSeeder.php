<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id');
        for ($i = 0; $i < 10; $i++) { 
            $model = model('DepartmentModel');
            $model->insert([
                'department_name'=> $faker->name,
                'manager'=> $faker->name,
                'number_of_staff'=> $faker->phoneNumber,
                'deleted_at'=> null,
            ]);
        }
    }
}
