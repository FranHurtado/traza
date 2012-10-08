<?php
/* @var $this RawController */
/* @var $model Raw */

$this->menu=array(
	array('label'=>'Ver Materias Primas', 'url'=>array('admin')),
);

$this->help="- Rellena todos los campos del formulario y pulsa guardar.";
			 
?>

<h1>Crear materia prima</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<a href="<?php echo Yii::app()->createURL("Trazabilidad"); ?>" class="backButton">Men&uacute;</a>