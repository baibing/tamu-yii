<?php
/* @var $this GroupReservationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Group Reservations',
);

$this->menu=array(
	array('label'=>'Create GroupReservation', 'url'=>array('create')),
	array('label'=>'Manage GroupReservation', 'url'=>array('admin')),
);
?>

<h1>Group Reservations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
