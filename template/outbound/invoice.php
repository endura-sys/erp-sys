<?php

/*call the FPDF library*/
require('../assets/invoice/chinese.php');
// require('../assets/invoice/tfpdf.php');
define('FPDF_FONTPATH','../assets/invoice/font');




class PDF extends PDF_Chinese {

	function addCompanyName( $company_name ){

		$this->SetFont('Nexa Bold','B',28.5);
		// $this->Cell(71 ,10,'',0,0);
		$this->Cell(0 ,25,$company_name,0,0,'C');
		$this->Ln();//换行
		// $this->Cell(59 ,10,'',0,1);
	}

	function addAdress( $address ){

		$this->SetFont('Nexa Light','',11.5);
		$this->Cell(20 ,5,'',0,0);
		$this->MultiCell(150 ,5,$address, 0, 'C');
		$this->Ln();//换行
	}

	function addCompanyInfo( $tel, $email ){

		$this->SetFont('simhei','',11.5);
		$this->Cell(0,0,$tel,0,0,'C');
		$this->Ln();//换行
		$this->Cell(0,10,$email,0,0,'C');
		$this->Ln();//换行

		// $this->Cell(59 ,10,'',0,1);
	}

}


$pdf = new PDF();
// Add font from data file 'font/'
$pdf->AddGBFont('simhei', '黑体');
$pdf->AddGBFont('ubuntu', '');
$pdf->AddGBFont('Nexa Bold', 'Nexa Bold');
$pdf->AddGBFont('Nexa Light', 'Nexa Light');
$pdf->AddGBFont('AppliMincho', 'AppliMincho');


$pdf->AddPage();


$pdf->addCompanyName("Hanabi International Limited");
$pdf->addAdress("FLAT 05 9/F YUEN FAT INDUSTRIAL BUILDING 25 WANG CHIU ROAD KOWLOON BAY");
$pdf->addCompanyInfo("Customer Service Hotline ・What’s App : (852) 6514 4411", "internationalhanabi@gmail.com");

$pdf->SetFont('simhei','',16.5);
$pdf->Cell(0,20,"INVOICE",0,0,'C');
$pdf->Ln();//换行

$pdf->SetFont('AppliMincho','',16.5);
$pdf->Cell(0,20,"あそ",0,0,'C');





// //自动换行
// $pdf->MultiCell(180,10,iconv("utf-8","gbk","中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行"));

// //显示一格
// $pdf->Cell(40,10,iconv("utf-8","gbk","12456789ghkdtj come with me"));
// $pdf->Ln();//换行
// $pdf->Cell(40, 10, "1234567890-=qwertyuiopasdfghjkl;'zxcvbnm,./[]/\'");
// $pdf->Ln();//换行
// $pdf->Cell(40, 10, "!@#$%^&*()_+QWERTYUIOP{}ASDFGHJKL:\"ZXCVBNM<>?");
// $pdf->Ln();//换行
// $pdf->Cell(40,10,iconv("utf-8","gbk","第二个单元格"));
// $pdf->Ln();//换行

// //输出表格
// //Cell方法最后一个参数表示是否显示边框
// $pdf->Cell(60,10,iconv("utf-8","gbk","姓名"),1);
// $pdf->Cell(60,10,iconv("utf-8","gbk","性别"),1);
// $pdf->Ln();
// $pdf->Cell(60,10,iconv("utf-8","gbk","张三"),1);
// $pdf->Cell(60,10,iconv("utf-8","gbk","男"),1);
// $pdf->Ln();
// $pdf->Cell(60,10,iconv("utf-8","gbk","李四"),1);
// $pdf->Cell(60,10,iconv("utf-8","gbk","女"),1);
// $pdf->Ln();



// $pdf->SetFont('simhei','B',15);
// $pdf->Cell(71 ,5,'WET',0,0);
// $pdf->Cell(59 ,5,'',0,0);
// $pdf->Cell(59 ,5,'Details',0,1);

// $pdf->SetFont('simhei','',10);

// $pdf->Cell(130 ,5,'Near DAV',0,0);
// $pdf->Cell(25 ,5,'Customer ID:',0,0);
// $pdf->Cell(34 ,5,'0012',0,1);

// $pdf->Cell(130 ,5,'Delhi, 751001',0,0);
// $pdf->Cell(25 ,5,'Invoice Date:',0,0);
// $pdf->Cell(34 ,5,'12th Jan 2019',0,1);

// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Invoice No:',0,0);
// $pdf->Cell(34 ,5,'ORD001',0,1);


// $pdf->SetFont('simhei','B',15);
// $pdf->Cell(130 ,5,'Bill To',0,0);
// $pdf->Cell(59 ,5,'',0,0);
// $pdf->SetFont('simhei','B',10);
// $pdf->Cell(189 ,10,'',0,1);



// $pdf->Cell(50 ,10,'',0,1);

// $pdf->SetFont('simhei','B',10);
// /*Heading Of the table*/
// $pdf->Cell(10 ,6,'Sl',1,0,'C');
// $pdf->Cell(80 ,6,'Description',1,0,'C');
// $pdf->Cell(23 ,6,'Qty',1,0,'C');
// $pdf->Cell(30 ,6,'Unit Price',1,0,'C');
// $pdf->Cell(20 ,6,'Sales Tax',1,0,'C');
// $pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
// /*Heading Of the table end*/
// $pdf->SetFont('simhei','',10);
//     for ($i = 0; $i <= 10; $i++) {
// 		$pdf->Cell(10 ,6,$i,1,0);
// 		$pdf->Cell(80 ,6,'HP Laptop',1,0);
// 		$pdf->Cell(23 ,6,'1',1,0,'R');
// 		$pdf->Cell(30 ,6,'15000.00',1,0,'R');
// 		$pdf->Cell(20 ,6,'100.00',1,0,'R');
// 		$pdf->Cell(25 ,6,'15100.00',1,1,'R');
// 	}


// $pdf->Cell(118 ,6,'',0,0);
// $pdf->Cell(25 ,6,'Subtotal',0,0);
// $pdf->Cell(45 ,6,'151000.00',1,1,'R');


$pdf->Output();//直接输出，即在浏览器显示
//$pdf->Output('example.pdf','F');//保存为example.pdf文件

?>
