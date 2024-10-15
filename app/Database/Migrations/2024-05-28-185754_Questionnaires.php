<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Questionnaires extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'questionnaire_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            
            'discipline_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('discipline_id', 'disciplines', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('questionnaires');
    }

    public function down()
    {
        $this->forge->dropTable('questionnaires');
    }
}
