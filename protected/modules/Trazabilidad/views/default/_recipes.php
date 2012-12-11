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
			$modelRecipes = Recipe::model()->findAll("UserID = 21 OR UserID = " . Yii::app()->user->ID . "");
			foreach($modelRecipes as $Recipe):
				$modelRecipeRaws = RecipeRaw::model()->findAllByAttributes(array("RecipeID" => $Recipe->ID));
				$finalRecipeRaws = "";
				foreach($modelRecipeRaws as $RecipeRaw):
					$finalRecipeRaws.=$RecipeRaw->recipe->Name . "(". $RecipeRaw->Quantity ." " . $RecipeRaw->Type . ")<br /> ";
				endforeach;
		?>
				<tr>
					<td style="border: 1px solid #555;"><?php echo $Recipe->Name; ?></td>
					<td style="border: 1px solid #555;"><?php echo $finalRecipeRaws; ?></td>
					<td style="border: 1px solid #555;">- Lavado de ingredientes<br />- Mezclado de ingredientes<br />- Conservacion en condiciones optimas<br />- Emplatado<br />- Servicio<br /></td>
					<td style="border: 1px solid #555;"></td>
				</tr>
		<?php
			endforeach;
		?>
		
		<tr>
			<td colspan="8"></td>
		</tr>

		<tr>
			<td colspan="2"></td>
			<td colspan="2" style="border: 1px solid #555;" valign="top">Firma del responsable: </td>
		</tr>
		
	</table>
</div>