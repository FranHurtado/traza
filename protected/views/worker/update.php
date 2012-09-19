<?php
/* @var $this WorkerController */
/* @var $model Worker */

$this->breadcrumbs=array(
	'Workers'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Worker', 'url'=>array('index')),
	array('label'=>'Create Worker', 'url'=>array('create')),
	array('label'=>'View Worker', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Worker', 'url'=>array('admin')),
);
?>

<h1>Update Worker <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>