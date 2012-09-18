<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="contentbox" id="mainmenu">
	
	<div class="title">
		<h1>Elija una opci&oacute;n</h1>
	</div>
	
	<div id="menu">
		<div class="button"><p><a href="<?php echo Yii::app()->createURL("Trazabilidad/default/index"); ?>">Trazabilidad</a></p></div>
		<div class="button"><p><a href="<?php echo Yii::app()->createURL("APPC/default/index"); ?>">APPC</a></p></div>
		<div class="clear"></div>
	</div>

</div>