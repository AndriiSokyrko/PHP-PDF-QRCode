<?php
	/*
	  An Example PDF Report Using FPDF
	  by Matt Doyle

	  From "Create Nice-Looking PDFs with PHP and FPDF"
	  http://www.elated.com/articles/create-nice-looking-pdfs-php-fpdf/
	*/
	require_once( "fpdf/fpdf.php" );
// Начало конфигурации
//Transform to CMYK
$red = 255 * ( 1 - 0 /100 ) * ( 1 - 0 /100 );
$green = 255 * ( 1 - 100/ 100 ) * ( 1 - 0/ 100 );
$blue = 255 * ( 1 - 90 /100 ) * ( 1 - 0/ 100 );
//end transform

	$textColour                      = array( $red, $green, $blue );
	$headerColour                    = array( 100, 100, 100 );
	$tableHeaderTopTextColour        = array( 255, 255, 255 );
	$tableHeaderTopFillColour        = array( 125, 152, 179 );
	$tableHeaderTopProductTextColour = array( 0, 0, 0 );
	$tableHeaderTopProductFillColour = array( 143, 173, 204 );
	$tableHeaderLeftFillColour       = array( 184, 207, 229 );
	$tableHeaderLeftTextColour       = array( 99, 42, 57 );
	$tableBorderColour               = array( 50, 50, 50 );
	$tableRowFillColour              = array( 213, 170, 170 );
	$reportName                      = "2018 Widget Sales Report";
//	$reportNameYPos                  = 160;
	$reportNameYPos                  = 60;
	$logoFile                        = "widget-company-logo.png";
//	$logoXPos                        = 50;
	$logoXPos                        = 5;
//	$logoYPos                        = 108;
	$logoYPos                        = 10;
//	$logoWidth                       = 110;
	$logoWidth                       = 90;
	$columnLabels                    = array( "Q1", "Q2", "Q3", "Q4" );
	$rowLabels                       = array( "SupaWidget", "WonderWidget", "MegaWidget", "HyperWidget" );
	$chartXPos                       = 25;
	$chartYPos                       = 80;
	$chartWidth                      = 60;
	$chartHeight                     = 80;
	$chartXLabel                     = "Product";
	$chartYLabel                     = "2009 Sales";
	$chartYStep                      = 20000;
	$chartColours = array(
		array( 255, 100, 100 ),
		array( 100, 255, 100 ),
		array( 100, 100, 255 ),
		array( 255, 255, 100 ),
	);
	$data = array(
		array( 9940, 10100, 9490, 11730 ),
		array( 19310, 21140, 20560, 22590 ),
		array( 25110, 26260, 25210, 28370 ),
		array( 27650, 24550, 30040, 31980 ),
	);

// Конец конфигурации
	/**
	 * Создаем титульную страницу
	 **/
	$pdf = new FPDF( 'P', 'mm', array(100, 100) );
	$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
	$pdf->AddPage();
// Логотип
	$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );
	// Название отчета
	$pdf->SetFont( 'Arial', 'B', 16 );
	$pdf->Ln( $reportNameYPos - 10);
	$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );
	$pdf->ln();
// QRCode
	$pdf->AddPage();
	$pdf->Cell( 46, 12, " " . 'QR Code' , 0, 0, 'C', $fill );
	$imagedata= "img/qrcode.png";
	$pdf->Image( $imagedata, $logoXPos, $logoYPos+10, $logoWidth, auto );
	$pdf->ln();
/**
  * Создаем колонтитул, заголовок и вводный текст
**/
$pdf->AddPage();
$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->SetFont( 'Arial', '', 17 );
$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'Arial', '', 14 );
$pdf->Write( 19, "2018 Was A Good Year" );
$pdf->Ln();
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, "Despite the economic downturn, WidgetCo had a strong year. Sales of the HyperWidget in particular exceeded expectations. The fourth quarter was generally the best performing; this was most likely due to our increased ad spend in Q3." );
$pdf->Ln();
$pdf->Write( 6, "2019 is expected to see increased sales growth as we expand into other countries." );
/**
  * Создаем таблицу
**/
	$pdf->AddPage();
	$pdf->Write( 19, "The table sales" );
$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
$pdf->Ln( 15 );

// Создаем строку заголовков
$pdf->SetFont( 'Arial', 'B', 10 );

// Ячейка "PRODUCT"
$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );
$pdf->Cell( 30, 12, " PRODUCT", 1, 0, 'L', true );

// Остальные ячейки заголовков
$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

for ( $i=0; $i<count($columnLabels); $i++ ) {
  $pdf->Cell( 14, 12, $columnLabels[$i], 1, 0, 'C', true );
}

$pdf->Ln( 12 );

// Создаем строки с данными

$fill = false;
$row = 0;

foreach ( $data as $dataRow ) {

  // Create the left header cell
  $pdf->SetFont( 'Arial', 'B', 10 );
  $pdf->SetTextColor( $tableHeaderLeftTextColour[0], $tableHeaderLeftTextColour[1], $tableHeaderLeftTextColour[2] );
  $pdf->SetFillColor( $tableHeaderLeftFillColour[0], $tableHeaderLeftFillColour[1], $tableHeaderLeftFillColour[2] );
  $pdf->Cell( 30, 8, " " . $rowLabels[$row], 1, 0, 'L', $fill );

  // Create the data cells
  $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
  $pdf->SetFillColor( $tableRowFillColour[0], $tableRowFillColour[1], $tableRowFillColour[2] );
  $pdf->SetFont( 'Arial', '', 10 );

  for ( $i=0; $i<count($columnLabels); $i++ ) {
    $pdf->Cell( 14, 8, ( '$' . number_format( $dataRow[$i] ) ), 1, 0, 'C', $fill );
  }

  $row++;
  $fill = !$fill;
  $pdf->Ln();
}


/***
  * Создаем график
***/
$pdf->AddPage();
	$pdf->SetAutoPageBreak(false);
	$pdf->SetAutoPageBreak(true,0);
	/***
	 * Создаем график
	 ***/

// Вычисляем масштаб по оси X
	$xScale = count($rowLabels) / ( $chartWidth - 40 );

// Вычисляем масштаб по оси Y

	$maxTotal = 0;

	foreach ( $data as $dataRow ) {
		$totalSales = 0;
		foreach ( $dataRow as $dataCell ) $totalSales += $dataCell;
		$maxTotal = ( $totalSales > $maxTotal ) ? $totalSales : $maxTotal;
	}

	$yScale = $maxTotal / $chartHeight;

// Вычисляем ширину столбца
	$barWidth = ( 1 / $xScale ) / 1.5;

// Добавляем оси:

	$pdf->SetFont( 'Arial', '', 10 );

// Ось X
	$pdf->Line( $chartXPos , $chartYPos, $chartXPos + $chartWidth, $chartYPos );

	for ( $i=0; $i < count( $rowLabels ); $i++ ) {
//		$pdf->SetXY( $chartXPos + 10 +  $i / $xScale, $chartYPos );
		$pdf->SetXY( $chartXPos +10+ ($barWidth+ 10)*$i, $chartYPos );
		$pdf->Cell( $barWidth, 10, substr( $rowLabels[$i],0,3), 0, 0, 'C' );
	}

// Ось Y
	$pdf->Line( $chartXPos , $chartYPos, $chartXPos , $chartYPos - $chartHeight - 8 );

	for ( $i=0; $i <= $maxTotal; $i += $chartYStep ) {
		$pdf->SetXY( 0 , $chartYPos - 5 - $i / $yScale );
		$pdf->Cell( 20, 10, '$' . number_format( $i ), 0, 0, 'R' );
		$pdf->Line( $chartXPos , $chartYPos - $i / $yScale, $chartXPos -2, $chartYPos - $i / $yScale );
	}

// Добавляем метки осей
	$pdf->SetFont( 'Arial', 'B', 12 );
//	$pdf->SetXY( $chartWidth / 2 + 20, $chartYPos + 8 );


	$pdf->Cell( 30, 10, $chartXLabel, 0, 0, 'C' );
	$pdf->SetXY( $chartXPos + 7, $chartYPos - $chartHeight - 12 );
	$pdf->Cell( 20, 10, $chartYLabel, 0, 0, 'R' );

// Создаем столбцы графика
//	$xPos = $chartXPos + 40;
	$bar = 0;

	foreach ( $data as $dataRow ) {

		// Вычисляем суммарное значение для продукта
		$totalSales = 0;
		foreach ( $dataRow as $dataCell ) $totalSales += $dataCell;
//		$pdf->SetXY( $chartXPos +10+ ($barWidth+ 10)*$i, $chartYPos );
		// Выводим столбец
		$colourIndex = $bar % count( $chartColours );
		$pdf->SetFillColor( $chartColours[$colourIndex][0], $chartColours[$colourIndex][1], $chartColours[$colourIndex][2] );
//		$pdf->Rect( $xPos, $chartYPos - ( $totalSales / $yScale ), $barWidth, $totalSales / $yScale, 'DF' );
		$pdf->Rect( $chartXPos +10+ ($barWidth+ 10)*$bar, $chartYPos - ( $totalSales / $yScale ), $barWidth, $totalSales / $yScale, 'DF' );
//		$xPos += ( 1 / $xScale );
		$bar++;
	}

	/***
	 * Выводим PDF
	 ***/
//	ob_start();
	$pdf->Output(   "report.pdf", "I" );
//	ob_end_flush();
	session_destroy();
?>

