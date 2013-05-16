<?php

/**
 * This is the model class for table "group_reservation".
 *
 * The followings are the available columns in table 'group_reservation':
 * @property integer $id
 * @property integer $schedule_id
 * @property integer $schedule_option_id
 * @property integer $event_option_id
 * @property string $date
 * @property string $name
 * @property integer $type_id
 * @property string $type_name
 * @property integer $visitors_num
 * @property integer $audits_num
 * @property integer $total_num
 * @property string $lunch_payment
 * @property integer $bus_parking
 * @property string $bus_name
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property string $state
 * @property integer $zipcode
 */
class GroupReservation extends CActiveRecord
{
	public $email2;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GroupReservation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'group_reservation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, name, type_id, visitors_num, audits_num, total_num, lunch_payment, bus_parking, first_name, last_name, email, email2, phone, address, city, state, zipcode', 'required'),
			array('schedule_id, schedule_option_id, event_option_id, type_id, audits_num, total_num, zipcode', 'numerical', 'integerOnly'=>true, 'min'=>0),
			array('visitors_num', 'numerical', 'integerOnly'=>true, 'min'=>15, 'max'=>75),
			array('bus_parking', 'boolean'),
			array('bus_name', 'checkBusParking'),
			array('date', 'type', 'type'=>'date','message'=>'{attribute}: is not a date!', 'dateFormat'=>'yyyy-mm-dd'),
			array('email, email2', 'email'),
			array('email2', 'compare', 'compareAttribute'=>'email'),
			array('name, type_name, lunch_payment, bus_name, first_name, last_name, email, phone, address, city, state', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, schedule_id, schedule_option_id, event_option_id, date, name, type_id, type_name, visitors_num, audits_num, total_num, lunch_payment, bus_parking, bus_name, first_name, last_name, email, phone, address, city, state, zipcode', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'schedule' => array(self::BELONGS_TO, 'Schedule', 'schedule_id'),
			'group_type' => array(self::BELONGS_TO, 'GroupType', 'type_id'),
			'schedule_option' => array(self::BELONGS_TO, 'EventSchedule', 'schedule_option_id'),
			'event_option' => array(self::BELONGS_TO, 'EventOption', 'event_option_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'date' => 'Select a date from the calendar:',
			'name' => 'Group Name:',
			'type_id' => 'Group Type:',
			'type_name' => 'Please enter the group type:',
			'visitors_num' => 'Enter the number of students in your party:',
			'audits_num' => 'Enter the number of adults in your party:',
			'total_num' => 'Enter the size of your  party:',
			'lunch_payment' => 'Lunch Payment Method',
			'bus_parking' => 'Bus Parking:',
			'bus_name' => 'Name on Bus:',
			'first_name' => 'First Name:',
			'last_name' => 'Last Name:',
			'email' => 'Email:',
			'email2' => 'Confirm Email:',
			'phone' => 'Cell Phone:',
			'address' => 'Address:',
			'city' => 'City:',
			'state' => 'State:',
			'zipcode' => 'Zipcode:',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('schedule_id',$this->schedule_id);
		$criteria->compare('schedule_option_id',$this->schedule_option_id);
		$criteria->compare('event_option_id',$this->event_option_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('type_name',$this->type_name,true);
		$criteria->compare('visitors_num',$this->visitors_num);
		$criteria->compare('audits_num',$this->audits_num);
		$criteria->compare('total_num',$this->total_num);
		$criteria->compare('lunch_payment',$this->lunch_payment,true);
		$criteria->compare('bus_parking',$this->bus_parking);
		$criteria->compare('bus_name',$this->bus_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zipcode',$this->zipcode);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Convert date to storage format
	 */
    protected function beforeValidate () {
        // convert to storage format
        $this->date = date('Y-m-d', strtotime($this->date));

        return parent::beforeValidate();
    }
	
	/**
	 * validate bus name when bus_parking is true
	 */
	public function checkBusParking($attribute, $params) {
		if ($this->bus_parking == true) {
			if (!isset($this->$attribute))
				$this->addError($attribute, 'Please input the bus name.');
		}
	}
	
	/**
	 * Retrieve all the schedules which are public 
	 */
	public function getPublicSchedules() {
		$sql = 'SELECT schedule_id, schedule_name, event_schedule_id, t1.event_id, event_name, optional, start_time, end_time, option_id, option_name
				FROM (SELECT s.id AS schedule_id, s.name AS schedule_name, es.id AS event_schedule_id, e.id AS event_id, e.name AS event_name, es.optional, es.start_time, es.end_time
				FROM schedule s, event e, event_schedule es
				WHERE s.id = es.schedule_id
				AND e.id = es.event_id) AS t1
				LEFT JOIN
				(SELECT e.id AS event_id, eo.id AS option_id, eo.name AS option_name
				FROM event e, event_option eo, event_option_event eoe
				WHERE e.id = eoe.event_id
				AND eoe.event_option_id = eo.id) AS t2
				ON t1.event_id = t2.event_id
				ORDER BY schedule_id, optional, start_time, option_id';
		$command = Yii::app()->db->createCommand($sql);
		$schedules = $command->queryAll();
		// print_r($schedules);
		return $schedules;
	}

	/**
	 * Retrieve the event based on id
	 * @return event model
	 */
	public function getEvent($id) {
		$eventModel = Event::model() -> findByPk($id);
		return $eventModel;
	}

	/**
	 * Retrieves a list of options for group type
	 */
	public function getTypeOptions() {
		$types = GroupType::model() -> findAll(array('order' => 'id'));
		$list = CHtml::listData($types, 'id', 'name');
		return $list;
	}

	/**
	 * Retrieves a list of options for lunch payment method
	 */
	public function getLunchOptions() {
		return array(
			"Individual" => "Individual",
			"School Payment" => "School Payment"
		);
	}

	/**
	 * Retrieves a list of options for bus_parking
	 */
	public function getParkingOptions() {
		return array(
			TRUE => 'Yes',
			FALSE => 'No',
		);
	}

	/**
	 * Retrieves a list of states to select in the dropdown element
	 */
	public function getStateOptions() {
		return array(
			"AK" => "AK",
			"AL" => "AL",
			"AR" => "AR",
			"AZ" => "AZ",
			"CA" => "CA",
			"CO" => "CO",
			"CT" => "CT",
			"DC" => "DC",
			"DE" => "DE",
			"FL" => "FL",
			"GA" => "GA",
			"HI" => "HI",
			"IA" => "IA",
			"ID" => "ID",
			"IL" => "IL",
			"IN" => "IN",
			"KS" => "KS",
			"KY" => "KY",
			"LA" => "LA",
			"MA" => "MA",
			"MD" => "MD",
			"ME" => "ME",
			"MI" => "MI",
			"MN" => "MN",
			"MO" => "MO",
			"MS" => "MS",
			"MT" => "MT",
			"NC" => "NC",
			"ND" => "ND",
			"NE" => "NE",
			"NH" => "NH",
			"NJ" => "NJ",
			"NM" => "NM",
			"NV" => "NV",
			"NY" => "NY",
			"OH" => "OH",
			"OK" => "OK",
			"OR" => "OR",
			"PA" => "PA",
			"RI" => "RI",
			"SC" => "SC",
			"SD" => "SD",
			"TN" => "TN",
			"TX" => "TX",
			"UT" => "UT",
			"VA" => "VA",
			"VT" => "VT",
			"WA" => "WA",
			"WI" => "WI",
			"WV" => "WV",
			"WY" => "WY"
		);
	}
}
