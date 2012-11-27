<?php
/* @var $this ProductController */
/* @var $model Product */

$this->menu=array(
	array('label'=>'Ver Productos', 'url'=>array('admin')),
);

$this->help="- Rellena todos los campos del formulario y pulsa guardar.<br /><br />
			- Selecciona la frecuencia con la que fabricas el producto (dia, semana o mes).";
?>

<h1>Crear nuevo producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<a href="<?php echo Yii::app()->createURL("Trazabilidad"); ?>" class="backButton">Men&uacute;</a>