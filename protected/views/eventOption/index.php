<?php
/* @var $this EventOptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Event Options',
);

$this->menu=array(
	array('label'=>'Create EventOption', 'url'=>array('create')),
	array('label'=>'Manage EventOption', 'url'=>array('admin')),
);
?>

<h1>Event Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
