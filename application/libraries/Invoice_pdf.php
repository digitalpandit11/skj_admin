<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/tcpdf/tcpdf.php"; 
class Invoice_pdf extends TCPDF { 
    public function __construct() { 
        parent::__construct(); 
    } 

    /*public function Footer() 
    {
    	$this->SetY(-40);
    	$this->SetFont('helvetica', '' , 10);

        $html = '<br><br><br><b style="font-size: 8.5px;">Address: Paras Industrial Estate, Phase III, B-12, lst Floor, T-Block, MIDC,Bhosari, Pune-411026. Phone: 020-27110184</b>'; 

        $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R');
	}*/

    public function Footer() {
        $this->SetY(-20);
        $this->SetFont('helvetica', '' , 10);
    } 
}

?>

