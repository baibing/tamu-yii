<?php
/* @var $this BlackoutEventController */
/* @var $model BlackoutEvent */

$this->breadcrumbs=array(
	'Blackout Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlackoutEvent', 'url'=>array('index')),
	array('label'=>'Manage BlackoutEvent', 'url'=>array('admin')),
);
?>

<h1>Create BlackoutEvent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>