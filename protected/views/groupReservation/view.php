<?php
/* @var $this GroupReservationController */
/* @var $model GroupReservation */

$this->breadcrumbs=array(
	'Group Reservations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List GroupReservation', 'url'=>array('index')),
	array('label'=>'Create GroupReservation', 'url'=>array('create')),
	array('label'=>'Update GroupReservation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GroupReservation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GroupReservation', 'url'=>array('admin')),
);
?>

<h1>View GroupReservation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'schedule_id',
		'schedule_option_id',
		'event_option_id',
		'date',
		'name',
		'type_id',
		'type_name',
		'visitors_num',
		'audits_num',
		'total_num',
		'lunch_payment',
		'bus_parking',
		'bus_name',
		'first_name',
		'last_name',
		'email',
		'phone',
		'address',
		'city',
		'state',
		'zipcode',
	),
)); ?>
