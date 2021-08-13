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
	$pdf_object->addProdcutHeader();
	$outbound = $_GET['id'];

	include '../../../database.php';
	$conn = OpenCon();

	$sql = "SELECT sale_id FROM `outbound_items_list` where outbound_id=$outbound";
	$result = $conn->query($sql);
  $i = 1;
  $totalquantity = 0;
  $totalamount= 0;
  while($row = $result->fetch_assoc()) {
    $sql2 = "SELECT product_id, quantity FROM `sale_items_list` where sale_id='". $row['sale_id'] ."'";
    $result2 = $conn->query($sql2);
  	while($row2 = $result2->fetch_assoc()) {
  		$sql3 = "SELECT name, volume, p2 FROM `wine_list` where product_id='". $row2['product_id'] ."'";
  		$result3 = $conn->query($sql3);
  		while($row3 = $result3->fetch_assoc()) {
  			$p = (int) $row3["p2"];
  			$q = (int) $row2["quantity"];
  			$a = $p * $q;
  			$pdf_object->addProdcutInfo($i, $row3["name"], $row3["volume"], $row3["p2"], $row2["quantity"], $a);
  			$i++;
  			$totalquantity += $q;
  			$totalamount += $a;
  		}
  	}
  }
	$pdf_object->addProdcutTotal($totalquantity, $totalamount);
	$pdf_object->addAccountInfo();

	$pdf_object->Output();
?>
