<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function getdataAdmin($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_admin')->result_array();
        }else {
            return $this->db->get_where('tbl_admin', ['id' => $id])->result_array();
        }
    }
    public function deletedataAdmin($id)
    {
        $this->db->delete('tbl_admin', ['id'=>$id]);
        return $this->db->affected_rows();
    }
    public function createdataAdmin($data)
    {
        $this->db->insert('tbl_admin', $data);
        return $this->db->affected_rows();
    }
    public function updatedataAdmin($data, $id){
        $this->db->update('tbl_admin', $data, ['id'=>$id]);
        return $this->db->affected_rows();
    }

}

/* End of file Admin_model.php */