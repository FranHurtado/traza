<?php
/* @var $this RecipeController */
/* @var $model Recipe */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recipe-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'UserID', array('value'=>Yii::app()->user->ID)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>
	
	<?php if(!$model->isNewRecord): ?>
		
		<div class="row">
			<?php echo $form->labelEx($modelRecipeRaw,'RawID'); ?>
			<?php echo $form->dropDownList($modelRecipeRaw,'RawID', CHtml::listData(Raw::model()->findAll(), 'ID', 'Name'), array('empty'=>'-- Selecciona materia prima para a&ntilde;adirla a la receta --','style'=>'width:90%;')); ?>
			<?php echo $form->error($modelRecipeRaw,'RawID'); ?>
		</div><br /><br />
		
		<div id="ingredients">
			<label>Ingredientes: </label><br />
			<?php foreach($modelIngredients as $raw): ?>
				<?php echo "<div style='border: 1px solid #aaa;width:80%;padding:10px;background:#cdcdcd;'><a class='rawDelete' id='". $raw->ID ."'>X</a> " . $raw->raw->Name . "</div><br />"; ?>
			<?php endforeach; ?>
		</div>
		
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<script>
	$("#RecipeRaw_RawID").change(function(){
		var request = $.ajax({
			url: "<?php echo $this->createURL("recipe/AddRaw"); ?>",
	  		type: "POST",
				data: {
						rawID : $(this).val(), 
						recipeID : '<?php echo $model->ID; ?>', 
				},
				dataType: "html"
		});

		request.done(function(msg) {
			$("#error").remove();
			$("#ingredients").html(msg);
		});

		request.fail(function(jqXHR, textStatus) {
				alert( "Error: " + textStatus );
		});
	});
	
	$(".rawDelete").click(function(){
		if(confirm("Haz click en Aceptar para eliminar este ingrediente."))
		{
			var request = $.ajax({
				url: "<?php echo $this->createURL("recipe/DeleteRaw"); ?>",
		  		type: "POST",
					data: {
							ID : $(this).attr("id"), 
					},
					dataType: "html"
			});
	
			request.done(function(msg) {
				$("#error").remove();
				$("#ingredients").html(msg);
			});
	
			request.fail(function(jqXHR, textStatus) {
					alert( "Error: " + textStatus );
			});
		}
	});
</script>