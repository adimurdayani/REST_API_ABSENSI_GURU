<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('guru_model');
    
  }
  

  public function index()
  {
    $data = [
      'judul' => 'Tabel Guru',
      'data_guru' => $this->db->get('tbl_guru')->result_array()
    ];
    $this->load->view('data_tabel', $data, FALSE);
    
    
  }

}

/* End of file Tabel.php */