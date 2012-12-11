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
	</div><br /><br />
	
	<?php if(!$model->isNewRecord): ?>
		
		<div  style="float: left;width: 40%;">
		<div class="row">
			<?php echo $form->labelEx($modelRecipeRaw,'RawID'); ?>
			<?php echo $form->dropDownList($modelRecipeRaw,'RawID', CHtml::listData(Raw::model()->findAll(), 'ID', 'Name'), array('empty'=>'-- Selecciona materia prima --','style'=>'width:100%;')); ?>
			<?php echo $form->error($modelRecipeRaw,'RawID'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($modelRecipeRaw,'Quantity'); ?>
			<?php echo $form->textField($modelRecipeRaw,'Quantity',array('size'=>20,'maxlength'=>100)); ?>
			<?php echo $form->dropDownList($modelRecipeRaw,'Type', array("und."=>"und.", "mg."=>"mg.", "gr."=>"gr.", "kg."=>"kg.", "ml."=>"ml.", "cl."=>"cl.", "l."=>"l."), 
											array('empty'=>'- Und -', 'style' => 'width: 72px;')); ?>
			<?php echo $form->error($modelRecipeRaw,'Quantity'); ?>
		</div><br />
		<a id="addRecipeRaw" style="padding: 10px 15px;background: #A6D5F7; border: 2px solid #454384;color:#333;cursor:pointer;text-decoration:none;">
			A&ntilde;adir ingrediente
		</a><br /><br />
		</div>
		
		<div id="ingredients" style="width: 50%;float: left;margin-left: 50px;">
			<label>Ingredientes: </label><br />
			<?php foreach($modelIngredients as $raw): ?>
				<?php echo "<div style='border: 1px solid #aaa;width:80%;padding:10px;background:#cdcdcd;'><a class='rawDelete' id='". $raw->ID ."'>X</a> " . $raw->raw->Name . " (" . $raw->Quantity . " " . $raw->Type . ")</div><br />"; ?>
			<?php endforeach; ?>
		</div>
		
		<div style="clear:both;"></div>
		
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<script type="text/javascript">
	jQuery("#addRecipeRaw").click(function(){
		var request = $.ajax({
			url: "<?php echo $this->createURL("recipe/AddRaw"); ?>",
	  		type: "POST",
			data: {
				rawID : $("#RecipeRaw_RawID").val(), 
				recipeID : '<?php echo $model->ID; ?>',
				quantity : $("#RecipeRaw_Quantity").val(),
				type :  $("#RecipeRaw_Type").val()
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
	
	jQuery(".rawDelete").click(function(){
		if(confirm("Haz click en Aceptar para eliminar este ingrediente."))
		{
			var request = $.ajax({
				url: "<?php echo $this->createURL("recipe/DeleteRaw"); ?>",
		  		type: "POST",
				data: {
						ID : $(this).attr("id") 
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