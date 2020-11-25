<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class CreateTableArticle extends Migration
{
	protected $name = 'article';
	public function up()
	{
		$forge = Database::forge();
		$fields = [
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'body' => [
				'type' => 'TEXT'
			],
			'uid' => [
				'type' => 'INT',
				'constraint' => 9
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
		$forge->addForeignKey('uid', 'user', 'id');
		$forge->createTable($this->name);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$forge = Database::forge();
		$forge->dropTable($this->name);
	}
}
