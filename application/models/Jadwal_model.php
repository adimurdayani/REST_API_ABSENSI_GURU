<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

    public function getData($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_jadwal')->result_array();
        }else {
            return $this->db->get('tbl_jadwal', $id)->result_array();
        }
    }

    public function createdatajadwal($data)
    {
        $this->db->insert('tbl_jadwal', $data);
        return $this->db->affected_rows();
    }
    public function updatedatajadwal($data, $id)
    {
        $this->db->update('tbl_jadwal', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function deletedatajadwal($id)
    {
        $this->db->delete('tbl_jadwal', ['id'=> $id]);
        return $this->db->affected_rows();
    }

}

/* End of file Jadwal_model.php */