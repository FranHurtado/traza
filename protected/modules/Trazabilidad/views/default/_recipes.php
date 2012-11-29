<div style='width:100%;'>
	<table width="100%" cellpadding="10">
		<tr>
			<td colspan="8" style="font-size:14pt;font-weight:bold;padding:20px;text-align:center;border: 1px solid #555;">
				FICHA DE PREPARACI&Oacute;N Y PROCESOS
			</td>
		</tr>
		<tr>
			<td style="border: 1px solid #555;"><b>Receta</b></td>
			<td style="border: 1px solid #555;"><b>Ingredientes</b></td>
			<td style="border: 1px solid #555;"><b>Etapas</b></td>
			<td style="border: 1px solid #555;"><b>Observaciones</b></td>
		</tr>
		
		<?php 
			$modelRecipe = Recipe::model()->findAllByAttributes(array("UserID" => Yii::app()->user->ID));
			foreach($modelRecipe as $Recipe):
				$modelRecipeRaws = RecipeRaw::model()->findAllByAttributes(array("RecipeID" => $Recipe->ID));
				$finalRecipeRaws = "";
				foreach($modelRecipeRaws as $RecipeRaw):
					$finalRecipeRaws.=$RecipeRaw->Name . "(". $RecipeRaw->Quantity ." " . $RecipeRaw->Type . ")<br /> ";
				endforeach;
		?>
				<tr>
					<td><?php echo $Recipe->Name; ?></td>
					<td><?php echo $finalRecipeRaws; ?></td>
					<td>- Lavado de ingredientes<br />- Mezclado de ingredientes<br />- Conservacion en condiciones optimas<br />- Emplatado<br />- Servicio<br /></td>
					<td></td>
				</tr>
		<?php
			endforeach;
		?>
		
		<tr>
			<td colspan="8"></td>
		</tr>

		<tr>
			<td colspan="2" style="border: 1px solid #555;"></td>
			<td colspan="2" style="border: 1px solid #555;" valign="top">Firma del responsable: </td>
		</tr>
		
	</table>
</div>