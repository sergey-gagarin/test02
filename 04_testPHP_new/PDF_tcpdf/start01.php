<?php
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2010-08-08
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @copyright 2004-2009 Nicola Asuni - Tecnick.com S.r.l (www.tecnick.com) Via Della Pace, 11 - 09044 - Quartucciu (CA) - ITALY - www.tecnick.com - info@tecnick.com
 * @link http://tcpdf.org
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 * @since 2008-03-04
 */

require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'logo_example.jpg';
		$image_file = "images/pointing.jpg";
		//$image_file = "images/city.png";
//		public function Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', 
//$resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false) {
// in mm !
		$this->Image($image_file, 10, 10, 20, 20, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, '<< TCPDF Example START !!!!! >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(PDF_MARGIN_LEFT, 37, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
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

// set some text to print
$txt = <<<EOD
TCPDF Example 003

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

// ---------------------------------------------------------



// set font
$pdf->SetFont('helvetica', 'B', 20);

$pdf->Write(0, 'Example of HTML Justification', '', 0, 'L', true, 0, false, false, 0);

// create some HTML content
$html = '<span style="text-align:justify;">a <u>abc</u> abcdefghijkl abcdef abcdefg 
<b>abcdefghi</b> a abc abcd 
<img src="tcpdf/images/logo_example.png" border="0" height="41" width="41" />
 <img src="tcpdf/images/tiger.ai" alt="test alt attribute" width="100" height="100" border="0" /> 
 abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg
  <b>abcdefghi</b> a <u>abc</u> abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg 
  <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> 
  a abc abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg abcdefghi a abc abcd 
  <a href="http://tcpdf.org">abcdef abcdefg</a> start a abc before
   <span style="background-color:yellow">yellow color</span> after 
   a abc abcd abcdef abcdefg abcdefghi a abc abcd end abcdefg abcdefghi a abc abcd 
   abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef 
abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a
 abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi
 <br />abcd abcdef abcdefg abcdefghi<br />abcd abcde abcdef</span>';

// set core font
$pdf->SetFont('helvetica', '', 10);


// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);

$pdf->Ln();

// set UTF-8 Unicode font
$pdf->SetFont('dejavusans', '', 10);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);


// create some HTML content
$html2 = '<span style="text-align:justify;">a <u>abc</u> abcdefghijkl abcdef abcdefg 
<b>abcdefghi</b> a  alt="test alt attribute" width="100" height="100" border="0" /> 
 abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg
  <b>abcdefghi</b> a <u>abc</u> abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg 
  <b>abcdefghi</b> a abc abcd abcdef abcdefg > start a abc before
   <span style="background-color:yellow">yellow color</span> after 
   a abc abcd abcdef abcdefg abcdefghi a abc abcd end abcdefg abcdefghi a abc abcd 
   abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef 
abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a
 abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi
 <br />abcd abcdef abcdefg abcdefghi<br />abcd abcde abcdef</span>';

//====FROM EXAMPLE 48 =========================================================

 // Table with rowspans and THEAD
$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2">
<thead>
 <tr style="background-color:#FFFF00;color:#0000FF;">
  <td width="30" align="center"><b>Header A</b></td>
  <td width="140" align="center"><b>Column 1</b></td>
  <td width="140" align="center"><b>Column 2</b></td>
  <td width="80" align="center"> <b>Column 3</b></td>
  <td width="80" align="center"><b>Column 4</b></td>
  <td width="45" align="center"><b>Column 5</b></td>
 </tr>
 <tr style="background-color:#FF0000;color:#FFFF00;">
  <td width="30" align="center"><b>Header B</b></td>
  <td width="140" align="center"><b>B col 1</b></td>
  <td width="140" align="center"><b>B col 2</b></td>
  <td width="80" align="center"> <b>col 3</b></td>
  <td width="80" align="center"><b>col 4</b></td>
  <td width="45" align="center"><b>col 5</b></td>
 </tr>
</thead>
 <tr>
  <td width="30" align="center">1.</td>
  <td width="140" rowspan="6">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center" rowspan="3">2.</td>
  <td width="140" rowspan="3">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80" rowspan="2" >RRRRRR<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">3.</td>
  <td width="140">XXXX1<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">4.</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
</table>
EOD;

// writing the table - the heder will be on the next page by default 

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->writeHTML($html2, true, false, false, false, '');




// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="3" align="center">NON-BREAKING TABLE</th>
 </tr>
 <tr>
  <td>1-1</td>
  <td>1-2</td>
  <td>1-3</td>
 </tr>
 <tr>
  <td>2-1</td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
 <tr>
  <td>3-1
  
  $html2
  
  
  </td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" align="center">
 <tr nobr="true">
  <th colspan="3">NON-BREAKING ROWS</th>
 </tr>
 <tr nobr="true">
  <td>ROW 1<br />COLUMN 1</td>
  <td>ROW 1<br />COLUMN 2</td>
  <td>ROW 1<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>ROW 2<br />COLUMN 1</td>
  <td>ROW 2<br />COLUMN 2</td>
  <td>ROW 2<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>ROW 3<br />COLUMN 1</td>
  <td>ROW 3<br />COLUMN 2</td>
  <td>ROW 3<br />COLUMN 3
  
  $html2
  
  </td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------














//===========================================================================



// reset pointer to the last page
$pdf->lastPage();




//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
