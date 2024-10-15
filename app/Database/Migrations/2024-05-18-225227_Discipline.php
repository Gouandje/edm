<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Discipline extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT', 
                'constraint' =>11, 
                'unsigned' =>TRUE, 
                'auto_increment'=>TRUE
            ],
            'nom' => [
                'type' => 'VARCHAR',
                 'constraint'=> 200,
                 'null'=>FALSE
            ],
            'coeficient' => [
                'type' => 'INT',
                 'constraint'=> 200,
                 'null'=>FALSE
                ],

            'status' => [
                'type' => 'VARCHAR', 
                'constraint'=> 200,
                'default' => 'inactif',
                'null'=>TRUE
            ],
            
            'created_at' => [
                'type'=>'DATETIME',
                'null'=>TRUE
            ],
            'updated_at' => [
                'type'=>'DATETIME',
                'null'=>TRUE
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('disciplines');

    }

    public function down()
    {
        $this->forge->dropTable('disciplines');

    }
}
