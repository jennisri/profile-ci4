<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TeamMirgation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_team' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'fb' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'ig' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'gambar_team' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_input' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'tanggal_ubah' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_team', true);
        $this->forge->createTable('team');
    }

    public function down()
    {
        $this->forge->dropTable('team');
    }
}
