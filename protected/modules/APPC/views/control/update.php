<?php
/* @var $this ControlController */
/* @var $model Control */

$this->menu=array(
	array('label'=>'Ver Controles', 'url'=>array('admin')),
);

$this->help="- Modifica los campos del formulario que necesites y pulsa guardar.";
?>

<h1>Modificar el control: </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<a href="<?php echo Yii::app()->createURL("APPC"); ?>" class="backButton">Men&uacute;</a>