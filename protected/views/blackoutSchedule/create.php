<?php
/* @var $this BlackoutScheduleController */
/* @var $model BlackoutSchedule */

$this->breadcrumbs=array(
	'Blackout Schedules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlackoutSchedule', 'url'=>array('index')),
	array('label'=>'Manage BlackoutSchedule', 'url'=>array('admin')),
);
?>

<h1>Create BlackoutSchedule</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>