<?php

class m130415_203837_blackout_event extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130415_203837_blackout_event does not support migration down.\n";
		return false;
	}
	*/

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp() {
		$this -> createTable('blackout_event', array(
			'id' => 'pk',
			'date' => 'date not null',
			'schedule_id' => 'int not null',
			'event_id' => 'int not null',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('blackout_event');
	}
}