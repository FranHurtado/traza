<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row" style="float:left;">
		<?php echo $form->labelEx($model,'zipcode'); ?>
		<?php echo $form->textField($model,'zipcode',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'zipcode'); ?>
	</div>

	<div class="row" style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row" style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>
	
	<div style="clear:both;"></div>

	<div class="row" style="float:left;">
		<?php echo $form->labelEx($model,'camaras'); ?>
		<?php echo $form->textField($model,'camaras',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'camaras'); ?>
	</div>

	<div class="row" style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'freidoras'); ?>
		<?php echo $form->textField($model,'freidoras',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'freidoras'); ?>
	</div>

	<div class="row" style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'cebos'); ?>
		<?php echo $form->textField($model,'cebos',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'cebos'); ?>
	</div>

	<div class="row" style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'trampas'); ?>
		<?php echo $form->textField($model,'trampas',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'trampas'); ?>
	</div>
	
	<div style="clear:both;"></div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->