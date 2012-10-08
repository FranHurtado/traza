<?php
/* @var $this ProviderController */
/* @var $model Provider */

$this->menu=array(
	array('label'=>'Ver Proveedores', 'url'=>array('admin')),
);

$this->help="- Rellena todos los campos del formulario y pulsa guardar.<br /><br />
			 - NRGSEAA es el numero de registro general sanitario de alimentos."; 
?>

<h1>Crear nuevo proveedor</h1><br />

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<a href="<?php echo Yii::app()->createURL("Trazabilidad"); ?>" class="backButton">Men&uacute;</a>