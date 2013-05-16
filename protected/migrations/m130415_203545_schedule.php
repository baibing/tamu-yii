<?php

class m130415_203545_schedule extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130415_182855_Schedules does not support migration down.\n";
		return false;
	}
	*/
	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('schedule', array(
			'id' => 'pk',
			'name' => 'string not null',
			'public' => 'boolean not null',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('schedule');
	}
	
}