<?php
/* @var $this WorkerController */
/* @var $model Worker */

$this->menu=array(
	array('label'=>'Ver Operarios', 'url'=>array('admin')),
);

$this->help="- Modifica los campos del formulario que necesites y pulsa guardar.";

?>

<h1>Modificar al operario:</h1><br />

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<a href="<?php echo Yii::app()->createURL("Trazabilidad"); ?>" class="backButton">Men&uacute;</a>