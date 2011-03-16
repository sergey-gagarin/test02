<?php

require_once('../pdf/config/lang/eng.php');
require_once('../pdf/tcpdf.php');

// Extend the TCPDF class example 003
// config/tcpdf_config.php - look for var DEFINE  

class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'logo_example.jpg';
		$image_file = "pp_logo_stacked.png";
		//$this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 11);
		// Title
	//	$this->Cell(0, 15, 'Header of startPDF.php', 0, false, 'C', 0, '', 0, false, 'M', 'M');
//    @param 4 = border

	
//	   @param 6 =     
//		* L or empty string: left align (default value)
//      * C: center
//      * R: right align
//      * J: justify 

		//@param 12(last) = valign of the text
//    * T : top
//    * C : center
//    * B : bottom

		$this->Cell(70, 10, 'New +2  Header of startPDF.php', 'LTRB', false, 'C', 0, '', 0, false, 'M', 'T');
		$this->Cell(100, 10, 'More info', 'LTRB', false, 'R', 0, '', 0, false, 'M', 'T');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number T - top border
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'C', 0, '', 0, false, 'T', 'M');
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Pyramid');
$pdf->SetTitle('Pyramid startPDF');
$pdf->SetSubject('Pyramid');
$pdf->SetKeywords('Pyramid');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

	$color = array(
			array(255,51,0), // red
			array(255,255,51),// yellow
			array(0,0,204),  // blue
			array(0,204,0) // green
		);

// some data for PieChar
$data = array("tables"=>"250","computers"=>"500","vehicles"=>"1500","more"=>"300");

	drawPieChart($data, $color, 25);
/**
 * @param $data, $color as arrays
 * @param $r - radius of the chart
 * **/
function drawPieChart($data=null , $color=null, $r=25){
	global $pdf;	
	
     if(is_array($data) && is_array($color)){
		
		$sum = array_sum($data);      
		$area = M_PI*(pow($r,2));
		$bit = $area/$sum;       	// a bit of sector area (for given $r) for 1 value unit			
		
		$s_degree = 0;             // for the first segment start with degree = 0
		
		$x = $pdf->getX(); $y= $pdf->getY(); // current position
		$pdf->setXY($x, $y+10); 			 // top offset for legend
		$xc = $x+4*$r; 						 // left offset for the center
		$yc = y+2*$r;  						 // top offset for the center
		


		next($color);
		
		foreach($data as $dk=>$dval){
			
			$seg_a =  $dval*$bit; 				// segment area for value = $dval          
			$degree = (2*$seg_a*180)/($area);   // end-degree of the segment (if start with 0)

			$cc = current($color);
			$pdf->SetFillColor($cc[0],$cc[1],$cc[2]);
			//$pdf->setFillColorArray($cc);	
			// position of this chart is independent of cursor position 		
			$pdf->PieSector($xc, $yc, $r, $s_degree, $s_degree+$degree, 'FD', false, 0);
			
			$s_degree+=$degree;  // rotate starting degree for the next segment
			
			if(next($color)===false) {
				reset($color);
			}else{next($color);}
		
		// true to get on the next line after printing			
			$pdf->Cell(7, 7, "      ".$dk."=".$dval, 'LTRB', 1, 'L', true, '', 0, false, 'M', 'T');
					
	} // end foreach
	
 	$pdf->Ln(30);
 	reset($color);
	} // end if array $data
} // end drawPie



##########################################################
## 														##
##		FORM from Ex. 014								##
##														##
##########################################################

//////////////////////////////////////////////////////////
/*
It is possible to create text fields, combo boxes, check boxes and buttons.
Fields are created at the current position and are given a name.
This name allows to manipulate them via JavaScript in order to perform some validation for instance.
*/

// set default form properties
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));

$pdf->SetFont('helvetica', 'BI', 18);
$pdf->Cell(0, 5, 'Example of Form', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('helvetica', '', 12);

// First name
$pdf->Cell(35, 5, 'First name:');
$pdf->TextField('firstname', 50, 5);
$pdf->Ln(6);

// Last name
$pdf->Cell(35, 5, 'Last name:');
$pdf->TextField('lastname', 50, 5);
$pdf->Ln(6);

// Gender
$pdf->Cell(35, 5, 'Gender:');
//$pdf->ComboBox('gender', 10, 5, array('', 'M', 'F'));
$pdf->ComboBox('gender', 30, 5, array(array('', '-'), array('M', 'Male'), array('F', 'Female')));
$pdf->Ln(6);

// Drink
$pdf->Cell(35, 5, 'Drink:');
$pdf->RadioButton('drink', 5, array(), array(), 'Water');
$pdf->Cell(35, 5, 'Water');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('drink', 5, array(), array(), 'Beer', true);
$pdf->Cell(35, 5, 'Beer');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('drink', 5, array(), array(), 'Wine');
$pdf->Cell(35, 5, 'Wine');
$pdf->Ln(10);

// Listbox
$pdf->Cell(35, 5, 'List:');
$pdf->ListBox('listbox', 60, 15, array('', 'item1', 'item2', 'item3', 'item4', 'item5', 'item6', 'item7'), array('multipleSelection'=>'true'));
$pdf->Ln(20);

// Adress
$pdf->Cell(35, 5, 'Address:');
$pdf->TextField('address', 60, 18, array('multiline'=>true));
$pdf->Ln(19);

// E-mail
$pdf->Cell(35, 5, 'E-mail:');
$pdf->TextField('email', 50, 5);
$pdf->Ln(6);

// Newsletter
$pdf->Cell(35, 5, 'Newsletter:');
$pdf->CheckBox('newsletter', 5, true, array(), array(), 'OK');
$pdf->Ln(10);

// Date of the day
$pdf->Cell(35, 5, 'Date:');
$pdf->TextField('date', 30, 5, array(), array('v'=>date('Y-m-d'), 'dv'=>date('Y-m-d')));
$pdf->Ln(10);

$pdf->SetX(50);

// Button to validate and print
$pdf->Button('print', 30, 10, 'Print', 'Print()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Reset Button
$pdf->Button('reset', 30, 10, 'Reset', array('S'=>'ResetForm'), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Submit Button
$pdf->Button('submit', 30, 10, 'Submit', array('S'=>'SubmitForm', 'F'=>'results.php', 'Flags'=>array('ExportFormat')), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

$pdf->Ln(20);
// Form validation functions
$js = <<<EOD
function CheckField(name,message) {
	var f = getField(name);
	if(f.value == '') {
	    app.alert(message);
	    f.setFocus();
	    return false;
	}
	return true;
}
function Print() {
	if(!CheckField('firstname','First name is mandatory')) {return;}
	if(!CheckField('lastname','Last name is mandatory')) {return;}
	if(!CheckField('gender','Gender is mandatory')) {return;}
	if(!CheckField('address','Address is mandatory')) {return;}
	print();
}
EOD;

// Add Javascript code
//$pdf->IncludeJS($js);

//////////////////////////////////////////////////////////









// set some text to print
$txt = <<<EOD
Quisque neque sem, venenatis eget gravida nec, mollis nec ante. Curabitur mauris enim, condimentum ut rhoncus vulputate, porta et orci. Duis ut lorem justo! Curabitur nec nunc ligula, eu porta libero. Nulla facilisi. Ut luctus, tellus eget facilisis volutpat, enim lectus facilisis libero, vel ullamcorper elit tortor vel velit. Donec hendrerit elementum mauris, vitae bibendum lectus tempus ut. Nam quam tortor, tincidunt iaculis dapibus viverra, fermentum vitae elit! Proin quis laoreet nibh. In sed nisl risus. Nam vehicula dapibus arcu in dapibus. Nullam interdum pellentesque lacinia. Aliquam accumsan est a ante blandit pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla faucibus felis sapien, nec rutrum risus. Phasellus porttitor sapien a dolor porta eu rhoncus mi convallis. Mauris in libero non justo hendrerit semper! Proin a lectus lectus.

Integer sollicitudin ultricies sapien eget tempor? Nunc dolor velit, rutrum ac tincidunt eu, feugiat nec arcu. Aliquam vel eros vel odio cursus consectetur. Ut vitae orci vel turpis condimentum accumsan. Praesent et arcu sit amet neque aliquet dictum in ac tellus? Donec vestibulum tellus vitae mauris pretium faucibus. Nunc tincidunt viverra turpis, non iaculis libero luctus ac. Etiam arcu tellus, elementum a cursus nec, ullamcorper eget nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut sit amet justo at lectus egestas varius ac vel orci. Mauris viverra molestie tempus. Ut et ligula dolor. Suspendisse ultricies ultrices ante quis pellentesque. Morbi laoreet scelerisque nisi, porttitor tempor erat aliquam pharetra. In sit amet mi magna, sit amet commodo urna. Pellentesque adipiscing justo eget justo aliquet eget pulvinar tortor semper? Donec sed ante arcu. Praesent ac euismod libero.

Etiam non enim nec dui lobortis blandit nec eget lacus. Suspendisse ac cursus nisi. Morbi tincidunt, felis ut vehicula interdum, purus neque eleifend risus, sit amet tristique ligula ante ac turpis! Vivamus massa est, malesuada eget laoreet eu, blandit blandit felis. Cras et libero ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam fermentum, elit vel pellentesque hendrerit, nisi arcu suscipit mi, vel porta quam enim in risus. Donec eleifend ornare est eu luctus. Donec tincidunt felis quis lacus porttitor at lobortis est accumsan? Nullam a velit quis justo varius condimentum.
EOD;

// print a block of text using Write()
$pdf->Write($h=0, $txt, $link='', $fill=0, $align='J', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$txt2 = <<<TTT
Etiam non enim nec dui lobortis blandit nec eget lacus. Suspendisse ac cursus nisi. Morbi tincidunt, felis ut vehicula interdum, purus neque eleifend risus, sit amet tristique ligula ante ac turpis! Vivamus massa est, malesuada eget laoreet eu, blandit blandit felis. Cras et libero ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam fermentum, elit vel pellentesque hendrerit, nisi arcu suscipit mi, vel porta quam enim in risus. Donec eleifend ornare est eu luctus. Donec tincidunt felis quis lacus porttitor at lobortis est accumsan? Nullam a velit quis justo varius condimentum.
TTT;
$pdf->Write($h=0, $txt, $link='', $fill=0, $align='J', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
// ---------------------------------------------------------
 


//$pdf->writeHTML($tbl, true, false, false, false, '');

$xc = 105;
$yc = 200;
$r = 50;

$pdf->SetFillColor(0, 0, 255);
//PieSector($xc-center, $yc-center, $r, 20-start angle(in degrees), 120-end angle(in degrees),
//             'FD'-style - in  getPathPaintOperator() FD for Fill and then stroke the path, using the nonzero winding number rule to determine the region to fill.
//              false-clockwise(if true), 0 - origing of angles(0-normal), 2-?? no need);
$pdf->PieSector($xc, $yc, $r, 20, 120, 'FD', false, 0);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 120, 250, 'FD', false, 0, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, 250, 20, 'FD', false, 0, 2);

// write labels
$pdf->SetTextColor(255,255,255);
//Text(x,y,"txt")
$pdf->Text(105, 165, 'BLUE');
$pdf->Text(60, 195, 'GREEN');
$pdf->Text(120, 215, 'RED');

$pdf->SetTextColor(0,0,0);  
$pdf->Ln(10);$pdf->Ln(10);
$pdf->writeHTML("Some more explanation", true, false, false, false, '');



//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
