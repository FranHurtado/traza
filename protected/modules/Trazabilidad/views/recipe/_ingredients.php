<label>Ingredientes: </label><br />
<?php foreach($modelIngredients as $raw): ?>
	<?php echo "<div style='border: 1px solid #aaa;width:80%;padding:10px;background:#cdcdcd;'><a class='rawDelete' id='". $raw->ID ."'>X</a> " . $raw->raw->Name . "</div><br />"; ?>
<?php endforeach; ?>

<script>	
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