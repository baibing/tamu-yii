<?php
/* @var $this BlackoutEventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Blackout Events',
);

$this->menu=array(
	array('label'=>'Create BlackoutEvent', 'url'=>array('create')),
	array('label'=>'Manage BlackoutEvent', 'url'=>array('admin')),
);
?>

<h1>Blackout Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
