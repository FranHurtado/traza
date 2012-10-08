<?php
/* @var $this RawController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Raws',
);

$this->menu=array(
	array('label'=>'Create Raw', 'url'=>array('create')),
	array('label'=>'Manage Raw', 'url'=>array('admin')),
);
?>

<h1>Raws</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
