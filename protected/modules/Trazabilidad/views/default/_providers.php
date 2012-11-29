<div style='width:100%;'>
	<table width="100%" cellpadding="10" style="border: 1px solid #555;">
		<tr>
			<td colspan="6" style="font-size:14pt;font-weight:bold;padding:20px;text-align:center;">
				FICHA DE PROVEEDORES
			</td>
		</tr>
		<tr>
			<td style="border: 1px solid #555;"><b>Proveedor</b></td>
			<td style="border: 1px solid #555;"><b>Direccion</b></td>
			<td style="border: 1px solid #555;"><b>Telefono</b>>/td>
			<td style="border: 1px solid #555;"><b>Persona contacto</b></td>
			<td style="border: 1px solid #555;"><b>NRGSEAA</b></td>
			<td style="border: 1px solid #555;"><b>Materia primas</b></td>
		</tr>
		
		<?php 
			$modelProviders = Provider::model()->findAllByAttributes(array("UserID" => Yii::app()->user->ID));
			foreach($modelProviders as $Provider):
				$modelRaws = Raw::model()->findAllByAttributes(array("ProviderID" => $Provider->ID, "UserID" => Yii::app()->user->ID));
				$finalRaws = "";
				foreach($modelRaws as $Raw):
					$finalRaws.=$Raw->Name . ", ";
				endforeach;
					
		?>
				<tr>
					<td><?php echo $Provider->Name; ?></td>
					<td><?php echo $Provider->Address; ?></td>
					<td><?php echo $Provider->Phone; ?></td>
					<td><?php echo $Provider->Contact; ?></td>
					<td><?php echo $Provider->Nrgseaa; ?></td>
					<td><?php echo $finalRaws; ?></td>
				</tr>
		<?php
			endforeach;
		?>
	</table>
</div>