<?php
/* @var $this GroupReservationController */
/* @var $model GroupReservation */

$this->breadcrumbs=array(
	'Group Reservations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GroupReservation', 'url'=>array('index')),
	array('label'=>'Create GroupReservation', 'url'=>array('create')),
	array('label'=>'View GroupReservation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GroupReservation', 'url'=>array('admin')),
);
?>

<h1>Update GroupReservation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>