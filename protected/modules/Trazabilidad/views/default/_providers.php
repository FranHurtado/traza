<div style='width:100%;'>
	<table width="100%" cellpadding="10">
		<tr>
			<td colspan="7" style="font-size:14pt;font-weight:bold;padding:20px;text-align:center;">
				FICHA DE PROVEEDORES
			</td>
		</tr>
		<tr>
			<td>Proveedor</td>
			<td>Direccion</td>
			<td>Telefono</td>
			<td>Persona contacto</td>
			<td>NRGSEAA</td>
			<td>Materia primas</td>
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