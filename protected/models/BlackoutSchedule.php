<?php

/**
 * This is the model class for table "blackout_schedule".
 *
 * The followings are the available columns in table 'blackout_schedule':
 * @property integer $id
 * @property string $date
 * @property integer $schedule_id
 * @property integer $status
 */
class BlackoutSchedule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BlackoutSchedule the static model class
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
		return 'blackout_schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, schedule_id', 'required'),
			array('schedule_id', 'numerical', 'integerOnly'=>true),
			array('status', 'numerical', 'integerOnly'=>true, 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, schedule_id, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
			'schedule_id' => 'Schedule',
			'status' => 'Status',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('schedule_id',$this->schedule_id);
		$criteria->compare('status',$this->status);

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

}