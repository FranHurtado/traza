<?php
/* @var $this MerchandiseController */
/* @var $model Merchandise */

$this->menu=array(
	array('label'=>'Nueva Mercancia', 'url'=>array('create')),
);

?>

<h1>Listado de entradas de mercancias</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'raw-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'hideHeader'=>true,
	'columns'=>array(
		'Date',
		'provider.Name',
		'raw.Name',
		array(	
	        'class'=>'CButtonColumn',
	        'template'=>'{update} {delete}',
	        'buttons' => array(
	            'update' => array(
	            	'label' => 'Editar',
	            	'imageUrl' => false,
	            ),
	            'delete' => array(
	            	'label' => 'Borrar',
	                'imageUrl' => false,
	            ),
	        ),
	        'deleteConfirmation'=>'Si aceptas eliminaras este registro definitivamente.',
	     ),
	),
	'emptyText' => 'No hay registros.',
    'summaryText' => 'Mostrando del {start} al {end} de {count} registro(s).',
)); ?>

<?php
	$dp = $model->search();
	if($dp->totalItemCount == 0){ ?> <script>$(".filters").hide();</script> <?php }
?>

<a href="<?php echo Yii::app()->createURL("Trazabilidad"); ?>" class="backButton">Men&uacute;</a>
