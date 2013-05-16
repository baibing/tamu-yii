<?php
/* @var $this EventOptionController */
/* @var $model EventOption */

$this->breadcrumbs=array(
	'Event Options'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EventOption', 'url'=>array('index')),
	array('label'=>'Create EventOption', 'url'=>array('create')),
	array('label'=>'Update EventOption', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EventOption', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventOption', 'url'=>array('admin')),
);
?>

<h1>View EventOption #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
