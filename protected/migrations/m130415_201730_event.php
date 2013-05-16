<?php

class m130415_201730_event extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130415_182919_Events does not support migration down.\n";
		return false;
	}
	*/

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this -> createTable('event', array(
			'id' => 'pk',
			'name' => 'string not null',
			'coordinator_name' => 'string',
			'coordinator_email' => 'string',
			'coordinator_phone' => 'string',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('event');
	}
}