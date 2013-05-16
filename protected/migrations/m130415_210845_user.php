<?php

class m130415_210845_user extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130415_210845_user does not support migration down.\n";
		return false;
	}
	*/

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this -> createTable('user', array(
			'id' => 'pk',
			'username' => 'string not null',
			'password' => 'string not null',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('user');
	}
}