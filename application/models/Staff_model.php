<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model {

    public function getDataStaff($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_staff')->result_array();
        }else {
            return $this->db->get_where('tbl_staff', ['id'=>$id])->result_array();
        }
    }
    public function deleteStaff($id)
    {
        $this->db->delete('tbl_staff', ['id' =>$id]);
        return $this->db->affected_rows();
    }
    public function createStaff($data)
    {
        $this->db->insert('tbl_staff', $data);
        return $this->db->affected_rows();
    }
    public function updateStaff($data, $id)
    {
        $this->db->update('tbl_staff', $data,['id'=>$id]);
        return $this->db->affected_rows();
    }

}

/* End of file S.php */
