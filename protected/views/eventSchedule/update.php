<?php
/* @var $this EventScheduleController */
/* @var $model EventSchedule */

$this->breadcrumbs=array(
	'Event Schedules'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EventSchedule', 'url'=>array('index')),
	array('label'=>'Create EventSchedule', 'url'=>array('create')),
	array('label'=>'View EventSchedule', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EventSchedule', 'url'=>array('admin')),
);
?>

<h1>Update EventSchedule <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>