<?php

class m130419_205454_group_reservation extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130419_205454_group_reservation does not support migration down.\n";
		return false;
	}
	*/

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this -> createTable('group_reservation', array(
			'id' => 'pk',
			'schedule_id' => 'int not null',
			'schedule_option_id' => 'int',
			'event_option_id' => 'int',
			'date' => 'date not null',
			'name' => 'string not null',
			'type_id' => 'int not null',
			'type_name' => 'string not null', 
			'visitors_num' => 'int not null',
			'audits_num' => 'int not null',
			'total_num' => 'int not null',
			'lunch_payment' => 'string not null',
			'bus_parking' => 'boolean not null',
			'bus_name' => 'string not null',
			'first_name' => 'string not null',
			'last_name' => 'string not null',
			'email' => 'string not null',
			'phone' => 'string not null',
			'address' => 'string not null',
			'city' => 'string not null',
			'state' => 'string not null',
			'zipcode' => 'int not null',
			'UNIQUE KEY (date, schedule_id)',
		));
	}

	public function safeDown()
	{
		$this -> dropTable('group_reservation');
	}
}