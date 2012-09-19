<?php
/* @var $this DefaultController */

?>

<div class="contentbox" id="mainmenu" style="width:700px;">
	
	<div class="titleV">
		<h1>Men&uacute; de APPC</h1>
	</div>
	
	<div id="menu">
		<div class="buttonA"><p><a href="#">Operarios</a></p></div>
		<div class="buttonA"><p><a href="#">Puntos Cr&iacute;ticos</a></p></div>
		<div class="buttonA"><p><a href="#">Controles</a></p></div>
		<div class="buttonA"><p><a href="#">Informes</a></p></div>
		<div class="buttonA"><p><a href="#">Alertas</a></p></div>
		<div class="clear"></div>
	</div>

</div>

<a href="<?php echo Yii::app()->user->returnURL; ?>" class="backButtonV">Volver</a>