<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->menu=array(
	array('label'=>'Ver Recetas', 'url'=>array('admin')),
);

$this->help="- Rellena todos los campos del formulario y pulsa guardar.";

?>

<h1>Crear nueva receta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<a href="<?php echo Yii::app()->createURL("Trazabilidad"); ?>" class="backButton">Men&uacute;</a>