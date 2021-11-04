<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Department extends Migration
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
            'department_name' => [ 
                'type' => 'VARCHAR',
                'constraint'     => 255,
                ],
            'manager' => [ 
                'type' => 'VARCHAR',
                'constraint'     => 255,
                ],
            'number_of_staff' => [ 
                'type' => 'INT',
                'constraint'     => 5,
                ],
                 'deleted_at' => [
                'type' => 'timestamp',
                'constraint' => 6,
                'null' => true,
                ],
            'deleted_by' => [
                'type' => 'INT',
                'constraint' => 5,
                'null'=> true,
                ],
         ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('departments', true);
    }

    public function down()
    {
        $this->forge->dropTable('departments');
    }
}
