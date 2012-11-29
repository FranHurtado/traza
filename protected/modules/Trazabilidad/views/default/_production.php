<div style='width:100%;'>
	<table width="100%" cellpadding="10">
		<tr>
			<td colspan="8" style="font-size:14pt;font-weight:bold;padding:20px;text-align:center;border: 1px solid #555;">
				INFORME DE PRODUCCI&Oacute;N
			</td>
		</tr>
	</table>
	
	<?php 
		$modelProducts = Product::model()->findAllByAttributes(array("UserID" => Yii::app()->user->ID));
		foreach($modelProducts as $Product):
			if($Product->Quantity > 0):
	?>
		
			<table style="border: 1px solid #333;border-collapse:collapse;margin-top:20px;" cellpadding="5" cellspacing="0">
				<tr>
					<td colspan="6" style="font:12pt Arial;font-weight:bold;border: 1px solid #555;">
						<?php echo $Product->Name; ?>
					</td>
				</tr>
				<tr>
					<td style="border: 1px solid #555;"><b>Fecha</b></td>
					<td style="border: 1px solid #555;"><b>Producto</b></td>
					<td style="border: 1px solid #555;"><b>Unidades</b></td>
					<td style="border: 1px solid #555;"><b>Ingredientes utilizados</b></td>
					<td style="border: 1px solid #555;"><b>Acciones correctoras</b></td>
					<td style="border: 1px solid #555;"><b>Firma del responsable</b></td>
				</tr>
				
				<?php
					// Filtramos en funcion de la periodicidad
					switch($Product->Frequency)
					{
						case 1: // Frecuencia diaria
							
							$dias= (strtotime($_POST["start"])-strtotime($_POST["fin"]))/86400;
							$dias = abs($dias); $dias = floor($dias);
							
							for($i=0;$i<$dias;$i++):
								
								$ingredients = "";
								$modelIngredients = RecipeRaw::model()->findAllByAttributes(array("RecipeID" => $Product->recipe->ID));
								foreach($modelIngredients as $Ingredient):
									$ingredients.= "- " . $Ingredient->raw->Name . " (" . $Ingredient->Quantity . " " . $Ingredient->Type . ") <br /> ";
								endforeach;
								
								$newFecha = strtotime($_POST["start"]) + ($i * 86400);
								echo "<tr>";
									echo "<td style='border: 1px solid #555;'>" . date("d-m-Y", $newFecha) . "</td>";
									echo "<td style='border: 1px solid #555;'>" . $Product->Name . "</td>";
									echo "<td style='border: 1px solid #555;'>" . $Product->Quantity . "</td>";
									echo "<td style='border: 1px solid #555;'>" . $ingredients. "</td>";
									echo "<td style='border: 1px solid #555;'> </td>";
									echo "<td style='border: 1px solid #555;'> </td>";
								echo "</tr>";
	
							endfor;
							
						break;
						
						case 2: // Frecuencia semanal
							
							$semanas= (strtotime($_POST["start"])-strtotime($_POST["fin"]))/604800;
							$semanas = abs($semanas); $semanas = floor($semanas);
							
							for($i=0;$i<$semanas;$i++):
								
								$ingredients = "";
								$modelIngredients = RecipeRaw::model()->findAllByAttributes(array("RecipeID" => $Product->recipe->ID));
								foreach($modelIngredients as $Ingredient):
									$ingredients.= "- " . $Ingredient->raw->Name . " (" . $Ingredient->Quantity . " " . $Ingredient->Type . ") <br /> ";
								endforeach;
								
								$newFecha = strtotime($_POST["start"]) + ($i * 604800);
								$finalFecha = $newFecha + 604800;
								echo "<tr>";
									echo "<td style='border: 1px solid #555;'>" . date("d-m-Y", $newFecha) . " al " . date("d-m-Y", $finalFecha) . "</td>";
									echo "<td style='border: 1px solid #555;'>" . $Product->Name . "</td>";
									echo "<td style='border: 1px solid #555;'>" . $Product->Quantity . "</td>";
									echo "<td style='border: 1px solid #555;'>" . $ingredients. "</td>";
									echo "<td style='border: 1px solid #555;'> </td>";
									echo "<td style='border: 1px solid #555;'> </td>";
								echo "</tr>";
	
							endfor;
							
						break;
						
						case 3: // Frecuencia mensual
							
							$meses = (strtotime($_POST["start"])-strtotime($_POST["fin"]))/2592000;
							$meses = abs($meses); $meses = floor($meses);
							
							for($i=0;$i<$semanas;$i++):
								
								$ingredients = "";
								$modelIngredients = RecipeRaw::model()->findAllByAttributes(array("RecipeID" => $Product->recipe->ID));
								foreach($modelIngredients as $Ingredient):
									$ingredients.= "- " . $Ingredient->raw->Name . " (" . $Ingredient->Quantity . " " . $Ingredient->Type . ") <br /> ";
								endforeach;
								
								$newFecha = strtotime($_POST["start"]) + ($i * 2592000);
								$finalFecha = $newFecha + 2592000;
								echo "<tr>";
									echo "<td style='border: 1px solid #555;'>" . date("d-m-Y", $newFecha) . " al " . date("d-m-Y", $finalFecha) . "</td>";
									echo "<td style='border: 1px solid #555;'>" . $Product->Name . "</td>";
									echo "<td style='border: 1px solid #555;'>" . $Product->Quantity . "</td>";
									echo "<td style='border: 1px solid #555;'>" . $ingredients. "</td>";
									echo "<td style='border: 1px solid #555;'> </td>";
									echo "<td style='border: 1px solid #555;'> </td>";
								echo "</tr>";
	
							endfor;
							
						break;
					}
				?>
			</table>
	
	<?php
			endif;
		endforeach;
	?>
		
	</table>
</div>