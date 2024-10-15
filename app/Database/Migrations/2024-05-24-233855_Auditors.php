<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Auditors extends Migration
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
            'nom_prenom' => [
                'type' => 'VARCHAR',
                 'constraint'=> 200,
                 'null'=>FALSE
            ],
            'telephone' => [
                'type' => 'VARCHAR',
                'constraint'=> 200,
                'null'=>FALSE
            ],

            'adresse' => [
                'type' => 'VARCHAR',
                'constraint'=> 200,
                'null'=>FALSE
            ],

            'date_naiss' => [
                'type' => 'VARCHAR', 
                'constraint'=> 200,
                'null'=>TRUE
            ],

            'lieu_naiss' => [
                'type' => 'VARCHAR', 
                'constraint'=> 200,
                'null'=>TRUE
            ],

            'user_id' => [
                'type'=> 'INT',
                'constraint' =>11, 
                'unsigned' =>TRUE, 
                'null'=> FALSE
            ],

            'niveau_id' => [
                'type'=> 'INT',
                'constraint' =>11, 
                'unsigned' =>TRUE, 
                'null'=> FALSE
            ],

            'genre' => [
                'type' => 'VARCHAR', 
                'constraint'=> 200,
                'null'=>TRUE
            ],
            
            'avatar' => [
                'type' => 'VARCHAR',
                'VARCHAR', 'constraint'=> 225,
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('niveau_id', 'niveaux', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('auditors');
    }

    public function down()
    {
        $this->forge->dropTable('auditors');
    }
}
