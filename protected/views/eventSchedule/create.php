<?php
/* @var $this EventScheduleController */
/* @var $model EventSchedule */

$this->breadcrumbs=array(
	'Event Schedules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EventSchedule', 'url'=>array('index')),
	array('label'=>'Manage EventSchedule', 'url'=>array('admin')),
);
?>

<h1>Create EventSchedule</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>