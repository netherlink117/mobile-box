<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'provider_id' => [
                'type' => 'varchar',
                'unsigned' => true,
            ],
            'date' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'total' => [
                'type' => 'float',
            ],
        ]);
        $this->forge->addForeignKey('provider_id', 'providers', 'id', 'cascade', 'cascade');
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
