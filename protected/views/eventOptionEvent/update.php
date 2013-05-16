<?php
/* @var $this EventOptionEventController */
/* @var $model EventOptionEvent */

$this->breadcrumbs=array(
	'Event Option Events'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EventOptionEvent', 'url'=>array('index')),
	array('label'=>'Create EventOptionEvent', 'url'=>array('create')),
	array('label'=>'View EventOptionEvent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EventOptionEvent', 'url'=>array('admin')),
);
?>

<h1>Update EventOptionEvent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>