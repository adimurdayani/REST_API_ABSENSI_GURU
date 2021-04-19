<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getdataUser($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_user')->result_array();
        }else {
            return $this->db->get_where('tbl_user', ['id' => $id])->result_array();
        }
    }

    public function deletedataUser($id)
    {
        $this->db->delete('tbl_user', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createdataUser($data)
    {
        $this->db->insert('tbl_user', $data);
        return $this->db->affected_rows();
    }
    public function updatedataUser($data,$id)
    {
        $this->db->update('tbl_user', $data, ['id' => $id]); 
        return $this->db->affected_rows();
    }

}

/* End of file User_model.php */