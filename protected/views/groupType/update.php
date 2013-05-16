<?php
/* @var $this GroupTypeController */
/* @var $model GroupType */

$this->breadcrumbs=array(
	'Group Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GroupType', 'url'=>array('index')),
	array('label'=>'Create GroupType', 'url'=>array('create')),
	array('label'=>'View GroupType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GroupType', 'url'=>array('admin')),
);
?>

<h1>Update GroupType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>