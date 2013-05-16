<?php
/* @var $this EventScheduleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Event Schedules',
);

$this->menu=array(
	array('label'=>'Create EventSchedule', 'url'=>array('create')),
	array('label'=>'Manage EventSchedule', 'url'=>array('admin')),
);
?>

<h1>Event Schedules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
