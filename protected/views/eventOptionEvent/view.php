<?php
/* @var $this EventOptionEventController */
/* @var $model EventOptionEvent */

$this->breadcrumbs=array(
	'Event Option Events'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EventOptionEvent', 'url'=>array('index')),
	array('label'=>'Create EventOptionEvent', 'url'=>array('create')),
	array('label'=>'Update EventOptionEvent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EventOptionEvent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventOptionEvent', 'url'=>array('admin')),
);
?>

<h1>View EventOptionEvent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'event_id',
		'event_option_id',
	),
)); ?>
