<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Niveau extends Migration
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
            
           
            'name' => [
                'type' => 'VARCHAR', 
                'constraint'=> 200,
                'null'=>FALSE
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
        $this->forge->createTable('niveaux');
    }

    public function down()
    {
        $this->forge->dropTable('niveaux');
    }
}
