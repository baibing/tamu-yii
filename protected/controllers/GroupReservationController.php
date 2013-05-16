<?php

class GroupReservationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='webroot.themes.classic.views.layouts.main';
	// public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'create' and 'otherGroupType' actions
				'actions'=>array('create', 'otherGroupType', 'confirm', 'thankyou'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GroupReservation;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['GroupReservation']))
		{
			$model->attributes=$_POST['GroupReservation'];
		}
		
		$daysArray = array();
		$daysList = BlackoutSchedule::model()->findAll("date>=:date AND status>=2", array(':date'=>date('Y-m-d')));
		foreach($daysList as $day) {
			$daysArray[] = $day->date;
		}
		$days = '"' . implode('", "', $daysArray) . '"';

		$this->render('create',array(
			'model'=>$model,
			'days'=>$days,
		));
	}

	/**
	 * Display the form for confirmation
	 */
	public function actionConfirm()
	{
		$model=new GroupReservation;
		
		if(isset($_POST['GroupReservation']))
		{
			$model->attributes=$_POST['GroupReservation'];
			
			$this->render('confirm',array(
				'model'=>$model,
			));
		}
	}
	
	/**
	 * Save the model to the database and display the thankyou page
	 */
	public function actionThankyou()
	{
		$groupModel = new GroupReservation;
		$blkModel = new BlackoutSchedule;
		if(isset($_POST['GroupReservation']))
		{
			$_POST['GroupReservation']['date'] = date('Y-m-d', strtotime($_POST['GroupReservation']['date']));
			$groupModel->attributes = $_POST['GroupReservation'];
			$schedule = array(
				'date' => $_POST['GroupReservation']['date'],
				'schedule_id' => $_POST['GroupReservation']['schedule_id'],
			);
			
			$blkModel2 = BlackoutSchedule::model()->find('date=:date', array(':date'=>$schedule['date']));
			if (isset($blkModel2->status)) {
				if ($blkModel2->status >= 2) {
					throw new CHttpException(404, 'Sorry. The date is full already.');
				}
				// print_r($blkModel2->attributes);
				$schedule['id'] = $blkModel2->id;
				$schedule['status'] = $blkModel2->status + 1;
				$schedule['schedule_id'] += $blkModel2->schedule_id;
				$blkModel2->attributes = $schedule;
				$blkModel2->save();
			} else {
				$blkModel->attributes = $schedule;
				$blkModel->save();
			}
			// print_r($schedule);
			// print_r($blkModel->attributes);
			
			// Uncomment below to debug the saving process
			// $groupModel->validate();
			// var_dump($groupModel->getErrors());
			
			if($groupModel->save()) {
				$this->render('thankyou',array(
					'model'=>$groupModel,
				));
			}
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GroupReservation']))
		{
			$model->attributes=$_POST['GroupReservation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GroupReservation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GroupReservation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GroupReservation']))
			$model->attributes=$_GET['GroupReservation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GroupReservation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GroupReservation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GroupReservation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='group-reservation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionOtherGroupType() {
		$id = $_POST['type_id'];
		$model = GroupType::model()->findByPk($id);
		// echo "name is " . $model->attributes['name'];
		if ($model->name === 'Other') {
			echo CHtml::label('Please enter the group type:', 'type_name', array('required' => true));
			echo CHtml::textField('GroupReservation[type_name]','',array('required'=>true,'size'=>30,'maxlength'=>255));
		}
	}
	
	/**
	 * Find the name of the given type id
	 */
	public function getType($type_id) {
		$type = GroupType::model() -> findByPk($type_id);
		return $type->name;
	}
	
	/**
	 * Ajax function to dynamicly check the blackout schedules
	 */
	public function actionCheckBlkSch() {
		$date = $_POST['GroupReservation']['date'];
		$model = BlackoutSchedule::model()->findByAttributes(array('date'=>$date));
		
		echo $model->date;
	}

}
