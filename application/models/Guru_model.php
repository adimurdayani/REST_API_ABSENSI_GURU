<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

    public function getDataGuru($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            return $this->db->get('tbl_guru')->result_array();
        }else {
            # code...
            return $this->db->get_where('tbl_guru', ['id'=>$id])->result_array();
        }
        
    }

    public function createDataguru($data)
    {
        # code...
        $this->db->insert('tbl_guru', $data);
        return $this->db->affected_rows();
        
    }
    public function updatedataguru($data, $id)
    {
        $this->db->update('tbl_guru', $data, ['id'=> $id]);
        return $this->db->affected_rows();
    }
    public function deleteDataguru($id)
    {
        $this->db->delete('tbl_guru', ['id'=> $id]);
        return $this->db->affected_rows();
    }

}

/* End of file Guru_model.php */