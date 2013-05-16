<?php
/* @var $this GroupTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Group Types',
);

$this->menu=array(
	array('label'=>'Create GroupType', 'url'=>array('create')),
	array('label'=>'Manage GroupType', 'url'=>array('admin')),
);
?>

<h1>Group Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
