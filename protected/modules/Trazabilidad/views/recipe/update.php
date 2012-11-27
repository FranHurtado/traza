<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->menu=array(
	array('label'=>'Ver Recetas', 'url'=>array('admin')),
);

$this->help="- Modifica los campos del formulario que necesites y pulsa guardar.";

?>

<h1>Modificar receta:</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelRaws'=>$modelRaws,
			'modelRecipeRaw'=>$modelRecipeRaw,'modelIngredients'=>$modelIngredients,)); ?>
			
<a href="<?php echo Yii::app()->createURL("Trazabilidad"); ?>" class="backButton">Men&uacute;</a>