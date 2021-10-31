<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) { 
            $model = model('UserModel');
            $model->insert([
                'name'=> $faker->name,
                'email'=> $faker->email,
                'phone'=> $faker->phoneNumber,
                'file_type'=> $faker->randomElement(['jpj', 'png']),
                'file'=> 'https://images.unsplash.com/photo-1491484925566-336b202157a5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80',
                'status'=> $faker->randomElement(['complete', 'pending']),
                'password'=> $faker->password,
                'deleted_at'=> null,
            ]);
        }
    }
}
