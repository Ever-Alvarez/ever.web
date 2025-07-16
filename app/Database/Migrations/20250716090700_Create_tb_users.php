<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Create_tb_users extends Migration{

    public function up(){
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'id_access' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'null' => FALSE,
                'comment' => '1 = SYSTEMS, 2 = ADMIN, 3 = NORMAL USER OFFICE/ADMINISTRATION, 5 = OPERATORS'
            ],
            'id_profile' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'null' => FALSE,
                'comment' => '1 = SYSTEMS, 2 = ADMIN, 3 = NORMAL USERS OFFICE/ADMINISTRATION, 5 = OPERATORS'
            ],
            'vc_user' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => FALSE,
            ],
            'pass' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
                'null' => FALSE
            ],
            'dt_date' => [
                'type' => 'DATETIME',
                'null' => FALSE
            ],
            't_estatus' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1
            ]
        ]);
        
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('tb_users');
    }

    public function down()
    {
        $this->forge->dropTable('tb_users');
    }
}