<?php

class m130415_203844_blackout_schedule extends CDbMigration
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
		// Not use schedule_id as Foreign Key
		// when two schedules have been made for one day, store the sum of those two schedule_id
		// For example, when group A made a schedule 1 on 20130325, we insert a new tuple with 
		// date = 20130325, schedule_id = 1, status = 1 (One schedule is made, one slot left)
		// Then we will blackout that schedule for that day. Group B made a schedule 2 after this,
		// we need to update the tuple as
		// date = 20130325, schedule_id = 3, status = 2 (Two schedule is made, the day is full now)
		// A few hours later, group A decide to cancel their reservation which is shcedule 1.
		// We will still be able to keep the record of the second schedule_id by updating the tuple as
		// date = 20130325, schedule_id = 2, status = 1
		$this -> createTable('blackout_schedule', array(
			'id' => 'pk',
			'date' => 'date not null unique',
			'schedule_id' => 'int',
			'status' => 'int default 1',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('blackout_schedule');
	}
}