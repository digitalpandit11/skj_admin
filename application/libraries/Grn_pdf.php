<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/tcpdf/tcpdf.php"; 
class grn_pdf extends TCPDF { 
    public function __construct() { 
        parent::__construct(); 
    } 

      //Page header
     

    public function Footer() {
    	$this->SetY(-75);
    	$this->SetFont('helvetica', '' , 10);

    $html = '<br><br><br><table style="width:100%; border-collapse: collapse;
  border: 1px solid black;">
            <tbody>
              <tr style="line-height: 20px;">
                   <td width="25%" style="font-size: 7px; border-bottom: 1px solid black; border-right: solid 1px #000000; 
  border-left: solid 1px #000000; text-align: center;"><b><br><br><br><br><br><br>Store Incharge</b></td>

                   <td width="25%" style="font-size: 7px; border-bottom: 1px solid black; border-right: solid 1px #000000; 
  border-left: solid 1px #000000; text-align: center;"><b><br><br><br><br><br><br>Passed By</b></td>

                  <td width="25%" style="font-size: 7px; border-bottom: 1px solid black; border-right: solid 1px #000000; 
  border-left: solid 1px #000000; text-align: center;"><b><br><br><br><br><br><br>Approved By</b></td>

  <td width="25%" style="font-size: 7px; border-bottom: 1px solid black; border-right: solid 1px #000000; 
  border-left: solid 1px #000000; text-align: center;"><b><br><br><br><br><br><br>Accepted By</b></td>





              </tr></tbody>
      </table>
                                  '; 
 

    $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R');

	}
}
?>