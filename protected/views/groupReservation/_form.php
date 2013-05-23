<?php
/* @var $this GroupReservationController */
/* @var $model GroupReservation */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'js/group_registration.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'css/vcReg.css'); 
Yii::app()->clientScript->registerScript('blackoutSchedule', "
var disabledDays = [". $days ."];
function noWeekendsOrBlackoutDays(date) {
	var noWeekend = jQuery.datepicker.noWeekends(date);
	return noWeekend[0] ? blackoutDays(date) : noWeekend;
}
function blackoutDays(date) {
	var formattedDate = date.getFullYear() + '-' + (((date.getMonth()+1)<10)? ('0'+(date.getMonth() + 1)):(date.getMonth() + 1)) + '-' + ((date.getDate()<10)?('0'+date.getDate() ):date.getDate());
	if($.inArray(formattedDate, disabledDays) != -1) {
		return [false];
	} else {
		return [true];
	}
}
var halfDays = [".$halfDays."];
var blkSches = [".$blkSches."];
function checkBlkSchedule(date) {
	$('#scheduleForm :input').removeAttr('disabled');
	var index = $.inArray(date, halfDays);
	if(index != -1) {
		var schedule_id = blkSches[index];
		var scheduleDiv = \"#schedule\" + schedule_id + \"Div\";
		$(scheduleDiv+' :input').attr('disabled', true);
	}
}
");
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-reservation-form',
	'action'=>'index.php?r=groupReservation/confirm',
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <fieldset class="actionForm">
      <legend>Select Your Tour Date</legend>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model, 'attribute'=>'date',
		    'options'=>array(
		        'dateFormat'=>'mm/dd/yy',
		        'minDate'=>'0',
		        'maxDate'=>'+3m',
		        'changeYear'=>'true',
		        'changeMonth'=>'true',
		        'beforeShowDay'=>'js:noWeekendsOrBlackoutDays',
				'onSelect'=> 'js:checkBlkSchedule',
		        'showAnim'=>'fold',
		    ),
		)); ?>
    </fieldset>

    <fieldset class="actionForm" id="scheduleForm">
      <legend>Select a Tour Schedule</legend>
        <p class="instructions">Choose a tour time</p>
		<?php
		$schedules = $model->publicSchedules;
		$prev_sche_id = 0;
		$prev_eve_id = 0;
		$event_option_flag = FALSE;
		foreach ($schedules as $schedule) {
			
			// echo the schedule name and its radio button for each different schedule
			if ($schedule['schedule_id'] != $prev_sche_id) {
				if ($prev_sche_id != 0) echo '</div>'."\n";
				$prev_sche_id = $schedule['schedule_id'];
				// reset the optional flag which indicates whether are we echoing the optional event or not
				$optional_flag = FALSE;
				// reset the event option flag which indicates whether are we echoing the event options or not
				if ($event_option_flag) echo '</div>'."\n";
				$event_option_flag = FALSE;
				
				echo '<div class="scheduleRadioGroup" id="schedule'.$schedule['schedule_id'].'Div">'."\n";
				echo $form->radioButton($model, 'schedule_id', array(
					'separator'=> '',
					'value'=>$schedule['schedule_id'], 
					'id' => 'schedule'.$schedule['schedule_id'],
					'class' => 'scheduleRadio',
					'uncheckValue'=>null,
				));
				echo '<label for="' . 'schedule'.$schedule['schedule_id'] . '">' . $schedule['schedule_name'] . '</label><br>'."\n";
			}
			
			// echo the event information
			if ($prev_eve_id != $schedule['event_id'] && $event_option_flag) {
				$event_option_flag = FALSE;
				echo '</div>'."\n";
			}
			$prev_eve_id = $schedule['event_id'];
			if ($schedule['optional'] == FALSE) {
				
				if ($schedule['option_id'] == null || !$event_option_flag) {
					echo strftime("%R %p", strtotime($schedule['start_time']))." - ".strftime("%R %p", strtotime($schedule['end_time']))." ".$schedule['event_name']."<br>"."\n";
				}
				
				// if the event is non-optional, check if there is any event_option
				if ($schedule['option_id'] != null) {
					if (!$event_option_flag) {
						$event_option_flag = TRUE;
						echo '<div class="eventOptionList">'."\n";
					}
					echo $form->radioButton($model, 'event_option_id', array(
						'separator' => '',
						'value' => $schedule['option_id'],
						'id' => 'schedule'.$schedule['schedule_id'].'event'.$schedule['event_id'].'option'.$schedule['option_id'],
						'uncheckValue' => null,
					));
					echo '<label for="' . 'schedule'.$schedule['schedule_id'].'event'.$schedule['event_id'].'option'.$schedule['option_id'] . '"> ' . $schedule['option_name'] . ' </label>'."\n";
				} else {
					$event_option_flag = FALSE;
				}
				
			} else {
				// this is an optional event
				if (!$optional_flag) {
					$optional_flag = TRUE;
					echo strftime("%R %p", strtotime($schedule['start_time']))." - ".strftime("%R %p", strtotime($schedule['end_time']))." Additional Tour Options*<br>"."\n";
				}
				echo $form->radioButton($model, 'schedule_option_id', array(
					'separator' => '',
					'value' => $schedule['event_schedule_id'],
					'id' => 'schedule'.$schedule['schedule_id'].'event'.$schedule['event_id'],
					'uncheckValue' => null,
				));
				echo '<label for="' . 'schedule'.$schedule['schedule_id'].'event'.$schedule['event_id'] . '"> ' . $schedule['event_name'] . ' </label>'."\n";
			}

		}
		echo '</div>'."\n";
		?>
    </fieldset>
   
    <fieldset class="actionForm">
      <legend>Group Information</legend>
        <p class="instructions">Tell us about your group</p>
		<div class="row">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'type_id'); ?>
			<?php echo $form->dropDownList($model,'type_id',$model->typeOptions, array(
				'empty' => 'Select Group Type', 
				'ajax' => array(
					'type' => 'POST',
					'url' => $this->createUrl('groupReservation/otherGroupType'),
					'update' => '#other_type',
					'data' => array('type_id' => 'js:this.value'),
				)
			)); ?>
			<?php echo $form->error($model,'type_id'); ?>
		</div>
		
		<div id="other_type" class="row">
			<?php //echo $form->labelEx($model, 'type_name'); ?>
			<?php //echo $form->textField($model, 'type_name', array('style' => 'display: none')); ?>
			<?php //echo $form->error($model, 'type_name'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'visitors_num'); ?>
			<?php echo $form->numberField($model,'visitors_num',array('size'=>30)); ?>
			<?php echo $form->error($model,'visitors_num'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'audits_num'); ?>
			<?php echo $form->numberField($model,'audits_num',array('size'=>30)); ?>
			<?php echo $form->error($model,'audits_num'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'total_num'); ?>
			<?php echo $form->numberField($model,'total_num',array('size'=>30)); ?>
			<?php echo $form->error($model,'total_num'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'lunch_payment'); ?>
			<?php echo $form->radioButtonList($model,'lunch_payment',$model->lunchOptions,array('labelOptions'=>array('style'=>'display:inline;'),'separator'=>'&nbsp;&nbsp;&nbsp;')); ?>
			<?php echo $form->error($model,'lunch_payment'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'bus_parking'); ?>
			<?php echo $form->radioButtonList($model,'bus_parking',$model->parkingOptions,array(
				'labelOptions'=>array('style'=>'display:inline;'),
				'separator'=>"&nbsp;&nbsp;&nbsp;",
			)); ?>
			<?php echo $form->error($model,'bus_parking'); ?>
		</div>
	
		<div id="bus_name" class="row" style="display:none">
			<?php echo $form->labelEx($model,'bus_name'); ?>
			<?php echo $form->textField($model,'bus_name',array('size'=>30,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'bus_name'); ?>
		</div>
    </fieldset>

    <fieldset class="actionForm">
      <legend>High School Information</legend>
    	<p class="instructions">Which high school do you attend?</p>

    </fieldset>

    <fieldset class="actionForm">
      <legend>Group contact information</legend>
    	<p class="instructions">How can we contact you?</p>
		<div class="row">
			<?php echo $form->labelEx($model,'first_name'); ?>
			<?php echo $form->textField($model,'first_name',array('size'=>30,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'first_name'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'last_name'); ?>
			<?php echo $form->textField($model,'last_name',array('size'=>30,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'last_name'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->emailField($model,'email',array('size'=>30,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'email2'); ?>
			<?php echo $form->emailField($model,'email2',array('size'=>30,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'email2'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'phone'); ?>
			<?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'phone'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'address'); ?>
			<?php echo $form->textField($model,'address',array('size'=>30,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'address'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'city'); ?>
			<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'city'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'state'); ?>
			<?php $model->state = 'TX'; echo $form->dropDownList($model,'state',$model->stateOptions); ?>
			<?php echo $form->error($model,'state'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'zipcode'); ?>
			<?php echo $form->textField($model,'zipcode'); ?>
			<?php echo $form->error($model,'zipcode'); ?>
		</div>
    </fieldset>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->