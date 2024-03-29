<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coordinator_name'); ?>
		<?php echo $form->textField($model,'coordinator_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'coordinator_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coordinator_email'); ?>
		<?php echo $form->textField($model,'coordinator_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'coordinator_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coordinator_phone'); ?>
		<?php echo $form->textField($model,'coordinator_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'coordinator_phone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->