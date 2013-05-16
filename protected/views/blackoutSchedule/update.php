<?php
/* @var $this BlackoutScheduleController */
/* @var $model BlackoutSchedule */

$this->breadcrumbs=array(
	'Blackout Schedules'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlackoutSchedule', 'url'=>array('index')),
	array('label'=>'Create BlackoutSchedule', 'url'=>array('create')),
	array('label'=>'View BlackoutSchedule', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlackoutSchedule', 'url'=>array('admin')),
);
?>

<h1>Update BlackoutSchedule <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>