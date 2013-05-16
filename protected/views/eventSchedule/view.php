<?php
/* @var $this EventScheduleController */
/* @var $model EventSchedule */

$this->breadcrumbs=array(
	'Event Schedules'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EventSchedule', 'url'=>array('index')),
	array('label'=>'Create EventSchedule', 'url'=>array('create')),
	array('label'=>'Update EventSchedule', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EventSchedule', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventSchedule', 'url'=>array('admin')),
);
?>

<h1>View EventSchedule #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'schedule_id',
		'event_id',
		'optional',
		'start_time',
		'end_time',
	),
)); ?>
