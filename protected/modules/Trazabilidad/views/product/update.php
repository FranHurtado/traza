<?php
/* @var $this ProductController */
/* @var $model Product */

$this->menu=array(
	array('label'=>'Ver Productos', 'url'=>array('admin')),
);
?>

<h1>Modificar producto: </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<a href="<?php echo Yii::app()->createURL("Trazabilidad"); ?>" class="backButton">Men&uacute;</a>