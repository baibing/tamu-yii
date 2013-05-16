<?php
/* @var $this BlackoutScheduleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Blackout Schedules',
);

$this->menu=array(
	array('label'=>'Create BlackoutSchedule', 'url'=>array('create')),
	array('label'=>'Manage BlackoutSchedule', 'url'=>array('admin')),
);
?>

<h1>Blackout Schedules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
