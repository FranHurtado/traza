<div style='width:100%;'>
	<table width="100%" cellpadding="10">
		<tr>
			<td colspan="8" style="font-size:14pt;font-weight:bold;padding:20px;text-align:center;border: 1px solid #555;">
				FICHA DE ENTRADA DE MERCANCIAS
			</td>
		</tr>
		<tr>
			<td style="border: 1px solid #555;"><b>Fecha</b></td>
			<td style="border: 1px solid #555;"><b>Materia prima</b></td>
			<td style="border: 1px solid #555;"><b>Proveedor</b></td>
			<td style="border: 1px solid #555;"><b>Lote / Albaran</b></td>
			<td style="border: 1px solid #555;"><b>Estado</b></td>
			<td style="border: 1px solid #555;"><b>Temperatura</b></td>
			<td style="border: 1px solid #555;"><b>Caducidad</b></td>
			<td style="border: 1px solid #555;"><b>Observaciones</b></td>
		</tr>
		
		<?php 
			$modelMerchandise = Merchandise::model()->findAllByAttributes(array("UserID" => Yii::app()->user->ID));
			foreach($modelMerchandise as $Merchandise):
		?>
				<tr>
					<td><?php echo $Merchandise->Date; ?></td>
					<td><?php echo $Merchandise->raw->Name; ?></td>
					<td><?php echo $Merchandise->provider->Name; ?></td>
					<td><?php echo $Merchandise->Document; ?></td>
					<td>Correcto</td>
					<td>Correcta</td>
					<td><?php echo $Merchandise->Expiration; ?></td>
					<td><?php echo $Merchandise->Comments; ?></td>
				</tr>
		<?php
			endforeach;
		?>
		
		<tr>
			<td colspan="8"></td>
		</tr>

		<tr>
			<td colspan="6" style="border: 1px solid #555;">
				1.- Comprobar documentaci&oacute;n.<br />
				2.- Comprobar caducidades.<br />
				3.- Comprobar aspecto.<br />
				4.- Comprobar temeperatura (4-8C refrigrerados y <-18C congelados).
			</td>
			<td colspan="2" style="border: 1px solid #555;" valign="top">Firma del responsable: </td>
		</tr>
		
	</table>
</div>