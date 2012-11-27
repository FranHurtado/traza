<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
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
		<?php echo $form->labelEx($model,'RecipeID'); ?>
		<?php echo $form->dropDownList($model,'RecipeID', CHtml::listData(Recipe::model()->findAll(), 'ID', 'Name'), array('empty'=>'-- Selecciona la receta --','style'=>'width:62%;')); ?>
		<?php echo $form->error($model,'RecipeID'); ?>
	</div>

	<div class="row" style="float:left;">
		<?php echo $form->labelEx($model,'Code'); ?>
		<?php echo $form->textField($model,'Code',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'Code'); ?>
	</div>

	<div class="row" style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'Barcode'); ?>
		<?php echo $form->textField($model,'Barcode',array('size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'Barcode'); ?>
	</div>
	
	<div class="row" style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'ExpireDate'); ?>
		<?php echo $form->textField($model,'ExpireDate',array('size'=>9,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'ExpireDate'); ?>
	</div>
	
	<div style="clear:both"></div>
	
	<div class="row" style="float:left;">
		<?php echo $form->labelEx($model,'Quantity'); ?>
		<?php echo $form->textField($model,'Quantity',array('size'=>9,'maxlength'=>5)); ?>
		<?php echo $form->dropDownList($model,'Frequency', array(1=>"dia", 2=>"semana", 3=>"mes"), 
											array('empty'=>'- Frecuencia -', 'style' => 'width: 108px;')); ?>
		<?php echo $form->error($model,'Quantity'); ?>
	</div>

	<div class="row" style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'Price'); ?>
		<?php echo $form->textField($model,'Price',array('size'=>9,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'Price'); ?>
	</div>

	
	<div style="clear:both"></div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->