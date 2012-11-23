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
	
	<div style="clear:both"></div>

	<div class="row">
		<?php echo $form->labelEx($model,'Price'); ?>
		<?php echo $form->textField($model,'Price',array('size'=>9,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'Price'); ?>
	</div>

	<div class="row" style="float:left;">
		<?php echo $form->labelEx($model,'ExpireDate'); ?>
		<?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
              'model'=>$model,
              'attribute'=>'ExpireDate',
              'value'=>$model->ExpireDate,
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
                'defaultDate'=>$model->ExpireDate,
              ),
              'htmlOptions'=>array(
                'placeholder'=>date("Y-m-d"),
              ),
            ));
        ?>
		<?php echo $form->error($model,'ExpireDate'); ?>
	</div>

	<div class="row"  style="float:left;margin-left:50px;">
		<?php echo $form->labelEx($model,'MadeDate'); ?>
		<?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
              'model'=>$model,
              'attribute'=>'MadeDate',
              'value'=>$model->MadeDate,
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
                'defaultDate'=>$model->MadeDate,
              ),
              'htmlOptions'=>array(
                'placeholder'=>date("Y-m-d"),
              ),
            ));
        ?>
		<?php echo $form->error($model,'MadeDate'); ?>
	</div>
	
	<div style="clear:both"></div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->