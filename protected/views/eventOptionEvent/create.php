<?php
/* @var $this EventOptionEventController */
/* @var $model EventOptionEvent */

$this->breadcrumbs=array(
	'Event Option Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EventOptionEvent', 'url'=>array('index')),
	array('label'=>'Manage EventOptionEvent', 'url'=>array('admin')),
);
?>

<h1>Create EventOptionEvent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>