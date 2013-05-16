<?php
/* @var $this EventOptionEventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Event Option Events',
);

$this->menu=array(
	array('label'=>'Create EventOptionEvent', 'url'=>array('create')),
	array('label'=>'Manage EventOptionEvent', 'url'=>array('admin')),
);
?>

<h1>Event Option Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
