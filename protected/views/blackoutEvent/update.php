<?php
/* @var $this BlackoutEventController */
/* @var $model BlackoutEvent */

$this->breadcrumbs=array(
	'Blackout Events'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlackoutEvent', 'url'=>array('index')),
	array('label'=>'Create BlackoutEvent', 'url'=>array('create')),
	array('label'=>'View BlackoutEvent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlackoutEvent', 'url'=>array('admin')),
);
?>

<h1>Update BlackoutEvent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>