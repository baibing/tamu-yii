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

<?php echo $this->renderPartial('_form', array('model'=>$model, 'days'=>$days, 'halfDays'=>$halfDays, 'blkSches'=>$blkSches)); ?>

<div id="sidebar"> 
  <a class="sidebarlink" href="" />Request More Information</a>
  <a class="sidebarlink" href="" />FAQ</a>
  <a class="sidebarlink" href="" />Travel &amp; Lodging</a>
  <a class="sidebarlink" href="" />Live Chat</a>
</div>
