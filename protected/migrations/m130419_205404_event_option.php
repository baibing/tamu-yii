<?php

class m130419_205404_event_option extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130419_205404_event_option does not support migration down.\n";
		return false;
	}
	*/

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this -> createTable('event_option', array(
			'id' => 'pk',
			'name' => 'string not null unique',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('event_option');
	}
}