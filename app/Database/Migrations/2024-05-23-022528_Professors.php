<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Professors extends Migration
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
            'discipline_id' => [
                'type' => 'VARCHAR', 
                'constraint'=> 200,
                'null'=>TRUE
            ],

            'genre' => [
                'type' => 'VARCHAR', 
                'constraint'=> 200,
                'null'=>TRUE
            ],

            'description' => [
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

            'avatar' => [
                'type' => 'VARCHAR', 
                'constraint'=> 255,
                'default' => 'inactif',
                'null'=>TRUE
            ],

            'user_id' => [
                'type'=> 'INT',
                'constraint' =>11, 
                'unsigned' =>TRUE, 
                'null'=> FALSE
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
        $this->forge->createTable('professors');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('discipline_id', 'users', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        //
    }
}
