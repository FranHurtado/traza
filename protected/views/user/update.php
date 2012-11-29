<?php
/* @var $this UserController */
/* @var $model User */

$this->help="- Modifica los campos del formulario que necesites y pulsa guardar.<br /><br />
				- Se utilizaran los parametros para completar los informes de APPC y Trazabilidad.";

?>

<h1>Modificar los datos de la empresa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<a href="<?php echo Yii::app()->createURL("./"); ?>" class="backButton">Men&uacute;</a>