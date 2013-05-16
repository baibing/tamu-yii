<?php
/* @var $this BlackoutEventController */
/* @var $model BlackoutEvent */

$this->breadcrumbs=array(
	'Blackout Events'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BlackoutEvent', 'url'=>array('index')),
	array('label'=>'Create BlackoutEvent', 'url'=>array('create')),
	array('label'=>'Update BlackoutEvent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BlackoutEvent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlackoutEvent', 'url'=>array('admin')),
);
?>

<h1>View BlackoutEvent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'schedule_id',
		'event_id',
	),
)); ?>
