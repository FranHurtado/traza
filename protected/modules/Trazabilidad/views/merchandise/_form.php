<?php
/* @var $this MerchandiseController */
/* @var $model Merchandise */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'merchandise-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'UserID', array('value'=>Yii::app()->user->ID)); ?>
	<?php echo $form->hiddenField($model,'State'); ?>
	<?php echo $form->hiddenField($model,'Temperature'); ?>
	<?php echo $form->hiddenField($model,'Conditions'); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'ProviderID'); ?>
		<?php echo $form->dropDownList($model,'ProviderID', CHtml::listData(Provider::model()->findAll(), 'ID', 'Name'), 
											array('empty'=>'-- Selecciona el proveedor --', 'style' => 'width: 360px;')); ?>
		<?php echo $form->error($model,'ProviderID'); ?>
	</div>
	
	<div class="row" style="float:left;">
		<?php echo $form->labelEx($model,'Date'); ?>
		<?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
              'model'=>$model,
              'attribute'=>'Date',
              'value'=>$model->Date,
              // additional javascript options for the date picker plugin
              'options'=>array(
                'changeYear'=>true,
                'yearRange'=>'1930',
                'language'=>'es',
                'dateFormat'=>'yy-mm-dd',
                'monthNames' => array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"),
                'monthNamesShort' => array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"),
                'dayNames' => array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"),
                'dayNamesMin' => array('Do','Lu','Ma','Mi','Ju','Vi','Sa'),
                'defaultDate'=>$model->Date,
              ),
              'htmlOptions'=>array(
                'placeholder'=>date("Y-m-d"),
              ),
            ));
        ?>
		<?php echo $form->error($model,'Date'); ?>
	</div>
	
	<div class="row" style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'RawID'); ?>
		<?php echo $form->dropDownList($model,'RawID', CHtml::listData(Raw::model()->findAll(), 'ID', 'Name'), 
											array('empty'=>'-- Selecciona la materia prima --', 'style' => 'width: 300px;')); ?>
		<?php echo $form->error($model,'RawID'); ?>
	</div>
	
	<div style="clear:both;"></div>

	<div class="row">
		<?php echo $form->labelEx($model,'Document'); ?>
		<?php echo $form->textField($model,'Document',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Document'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Expiration'); ?>
		<?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
              'model'=>$model,
              'attribute'=>'Expiration',
              'value'=>$model->Expiration,
              // additional javascript options for the date picker plugin
              'options'=>array(
                'changeYear'=>true,
                'yearRange'=>'1930',
                'language'=>'es',
                'dateFormat'=>'yy-mm-dd',
                'monthNames' => array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"),
                'monthNamesShort' => array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"),
                'dayNames' => array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"),
                'dayNamesMin' => array('Do','Lu','Ma','Mi','Ju','Vi','Sa'),
                'defaultDate'=>$model->Expiration,
              ),
              'htmlOptions'=>array(
                'placeholder'=>date("Y-m-d"),
              ),
            ));
        ?>
		<?php echo $form->error($model,'Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Comments'); ?>
		<?php echo $form->textArea($model,'Comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Comments'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->