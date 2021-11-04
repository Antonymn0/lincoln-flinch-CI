<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Work extends Migration
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
            'shift_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                ],
            'employee_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                ],
            'remarks' => [
                'type' => 'TEXT',
                'constraint' => 255,
                'null'=> true,
                ],
            'shift_rules' => [
                'type' => 'TEXT',
                'constraint' => 255,
                'null'=> true,
                ],
            'suspended_by' => [
                'type' => 'INT',
                'constraint' => 5,
                'null'=> true,
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
         $this->forge->createTable('work', true);
    }

    public function down()
    {
        $this->forge->dropTable('work');
    }

}
