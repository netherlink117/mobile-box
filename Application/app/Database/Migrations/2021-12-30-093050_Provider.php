<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Provider extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 16,
            ],
            'contact' => [
                'type' => 'varchar',
                'constraint' => 32,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('providers');
    }

    public function down()
    {
        $this->forge->dropTable('providers');
    }
}
