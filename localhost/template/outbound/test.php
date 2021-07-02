<?php

/*call the FPDF library*/
//include('chinese.php');
require('../assets/invoice/tfpdf.php');
// require('../assets/invoice/tfpdf.php');
define('FPDF_FONTPATH','../assets/invoice/font');


class PDF extends tFPDF {

	function addCompanyName( $company_name ){

		$this->SetFont('Arial','B',28.5);
		// $this->Cell(71 ,10,'',0,0);
		$this->Cell(0 ,25,$company_name,0,0,'C');
		$this->Ln(); //换行
		// $this->Cell(59 ,10,'',0,1);
	}

	function addAdress( $address ){

		$this->SetFont('Arial','',11.5);
		$this->Cell(20 ,5,'',0,0);
		$this->MultiCell(150 ,5,$address, 0, 'C');
		$this->Ln(); //换行
	}

	function addCompanyInfo( $tel, $email ){

		$this->SetFont('Arial','',11.5);
		$this->Cell(0,0,$tel,0,0,'C');
		$this->Ln(); //换行
		$this->Cell(0,10,$email,0,0,'C');
		$this->Ln(); //换行

		// $this->Cell(59 ,10,'',0,1);
	}

	function addCustomerInfo( $messer, $customer, $tel, $email, $address , $invoice_no, $invoice_data){

		$this->SetFont('AppliMincho','',9.5, 'L');
		$this->Cell(20,5, "Messer:",0,0,'L');
		$this->Cell(120,5, $messer,0,0,'L');


		$this->Cell(25,5,"Invoice No: ",0,0,'L');
		$this->Cell(10,5,$invoice_no,0,0,'L');

		$this->Ln(); //换行
		$this->Cell(20,5,"Customer: ",0,0,'L');
		$this->Cell(120,5,$customer,0,0,'L');
		$this->Cell(25,5,"Invoice Data: ",0,0,'L');
		$this->Cell(0,5,$invoice_data,0,0,'L');
		$this->Ln(); //换行

		$this->Cell(20,5,"Tel: ",0,0,'L');
		$this->Cell(0,5,$tel,0,0,'L');
		$this->Ln(); //换行
		$this->Cell(20,5,"Email: ",0,0,'L');
		$this->Cell(0,5,$email,0,0,'L');
		$this->Ln(); //换行
		$this->Cell(20,5,"Address: ",0,0,'L');
		$this->Cell(0,5,$address,0,0,'L');
		$this->Ln(); //换行

	}

	function addProdcutInfo(){

		$this->SetFont('han','',9.5);
		$this->Cell(10 ,6,"",1,0,'C');
		$this->Cell(80 ,6,"商品名稱あいうえお",1,0,'C');
		$this->Cell(23 ,6,"容量",1,0,'C');
		$this->Cell(30 ,6,"售價",1,0,'C');
		$this->Cell(20 ,6,"數量",1,0,'C');
		$this->Cell(25 ,6,'金額',1,1,'C');
		// $this->Ln(); //换行

		$this->SetFont('GenShinGothic','',9.5);

		// $this->Cell(10 ,6,'1',1,0,'C');
		// $this->Cell(80 ,6,'2',1,0,'C');
		// $this->Cell(23 ,6,'3',1,0,'C');
		// $this->Cell(30 ,6,'4',1,0,'C');
		// $this->Cell(20 ,6,'5',1,0,'C');
		// $this->Ln(); //换行

		/*Heading Of the table end*/
		for ($i = 0; $i <= 10; $i++) {
			$this->Cell(10 ,6,$i,1,0,'C');
			$this->Cell(80 ,6,'アイウエオ',1,0);
			$this->Cell(23 ,6,'1',1,0,'C');
			$this->Cell(30 ,6,'15000.00',1,0,'C');
			$this->Cell(20 ,6,'100.00',1,0,'C');
			$this->Cell(25 ,6,'100.00',1,0,'C');
			$this->Ln(); //换行

			// $this->Cell(25 ,6,'15100.00',1,1,'R');
		}
		$this->SetFont('Arial','',9.5);

		$this->Cell(10 ,6,"",0,0,'C');
		$this->Cell(80 ,6,"",0,0,'C');
		$this->Cell(23 ,6,"",0,0,'C');
		$this->Cell(30 ,6,"Total: ",1,0,'C');
		$this->Cell(20 ,6,"xxxxx",1,0,'C');
		$this->Cell(25 ,6,'',1,1,'C');


		$this->SetFont('Arial','B',9.5);
		$this->Cell(10 ,6,"Payment Terms",0,0,'L');
		$this->SetFont('Arial','',9.5);
		$this->Cell(80 ,6,"",0,0,'C');
		$this->Cell(23 ,6,"",0,0,'C');
		$this->Cell(30 ,6,"",0,0,'C');
		$this->Cell(20 ,6,"Amount:",1,0,'C');
		$this->Cell(25 ,6,'xxxxx',1,1,'C');

		// $this->Ln(); //换行
		// $this->SetFont('Arial','', 9.5);
		$this->Cell(0 ,6,"**Under the law of Hong Kong, intoxicating liquor must not be sold or supplied to a minor in the course of business**",0,0,'L');


	}

	function addAccountInfo( ){
		$this->SetFont('AppliMincho','',14.5);

		$this->Ln(); //换行
		$this->Ln(); //换行
		$this->Cell(0,5,"Account Info",0,0,'L');
		$this->Ln(); //换行
		$this->Cell(0,5,"HSBC ",0,0,'L');
		$this->Ln(); //换行
		$this->Cell(0,5,"521-013805-001",0,0,'L');
		$this->Ln(); //换行
		$this->Cell(0,5,"Hanabi international Limited",0,0,'L');
		$this->Ln(); //换行
		$this->Ln(); //换行





		// ==================================Test==================================
		$this->SetFont('GenShinGothic','',18);
		$this->Cell(0 ,6,iconv('UTF-8', 'windows-1252', "123123"),0,0,'L');
		$this->Ln(); //换行
		$this->Cell(0 ,6,iconv('UTF-8', 'windows-1252', "あ"),0,0,'L');
		$this->Ln(); //换行
		$this->Cell(0 ,6,iconv('UTF-8', 'windows-1252', "123123"),0,0,'L');
		$this->Ln(); //换行
		$this->SetFont('AppliMincho','',14.5);
		// ==================================Test==================================






		$this->Cell(0,5,"轉數快",0,0,'L');
		$this->Ln(); //换行
		$this->Cell(0,5,"161401187",0,0,'L');
		$this->Ln(); //换行
		$this->Cell(0,5,"Hanabi international Limited",0,0,'L');
		$this->Ln(); //换行



	}

}




// $pdf->AddPage();

// // Add a Unicode font (uses UTF-8)
// // $pdf->AddGBFont('simhei', '黑体');
// // $pdf->AddGBFont('simhei', '黑体');
// // $pdf->AddGBFont('ubuntu', '');
// $pdf->AddFont('AppliMincho','','AppliMincho.php');
// // $pdf->AddGBFont('Nexa Light', 'Nexa Light');
// // $pdf->AddGBFont('AppliMincho', 'AppliMincho');

// $pdf->SetFont('AppliMincho','',14);

// $pdf->Cell(0 ,25,"123324明日でも",0,0,'C');
// $pdf->Ln();


$pdf = new PDF();
// Add font from data file 'font/'
$pdf->AddFont('simhei','','simhei.php');

//$pdf->AddFont('chinese','','chinese.php');

$pdf->AddFont('han','','SourceHanSerifTC-Regular.php');
// $pdf->AddFont('ubuntu','','ubuntu.php');
// $pdf->AddFont('Nexa Bold', 'Nexa Bold');
// $pdf->AddFont('Nexa Light', 'Nexa Light');

$pdf->AddFont('AppliMincho','','AppliMincho.php');
$pdf->AddFont('GenShinGothic','','GenShinGothic-Regular.php');
// $pdf->AddFont('NotoSerifJP','','NotoSerifJP-Regular.ttf', true);

// $pdf->AddFont('AppliMincho', 'AppliMincho');



$pdf->AddPage();


$pdf->addCompanyName("Hanabi International Limited");
$pdf->addAdress("FLAT 05 9/F YUEN FAT INDUSTRIAL BUILDING 25 WANG CHIU ROAD KOWLOON BAY");
$pdf->addCompanyInfo("Customer Service Hotline - What's App : (852) 6514 4411", "internationalhanabi@gmail.com");

$pdf->SetFont('AppliMincho','',16.5);
$pdf->Cell(0,20,"INVOICE",0,0,'C');
$pdf->Ln();//换行

$pdf->addCustomerInfo("酒蛙Sakewa Eugene", "酒蛙Sakewa Eugene", "酒蛙Sakewa Eugene", "email@gmail.com", "1305室 香港觀塘巧明街106號冠力工業大廈", "JP123456", "2021-6-21");
$pdf->addProdcutInfo();
$pdf->addAccountInfo();
// $pdf->SetFont('AppliMincho','',16.5);
// $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1255', "あ"));


$pdf->Output();

?>
