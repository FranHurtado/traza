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
	        set_time_limit(600);
	        
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
	        $pdf->WriteHTML($this->renderPartial('_providers', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_merchandise', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_recipes', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_production', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_verificationCocina', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_verificationCamaras', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_verificationServicios', array(), true));
	        $pdf->Addpage();
	        $pdf->WriteHTML($this->renderPartial('_verificationBasuras', array(), true));
	 
	        # Outputs ready PDF
	        $pdf->Output('Trazabilidad_'.date("d/m/Y").'.pdf','D');
        }else{
	        $this->render('selector');
        }
	}
	
}