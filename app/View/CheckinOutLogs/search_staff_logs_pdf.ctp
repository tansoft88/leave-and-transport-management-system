<?php
App::import('Vendor','tcpdf/tcpdf');
$tcpdf = new TCPDF('L');
$textfont = 'helvetica';
 
$tcpdf->SetAuthor("Taurai Tanaka Mutero");
$tcpdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
 
$tcpdf->setPrintHeader(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$tcpdf->setPrintFooter(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont,'',10);

// set image scale factor
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
$tcpdf->AddPage();
$date=date('d/m/Y h:i:s A');

// set background image
//$img_file = APP . 'webroot/img/uz_emhare_watermark.jpg';
//$tcpdf->Image($img_file, 100, 110, '70', '70', '', '', '', false, 300, '', false, false, 0);

// create some HTML content
$htmlcontent ="<h2><u>UNIVERSITY OF ZIMBABWE</u></h2>
<p><u>TIME MANAGEMENT SYSTEM $date_from TO $date_to</u>
<p>EMPLOYEE  $username
<p>===========================================================================================================

</p>";

$htmlcontent .= "<table width=\"100%\" border=\"0\" align= \"center\">	
			<tr>
				<th align=\"center\" size=\"5\">Entry Point</th>
				<th align=\"center\" size=\"300\">Date In</th>
				<th align=\"center\" size=\"140\">Time In</th>
				<th align=\"center\" size=\"140\">Date Out</th>
				<th align=\"center\" size=\"140\">Time Out</th>
			</tr>";
	
		$numb = 0;
		 for($i = 0; $i<sizeof($data); $i++){ 
		 $blank = "";
		 $htmlcontent .= "<tr><td align=\"center\" size=\"5\">".($data[$i]['entryName'])."</td><td align=\"center\" size=\"140\">".($data[$i]['date_in'])."</td><td align=\"center\" size=\"140\">".($data[$i]['time_in'])."</td>
		 <td align=\"center\" size=\"140\">".($data[$i]['date_out'])."</td><td align=\"center\" size=\"140\">".($data[$i]['time_out'])."</td></tr>";
			
				
		 } 
		
		
		$htmlcontent .= "</table>";
		
			
		
	
// output the HTML content
$tcpdf->writeHTML($htmlcontent, true, 0);
$tcpdf->Output($username.$date_from.'.pdf', 'D');
?>


