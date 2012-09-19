<?php
/* @var $this WorkerController */
/* @var $model Worker */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'worker-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Fullname'); ?>
		<?php echo $form->textField($model,'Fullname',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DNI'); ?>
		<?php echo $form->textField($model,'DNI',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'DNI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Birthdate'); ?>
		<?php echo $form->textField($model,'Birthdate'); ?>
		<?php echo $form->error($model,'Birthdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gender'); ?>
		<?php echo $form->textField($model,'Gender'); ?>
		<?php echo $form->error($model,'Gender'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->