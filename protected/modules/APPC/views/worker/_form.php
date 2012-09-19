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

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Fullname'); ?>
		<?php echo $form->textField($model,'Fullname',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DNI'); ?>
		<?php echo $form->textField($model,'DNI',array('size'=>14,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'DNI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Birthdate'); ?>
		<?php echo $form->textField($model,'Birthdate', array('size'=>14,'placeholder'=>'aaaa-mm-dd')); ?>
		<?php echo $form->error($model,'Birthdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gender'); ?>
		<?php echo $form->dropDownList($model,'Gender',array(0=>'Hombre',1=>'Mujer')); ?>
		<?php echo $form->error($model,'Gender'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->