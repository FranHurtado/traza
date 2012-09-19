<?php
/* @var $this PointController */
/* @var $model Point */

$this->menu=array(
	array('label'=>'Ver Puntos Criticos', 'url'=>array('admin')),
);

$this->help="- Rellena todos los campos del formulario y pulsa guardar.";

?>

<h1>Crear nuevo punto cr&iacute;tico</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<a href="<?php echo Yii::app()->createURL("APPC"); ?>" class="backButton">Men&uacute;</a>