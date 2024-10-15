<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            
            'login' => [
                'type' => 'VARCHAR',
                    'constraint'=> 200,
                    'null'=>TRUE
                ],   
            'mot_de_passe' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
                'null'=>FALSE
            ],

            'role' => [
                'type' => 'VARCHAR', 
                'constraint'=> 200,
                'null'=>TRUE
            ],

            'status' => [
                'type' => 'VARCHAR', 
                'constraint'=> 200,
                'default' => 'inactif',
                'null'=>TRUE
            ],
            
            'is_online' => [
                'type' => 'BOOLEAN',
                'default'=>0,
                'null'=>FALSE
            ],
            'lastlogged_at' => [
                'type'=>'DATETIME',
                'null'=>TRUE
            ],
            'updated_at' => [
                'type'=>'DATETIME',
                'null'=>TRUE
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
