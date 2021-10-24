<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = model('UserModel');
        $model->insert([
            'name'=> static::faker()->name,
            'email'=> static::faker()->email,
            'password'=> static::faker()->password,
            'deleted_at'=> date(date("Y/m/d")),
        ]);
    }
}
