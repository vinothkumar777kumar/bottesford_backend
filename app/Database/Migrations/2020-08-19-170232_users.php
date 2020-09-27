<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->AddField([
			'id' => [
			'type' => 'INT',
			'constraint' => 11,
			'auto_increment' => true
			],
			'name' => [
              'type' => 'VARCHAR',
			'constraint' => 50,
			],
			'email' => [
              'type' => 'VARCHAR',
			'constraint' => 100,
			],
			'password' => [
              'type' => 'VARCHAR',
			'constraint' => 100,
			],
			'mobile' => [
              'type' => 'INT',
			'constraint' => 50,
			],
		]);
		$this->forge->addkey('id');
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
