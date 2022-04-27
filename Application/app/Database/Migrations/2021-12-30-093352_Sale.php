<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sale extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'date' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'total' => [
                'type' => 'float',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('sales');
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
