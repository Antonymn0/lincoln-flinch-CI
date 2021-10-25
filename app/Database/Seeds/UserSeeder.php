<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) { 
            $model = model('UserModel');
            $model->insert([
                'name'=> static::faker()->name,
                'email'=> static::faker()->email,
                'status'=> static::faker()->randomElement(['complete', 'pending']),
                'password'=> static::faker()->password,
                'deleted_at'=> null,
            ]);
        }
    }
}
