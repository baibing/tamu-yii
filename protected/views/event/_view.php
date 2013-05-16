<?php
/* @var $this EventController */
/* @var $data Event */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coordinator_name')); ?>:</b>
	<?php echo CHtml::encode($data->coordinator_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coordinator_email')); ?>:</b>
	<?php echo CHtml::encode($data->coordinator_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coordinator_phone')); ?>:</b>
	<?php echo CHtml::encode($data->coordinator_phone); ?>
	<br />


</div>