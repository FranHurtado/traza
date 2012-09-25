<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionInforme()
	{
		# HTML2PDF has very similar syntax
        $html2pdf = Yii::app()->ePdf->HTML2PDF("L");
        $html2pdf->WriteHTML($this->renderPartial("_cover", array(), true));
        $html2pdf->Output();
	}
}