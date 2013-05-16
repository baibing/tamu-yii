<?php

class m130419_205441_event_option_event extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130419_205441_event_option_event does not support migration down.\n";
		return false;
	}
	*/

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this -> createTable('event_option_event', array(
			'id' => 'pk',
			'event_id' => 'int not null',
			'event_option_id' => 'int not null',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('event_option_event');
	}
}