<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('login_model');
        $this->load->library('session');
    }

	public function sign_up_action()
	{
		$this->load->view('login/login_controller/vw_sign_up_page');
	}

    public function forgot_password_action()
    {
        $this->load->view('login/login_controller/vw_forgot_password_page');
    }

    public function save_sign_up()
    {
        $first_name = $this->input->post('first_name');
        $middle_name = $this->input->post('middle_name');
        $last_name = $this->input->post('last_name');
        $full_name = $first_name.' '.$middle_name.' '.$last_name;
        $email_id = $this->input->post('email_id');
        $contact_number = $this->input->post('contact_number');
        $company_name = $this->input->post('company_name');
        $password = $this->input->post('password');
        $gst_applicable = $this->input->post('gst_applicable');
        ///   Caesar cypher 
        $caesar_encrypt = str_rot13($password);
        $shapassword = sha1($password);
        $activation_status = 1;

        $this->db->select('user_id');
        $this->db->from('user_login');
        $this->db->order_by('entity_id', 'DESC');
        $this->db->limit(1);
        $user_login_data = $this->db->get();
        $user_login_result = $user_login_data->result_array();

        if(!empty($user_login_result))
        {
            $user_id_serial_no = $user_login_result[0]['user_id'];
            $user_login_seprate = explode('/', $user_id_serial_no);
            $user_login_doc_year = $user_login_seprate['1'];
        }

        $this->db->select('document_series_no');
        $this->db->from('documentseries_master');
        $this->db->where('entity_id = 1');
        $doc_record=$this->db->get();
        $results_doc_record = $doc_record->result_array();

        $doc_serial_no = $results_doc_record[0]['document_series_no'];
        $doc_data_seprate = explode('/', $doc_serial_no);
        $doc_year = $doc_data_seprate['1'];

        if(empty($user_login_result[0]['user_id']) || ($user_login_doc_year != $doc_year))
        {
            $first_no = '0001';
            $doc_no = $doc_serial_no.$first_no;
        }elseif(!empty($user_login_result) && ($user_login_doc_year == $doc_year))
        {
            $doc_type = $user_login_seprate['0'];
            $ex_no = $user_login_seprate['2'];
            $next_en = $ex_no + 1;
            $next_doc_no = str_pad($next_en, 4, "0", STR_PAD_LEFT);
            $doc_no = $doc_type.'/'.$user_login_doc_year.'/'.$next_doc_no;
        }

        $Current_year_for_document = date('Y');

        $Next_year_for_document = date('Y', strtotime('+365 days', strtotime($Current_year_for_document)));

        $Last_year_initials = substr($Next_year_for_document, -2);

        $Enquiry_document_initial = "EN".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';
        $Offer_document_initial = "OF".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';
        $Sales_Order_document_initial = "SO".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';
        $Employee_document_initial = "EM".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';
        $Invoice_document_initial = "IN".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';
        $Grn_document_initial = "GRN".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';
        $Dc_document_initial = "DC".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';
        $Bp_document_initial = "BP".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';
        $Pi_document_initial = "PI".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';
        $Entr_document_initial = "ENTR".'/'.$Current_year_for_document.'-'.$Last_year_initials.'/';

        date_default_timezone_set(  "Asia/Calcutta");
        $activation_start_date = date('Y-m-d');

        $activation_end_date = date('Y-m-d', strtotime('+60 days', strtotime($activation_start_date)));
        
        $data = array('first_name ' => $first_name , 'middle_name' => $middle_name , 'last_name' => $last_name , 'full_name' => $full_name , 'email_id' => $email_id , 'gst_applicable' => $gst_applicable , 'user_name' => $email_id , 'contact_number' => $contact_number , 'company_name' => $company_name , 'password' => $shapassword , 'caesar_cypher_password' => $caesar_encrypt , 'user_id' => $doc_no , 'activation_start_date' => $activation_start_date , 'activation_end_date' => $activation_end_date , 'activation_status' => $activation_status);
        $result = $this->login_model->save_sign_up_data($data,$Enquiry_document_initial,$Offer_document_initial,$Sales_Order_document_initial,$Employee_document_initial,$Invoice_document_initial,$Grn_document_initial,$Dc_document_initial,$Bp_document_initial,$Pi_document_initial,$Entr_document_initial);
        redirect('Welcome');
    }
}
?>