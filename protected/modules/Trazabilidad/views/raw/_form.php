<?php
/* @var $this RawController */
/* @var $model Raw */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'raw-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'UserID', array('value'=>Yii::app()->user->ID)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'ProviderID'); ?>
		<?php echo $form->dropDownList($model,'ProviderID', CHtml::listData(Provider::model()->findAll(), 'ID', 'Name'), array('empty'=>'-- Selecciona el proveedor --','style'=>'width:90%;')); ?>
		<?php echo $form->error($model,'ProviderID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->