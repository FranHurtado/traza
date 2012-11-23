<?php
/* @var $this MerchandiseController */
/* @var $model Merchandise */

$this->menu=array(
	array('label'=>'Ver Mercancias', 'url'=>array('admin')),
);

$this->help="- Rellena todos los campos del formulario y pulsa guardar.";

?>

<h1>Crear entrada de mercancia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>