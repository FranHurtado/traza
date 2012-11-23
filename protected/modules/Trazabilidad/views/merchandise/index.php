<?php
/* @var $this MerchandiseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Merchandises',
);

$this->menu=array(
	array('label'=>'Create Merchandise', 'url'=>array('create')),
	array('label'=>'Manage Merchandise', 'url'=>array('admin')),
);
?>

<h1>Merchandises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
