<?php

class m130419_205324_group_type extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130419_205324_group_type does not support migration down.\n";
		return false;
	}
	*/

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this -> createTable('group_type', array(
			'id' => 'pk',
			'name' => 'string not null unique',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('group_type');
	}
}