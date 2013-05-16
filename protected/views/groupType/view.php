<?php
/* @var $this GroupTypeController */
/* @var $model GroupType */

$this->breadcrumbs=array(
	'Group Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List GroupType', 'url'=>array('index')),
	array('label'=>'Create GroupType', 'url'=>array('create')),
	array('label'=>'Update GroupType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GroupType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GroupType', 'url'=>array('admin')),
);
?>

<h1>View GroupType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
