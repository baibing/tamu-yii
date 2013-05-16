<?php
/* @var $this EventOptionController */
/* @var $model EventOption */

$this->breadcrumbs=array(
	'Event Options'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EventOption', 'url'=>array('index')),
	array('label'=>'Create EventOption', 'url'=>array('create')),
	array('label'=>'View EventOption', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EventOption', 'url'=>array('admin')),
);
?>

<h1>Update EventOption <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>