<?php
/* @var $this ControlController */
/* @var $model Control */

$this->menu=array(
	array('label'=>'Ver Controles', 'url'=>array('admin')),
);

$this->help="- Rellena todos los campos del formulario y pulsa guardar.";
?>

<h1>Crear nuevo control</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<a href="<?php echo Yii::app()->createURL("APPC"); ?>" class="backButtonA">Men&uacute;</a>