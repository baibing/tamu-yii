<?php
/* @var $this EventOptionController */
/* @var $model EventOption */

$this->breadcrumbs=array(
	'Event Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EventOption', 'url'=>array('index')),
	array('label'=>'Manage EventOption', 'url'=>array('admin')),
);
?>

<h1>Create EventOption</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>