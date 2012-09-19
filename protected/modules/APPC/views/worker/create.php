<?php
/* @var $this WorkerController */
/* @var $model Worker */

$this->breadcrumbs=array(
	'Workers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Ver Operarios', 'url'=>array('admin')),
);
?>

<h1>Crear nuevo operario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>