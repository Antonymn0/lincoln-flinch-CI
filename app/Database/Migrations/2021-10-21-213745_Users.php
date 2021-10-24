<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        
        $this->forge->addField([
            'id' => [ 
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
                ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                ],
            'created_at' => [
                'type' => 'timestamp',
                'constraint' => 6,
                ],
            'updated_at' => [
                'type' => 'timestamp',
                'constraint' => 6,
                ],
            'deleted_at' => [
                'type' => 'timestamp',
                'constraint' => 6,
                'null' => true,
                ],
        ]);
         $this->forge->addKey('id', true);

        $this->forge->createTable('users', true); 

       
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
