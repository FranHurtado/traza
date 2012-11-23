<?php
/* @var $this MerchandiseController */
/* @var $model Merchandise */

$this->breadcrumbs=array(
	'Merchandises'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Merchandise', 'url'=>array('index')),
	array('label'=>'Create Merchandise', 'url'=>array('create')),
	array('label'=>'View Merchandise', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Merchandise', 'url'=>array('admin')),
);
?>

<h1>Update Merchandise <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>