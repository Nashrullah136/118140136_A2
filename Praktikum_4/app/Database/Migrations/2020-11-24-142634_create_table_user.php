<?php namespace App\Database\Migrations;

use CodeIgniter\Database;
use CodeIgniter\Database\Migration;
use Config\Database as ConfigDatabase;

class CreateTableUser extends Migration
{
	protected $name = 'user';
	public function up()
	{
		$forge = ConfigDatabase::forge();

		$fields = [
			'username' =>[
				'type' => 'VARCHAR',
				'constraint' => 20,
				'unique' => true,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 256,
			],
			'role' => [
				'type' => 'enum',
				'constraint' => ['admin', 'user']
			],
			'created_at' => [
				'type' => 'datetime'
			],
			'updated_at' => [
				'type' => 'datetime'
			]
		];
		$forge->addField('id');
		$forge->addField($fields);
		$forge->createTable($this->name);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$forge = ConfigDatabase::forge();
		$forge->dropTable($this->name, TRUE);
	}
}
