<?php
/* @var $this GroupReservationController */
/* @var $data GroupReservation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schedule_id')); ?>:</b>
	<?php echo CHtml::encode($data->schedule_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schedule_option_id')); ?>:</b>
	<?php echo CHtml::encode($data->schedule_option_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_option_id')); ?>:</b>
	<?php echo CHtml::encode($data->event_option_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('type_name')); ?>:</b>
	<?php echo CHtml::encode($data->type_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visitors_num')); ?>:</b>
	<?php echo CHtml::encode($data->visitors_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('audits_num')); ?>:</b>
	<?php echo CHtml::encode($data->audits_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_num')); ?>:</b>
	<?php echo CHtml::encode($data->total_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lunch_payment')); ?>:</b>
	<?php echo CHtml::encode($data->lunch_payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bus_parking')); ?>:</b>
	<?php echo CHtml::encode($data->bus_parking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bus_name')); ?>:</b>
	<?php echo CHtml::encode($data->bus_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zipcode')); ?>:</b>
	<?php echo CHtml::encode($data->zipcode); ?>
	<br />

	*/ ?>

</div>