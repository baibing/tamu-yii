<?php
/* @var $this GroupReservationController */
/* @var $model GroupReservation */

$this->breadcrumbs=array(
	'Group Reservations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GroupReservation', 'url'=>array('index')),
	array('label'=>'Manage GroupReservation', 'url'=>array('admin')),
);
?>

<h1>Group Reservation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'days'=>$days)); ?>