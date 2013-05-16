<?php
/* @var $this GroupTypeController */
/* @var $model GroupType */

$this->breadcrumbs=array(
	'Group Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GroupType', 'url'=>array('index')),
	array('label'=>'Manage GroupType', 'url'=>array('admin')),
);
?>

<h1>Create GroupType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>