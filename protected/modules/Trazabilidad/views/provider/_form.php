<?php
/* @var $this ProviderController */
/* @var $model Provider */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'provider-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'UserID', array('value'=>Yii::app()->user->ID)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Address'); ?>
		<?php echo $form->textField($model,'Address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Contact'); ?>
		<?php echo $form->textField($model,'Contact',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nrgseaa'); ?>
		<?php echo $form->textField($model,'Nrgseaa'); ?>
		<?php echo $form->error($model,'Nrgseaa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->