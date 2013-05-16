<?php

class m130423_193056_group_type_insert extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130423_193056_group_type_insert does not support migration down.\n";
		return false;
	}
	*/

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this -> insert('group_type', array('name' => '9th - 12th Grade'));
		$this -> insert('group_type', array('name' => '8th Grade'));
		$this -> insert('group_type', array('name' => '7th Grade'));
		$this -> insert('group_type', array('name' => '6th Grade and Below'));
		$this -> insert('group_type', array('name' => 'After School Club'));
		$this -> insert('group_type', array('name' => 'Aggie Affiliated Club or Organization'));
		$this -> insert('group_type', array('name' => 'Business Representatives'));
		$this -> insert('group_type', array('name' => 'Church Youth Group'));
		$this -> insert('group_type', array('name' => 'Church Adult Group'));
		$this -> insert('group_type', array('name' => 'College Transfer Students'));
		$this -> insert('group_type', array('name' => 'Conference/Workshop Attendees'));
		$this -> insert('group_type', array('name' => 'Elected Officials'));
		$this -> insert('group_type', array('name' => 'Former Students'));
		$this -> insert('group_type', array('name' => 'Governmental Official'));
		$this -> insert('group_type', array('name' => 'Non-profit Organization'));
		$this -> insert('group_type', array('name' => 'Prospective Graduate Students'));
		$this -> insert('group_type', array('name' => 'Senior Citizens Group'));
		$this -> insert('group_type', array('name' => 'Tourist Group'));
		$this -> insert('group_type', array('name' => 'University Department Guests'));
		$this -> insert('group_type', array('name' => 'University Faculty/Staff'));
		$this -> insert('group_type', array('name' => 'Other'));
	}

	public function safeDown()
	{
		$this -> delete('group_type', "name = '9th - 12th Grade'");
		$this -> delete('group_type', "name = '8th Grade'");
		$this -> delete('group_type', "name = '7th Grade'");
		$this -> delete('group_type', "name = '6th Grade and Below'");
		$this -> delete('group_type', "name = 'After School Club'");
		$this -> delete('group_type', "name = 'Aggie Affiliated Club or Organization'");
		$this -> delete('group_type', "name = 'Business Representatives'");
		$this -> delete('group_type', "name = 'Church Youth Group'");
		$this -> delete('group_type', "name = 'Church Adult Group'");
		$this -> delete('group_type', "name = 'College Transfer Students'");
		$this -> delete('group_type', "name = 'Conference/Workshop Attendees'");
		$this -> delete('group_type', "name = 'Elected Officials'");
		$this -> delete('group_type', "name = 'Former Students'");
		$this -> delete('group_type', "name = 'Governmental Official'");
		$this -> delete('group_type', "name = 'Non-profit Organization'");
		$this -> delete('group_type', "name = 'Prospective Graduate Students'");
		$this -> delete('group_type', "name = 'Senior Citizens Group'");
		$this -> delete('group_type', "name = 'Tourist Group'");
		$this -> delete('group_type', "name = 'University Department Guests'");
		$this -> delete('group_type', "name = 'University Faculty/Staff'");
		$this -> delete('group_type', "name = 'Other'");
		
		$this -> execute('ALTER TABLE `group_type` AUTO_INCREMENT = 1');
	}
}