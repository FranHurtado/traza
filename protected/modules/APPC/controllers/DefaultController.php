<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionInforme()
	{   
    	if($_POST["start"]){
	        # mPDF
	        $pdf = Yii::app()->ePdf->mpdf('', 'A4', '','','','','','','','','P');
	
	        $pdf->writeHTMLfooter=false;
	        $pdf->writeHTMLheader=false;
	        $pdf->DeflMargin=5;
	        $pdf->DefrMargin=5;
	        $pdf->tMargin=5;
	        $pdf->bMargin=5;
	
	        $pdf->w=297;   //manually set width
	        $pdf->h=209.8; //manually set height
	 
	        # render (full page)
	        $pdf->WriteHTML($this->renderPartial('_cover', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_temperature', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_storage', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_clean', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_oil', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_rats', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_chlorine', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_verification', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_verification2', array(), true));
	 
	 
	        # Outputs ready PDF
	        $pdf->Output('APPC_'.date("d/m/Y").'.pdf','D');
        }else{
	        $this->render('selector');
        }
	}
}