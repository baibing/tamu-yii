<?php

class m130415_203814_event_schedule extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130415_203814_event_schedule does not support migration down.\n";
		return false;
	}
	*/

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this -> createTable('event_schedule', array(
			'id' => 'pk',
			'schedule_id' => 'int not null',
			'event_id' => 'int not null',
			'optional' => 'boolean not null',
			'start_time' => 'time not null',
			'end_time' => 'time not null',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('event_schedule');
	}
}