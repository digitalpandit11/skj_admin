<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();

class Product_master extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('product_master_model');
        $this->load->library('session');
    }

	public function index()
	{
        $user_id = $_SESSION['user_id'];
        $data['product_master'] = $this->product_master_model->get_product_details();
		$this->load->view('master/product_master/vw_product_master_index',$data);
	}

    public function create()
    {
        $user_id = $_SESSION['user_id'];
        
        $this->load->view('master/product_master/vw_product_master_create');
    }

    public function save_product_master()
    {

        $user_id = $_SESSION['user_id'];
        $date = $this->input->post('date');
        $gold_18_c_price = $this->input->post('gold_18_c_price');
        $gold_22_c_price = $this->input->post('gold_22_c_price');
        $gold_24_c_price = $this->input->post('gold_24_c_price');
        $silver_ornaments = $this->input->post('silver_ornaments');
        
        $data = array('user_id' => $user_id , 'gold_18_c_price' => $gold_18_c_price , 'gold_22_c_price' => $gold_22_c_price, 'gold_24_c_price' => $gold_24_c_price, 'silver_ornaments' => $silver_ornaments, 'date' => $date);

        $result = $this->product_master_model->save_product_master_model($data);
        redirect('vw_erp_product_master');
    }

    public function edit_product_master()
    {
        $entity_id = $this->uri->segment(2);

        $this->db->select('*');
        $this->db->from('product_master');
        $where = '(product_master.entity_id = "'.$entity_id.'")';
        $this->db->where($where);
        $query = $this->db->get();
        $query_result = $query->row_array();

        $user_id = $query_result['user_id'];
        $session_user_id = $_SESSION['user_id'];

        if($user_id == $session_user_id)
        {
            $data['entity_id'] = $entity_id;
            $this->load->view('master/product_master/vw_product_master_edit',$data);
        }else{
            $data = site_url('dashboard');
            header("location:$data");
        }
    }

    public function get_product_master_data()
    {
        $entity_id = $this->input->post('entity_id',TRUE);
        $data = $this->product_master_model->get_id_wise_product_master($entity_id);
        echo json_encode([$data]);
    }


    public function update_product_master()
    {
        $entity_id = $this->input->post('entity_id');
        $date = $this->input->post('date');
        $gold_18_c_price = $this->input->post('gold_18_c_price');
        $gold_22_c_price = $this->input->post('gold_22_c_price');
        $gold_24_c_price = $this->input->post('gold_24_c_price');
        $silver_ornaments = $this->input->post('silver_ornaments');
            

        $data = array('entity_id'=> $entity_id , 'gold_18_c_price' => $gold_18_c_price , 'gold_22_c_price' => $gold_22_c_price, 'gold_24_c_price' => $gold_24_c_price, 'silver_ornaments' => $silver_ornaments, 'date' => $date);

        $result = $this->product_master_model->update_product_master_model($data);
        redirect('edit_product_master/1');
    }

    public function delete_product_master()
    {
        $entity_id = $this->uri->segment(2);
        $data = $this->product_master_model->delete_product_master($entity_id);
        redirect('vw_erp_product_master');
    }

    
}
?>