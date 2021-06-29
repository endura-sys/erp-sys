<?php

	require('../php-html-to-pdf/php-html-to-pdf.php');
	define('FPDF_FONTPATH','../tfpdf/font/');


	$pdf_object = new HTMLtoPDF([
		'Author'=>'HoldOffHunger',
		'Title'=>'Privacy Policy',
	]);

	$pdf_object->WriteHTML([
		'html'=>'',
		//'html'=>'<h1> 日本人!</h1><p>こんにちは!</p>',
		'language'=>'ja',
	]);


	$pdf_object->addCompanyName("Hanabi International Limited");
	$pdf_object->addAdress("FLAT 05 9/F YUEN FAT INDUSTRIAL BUILDING 25 WANG CHIU ROAD KOWLOON BAY");
	$pdf_object->addCompanyInfo("Customer Service Hotline - What's App : (852) 6514 4411", "internationalhanabi@gmail.com");

  //$pdf_object->AddFont('AppliMincho','','AppliMincho.php');
	//$pdf_object->SetFont('AppliMincho','',16.5);
	$pdf_object->Cell(0,20,"INVOICE",0,0,'C');
	$pdf_object->Ln();//换行

	$pdf_object->addCustomerInfo("酒蛙Sakewa Eugene", "酒蛙Sakewa Eugene", "酒蛙Sakewa Eugene", "email@gmail.com", "1305室 香港觀塘巧明街106號冠力工業大廈", "JP123456", "2021-6-21");
	$pdf_object->addProdcutInfo();
	$pdf_object->addAccountInfo();

	/*
	include '../../../database.php';
	$conn = OpenCon();


	$sql = "SELECT `order no.` FROM `outbound schedule`";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {

		$pdf_object->Cell(0,20,$row["order no."],0,0,'');
		$pdf_object->Ln();
	}
	*/

	$pdf_object->Output();



/*

		Others...

			Chinese Example
			--------------------------------------

	require('../php-html-to-pdf/php-html-to-pdf.php');

	$pdf_object = new HTMLtoPDF([
		'Author'=>'HoldOffHunger',
		'Title'=>'Privacy Policy',
	]);

	$pdf_object->WriteHTML([
		'html'=>'<h1>I can say hello in 汉语!</h2><p>你好!</p>',
		'language'=>'zh',
	]);

	$pdf_object->Output();

			English Example
			--------------------------------------

	require('../php-html-to-pdf/php-html-to-pdf.php');

	$pdf_object = new HTMLtoPDF([
		'Author'=>'HoldOffHunger',
		'Title'=>'Privacy Policy',
	]);

	$pdf_object->WriteHTML([
		'html'=>'<h1>I can say hello in English!</h2><p>Hello!</p>',
		'language'=>'en',
	]);

	$pdf_object->Output();
*/
?>
