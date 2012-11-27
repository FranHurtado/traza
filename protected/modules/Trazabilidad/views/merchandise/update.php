<?php
/* @var $this MerchandiseController */
/* @var $model Merchandise */

$this->menu=array(
	array('label'=>'Ver Mercancias', 'url'=>array('admin')),
);


$this->help="- Rellena los campos del formulario a modificar y pulsa guardar.";
?>

<h1>Modificar mercancia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<a href="<?php echo Yii::app()->createURL("Trazabilidad"); ?>" class="backButton">Men&uacute;</a>
