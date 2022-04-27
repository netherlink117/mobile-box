<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Detail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'phone_id' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'header_id' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'type' => [
                'type' => 'varchar',
                'constraint' => 16,
            ],
            'price' => [
                'type' => 'float',
            ],
            'quantity' => [
                'type' => 'int',
            ],
        ]);
        $this->forge->addForeignKey('phone_id', 'phones', 'id', 'cascade', 'cascade');
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('details');
    }

    public function down()
    {
        $this->forge->dropTable('details');
    }
}
