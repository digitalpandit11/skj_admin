<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Product_master_model extends CI_Model{

    public function save_product_master_model($data)
    {
        $result = $this->db->insert('product_master',$data);

        return $result;
    }

    public function get_product_details()
    {
        date_default_timezone_set("Asia/Calcutta");
        $product_year = date('Y');

        $this->db->select('product_master.*');
        $this->db->from('product_master');
        // $where = '(product_master.user_id = "'.$user_id.'")';
        //$this->db->where($where);
        $this->db->order_by('product_master.entity_id', 'DESC');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }

    public function get_id_wise_product_master($entity_id)
    {
        $this->db->select('*');
        $this->db->from('product_master');
        $where = '(product_master.entity_id = "'.$entity_id.'" )';
        $this->db->where($where);
        $query = $this->db->get();
        $query_result = $query->row_array();

        return $query_result;
    }

    public function update_product_master_model($data)
    {
        $this->db->where('entity_id', $data['entity_id']);
        $result = $this->db->update('product_master', $data);
        return $result;
    }

    public function delete_product_master($entity_id)
    {
        $this->db->where('entity_id', $entity_id);
        $data = $this->db->delete('product_master');

        return $data;
    }  
}
?>