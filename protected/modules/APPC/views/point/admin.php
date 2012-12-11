<?php
/* @var $this PointController */
/* @var $model Point */

$this->menu=array(
	array('label'=>'Nuevo Punto Critico', 'url'=>array('create')),
);

$this->help = "- Para crear un nuevo punto cr&iacute;tico pulsa el bot&oacute;n \"Nuevo Punto Critico\".<br /><br />
			   - Puede realizar busquedas escribiendo en las cabeceras de los campos."; 

?>

<h1>Listado de puntos cr&iacute;ticos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'point-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'hideHeader'=>true,
	'columns'=>array(
		'Name',
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

<a href="<?php echo Yii::app()->createURL("APPC"); ?>" class="backButtonA">Men&uacute;</a>
