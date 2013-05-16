<?php
/* @var $this BlackoutScheduleController */
/* @var $model BlackoutSchedule */

$this->breadcrumbs=array(
	'Blackout Schedules'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BlackoutSchedule', 'url'=>array('index')),
	array('label'=>'Create BlackoutSchedule', 'url'=>array('create')),
	array('label'=>'Update BlackoutSchedule', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BlackoutSchedule', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlackoutSchedule', 'url'=>array('admin')),
);
?>

<h1>View BlackoutSchedule #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'schedule_id',
		'status',
	),
)); ?>
