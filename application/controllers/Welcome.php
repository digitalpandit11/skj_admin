<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

    class Welcome extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->model('welcome_model');
            $this->load->library('upload');
        }

        public function index()
        {
            $this->load->view('vw_login');
        }

        public function process()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_name','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run())
            {
                $user_name = $this->input->post('user_name');
                $password = $this->input->post('password');
                $encrypted_password = sha1($password);

                if($this->welcome_model->validate($user_name,$encrypted_password))
                {
                    date_default_timezone_set("Asia/Calcutta");
                    $todays_date = date('Y-m-d');

                    $this->db->select('*');
                    $this->db->from('user_login');
                    $where = '(user_name = "'.$user_name.'" AND password = "'.$encrypted_password.'")';
                    $this->db->where($where);
                    $user_master = $this->db->get();
                    $row = $user_master->row();
                    $session_owner = 1;

                    // $role_id = $row->role_id;

                    if(!empty($row))
                    {
                        $session_data = array('user_name' => $user_name ,'user_id' => $row->entity_id,
                            'full_name' => $row->full_name , 'company_name' => $row->company_name , 'gst_status' => $row->gst_applicable, 'session_owner' => $session_owner);
                        $this->session->set_userdata($session_data);
                        redirect(base_url().'edit_product_master/1');
                    }else{
                        $this->session->set_flashdata('error','Invalid Username And Password');
                        redirect(base_url().'welcome');
                    }
                }
                
                else{
                    $this->session->set_flashdata('error','Invalid Username And Password');
                    redirect(base_url().'welcome');
                }
            }else{
                $this->session->set_flashdata('error','Enter Username And Password');
                redirect(base_url().'welcome');
            }      
        }

        public function dashboard()
        {
            if($this->session->userdata('user_name') != '')  
            {  
                $this->load->view('welcome_message');
            }  
            else{  
                redirect(base_url().'welcome');
            }
        }

        public function login()  
        {  
            $this->load->view('welcome_message');
        }

        public function logout()
        {
            $this->session->unset_userdata('username');
            $this->session->sess_destroy();
            redirect('welcome');
        }

        public function crop_drawing_page()
        {
            $data['cropping_data'] = $this->welcome_model->get_crop_attachment();

            $this->load->view('crop_drawing_page',$data);
        }

        public function create_new_crop_image()
        {
            $this->load->view('crop_machine_page');
        }
    }
?>
