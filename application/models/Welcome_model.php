<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Welcome_model extends CI_Model{ 
    function __construct() { 
        // Set table name 
    } 

    public function validate($user_name,$encrypted_password)
    {
        
        $this->db->where('user_name',$user_name);
        $this->db->where('password',$encrypted_password);
        $query = $this->db->get('user_login');

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return true;
        }else
        {
            return false;
        }
    }

    public function validate_new($user_name,$encrypted_password)
    {
        
        $this->db->where('user_name',$user_name);
        $this->db->where('password',$encrypted_password);
        $query = $this->db->get('employee_master');

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return true;
        }else
        {
            return false;
        }
    }

    public function get_crop_attachment()
    {
        $this->db->select('croping_images_master.*');
        $this->db->from('croping_images_master');
        $this->db->order_by('croping_images_master.entity_id', 'DESC');
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;  
    }
}
?>