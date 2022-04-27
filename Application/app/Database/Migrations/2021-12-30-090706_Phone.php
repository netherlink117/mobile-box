<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Phone extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'brand' => [
                'type' => 'varchar',
                'constraint' => 16
            ],
            'model' => [
                'type' => 'varchar',
                'constraint' => 16
            ],
            'description' => [
                'type' => 'varchar',
                'constraint' => 64
            ],
            'cores' => [
                'type' => 'int',
            ],
            'ram' => [
                'type' => 'int',
            ],
            'battery' => [
                'type' => 'int',
            ],
            'price' => [
                'type' => 'float',
            ],
            'stock' => [
                'type' => 'int',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('phones');
    }

    public function down()
    {
        $this->forge->dropTable('phones');
    }
}
