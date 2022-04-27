<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reference extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'phone_id' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'provider_id' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'price' => [
                'type' => 'float',
            ],
        ]);
        $this->forge->addForeignKey('phone_id', 'phones', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('provider_id', 'providers', 'id', 'cascade', 'cascade');
        $this->forge->addKey('phone_id');
        $this->forge->addKey('provider_id');
        $this->forge->createTable('references');
    }

    public function down()
    {
        $this->forge->dropTable('references');
    }
}
