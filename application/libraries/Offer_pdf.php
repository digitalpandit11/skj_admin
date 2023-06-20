<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/tcpdf/tcpdf.php"; 
class Offer_pdf extends TCPDF { 
    public function __construct() { 
        parent::__construct();

       // $this->load->library('session');
    } 

    //Page header
    /*public function Header() 
    {
        $image_file = K_PATH_IMAGES.'sai-control-system-logo.jpg';
        $this->Image($image_file);
        // Set font
        $this->SetFont('helvetica', 'B', 17);
        // Title
        $html = '<h3 style="text-indent:5em; margin-top: 50px;"></h3>
                 ';

        $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        $this->SetFont('helvetica', '' , 8);
        // Title
        $html = '<p style="text-indent:35em;"><b></b><br><br><br><br><br><br>
            <hr style="width: 100%;height: 1.5px;"></p>
                 ';
        $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    }*/

    /*public function Footer() {

        $this->SetY(-40);
        $this->SetFont('helvetica', '' , 10);  
 
 $html = '<br><br><br><br><br><br><b style="font-size: 8.5px;">Address:  $html = '<br><br><br><br><br><br><b style="font-size: 8.5px;">Address: Paras Industrial Estate, Phase III, B-12, lst Floor, T-Block, MIDC,Bhosari, Pune-411026. Phone: 020-27110184</b>';  
    $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    $this->SetY(-10);
        $this->SetFont('helvetica', '' , 10);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R');


    }*/

    public function Footer() 
    { 



        $this->SetY(-20);
        $this->SetFont('helvetica', '' , 8);
        /*$this->Cell(0, 10, $_SESSION['customer_bill_to_address'] . ' Page'.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R');*/
        $this->Cell(0, 10,' Page'.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R');
        

    } 


   

}

?>

