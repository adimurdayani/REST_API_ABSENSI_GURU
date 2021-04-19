<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');
require APPPATH . 'libraries/Format.php';

class Guru extends REST_Controller {

function __construct() {
parent::__construct();
    
$this->load->model('guru_model');
    

}

public function index_get(){

    $id = $this->get('id');

        if ($id === null) {
            # code...
            $guru = $this->guru_model->getDataGuru();
        }else {
            
            $guru = $this->guru_model->getDataGuru($id);
        }

        
        if ($guru) {
            $this->response([
                'kode' => 1,
                'status' => true,
                'data' => $guru
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'kode' => 0,
                'status' => false,
                'pesan' => 'ID tidak ditemukan!.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }
    public function index_post()
    {
        $data = [
            'nik' => $this->post('nik'),
            'nama' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'telepon' => $this->post('telepon'),
            'kelamin' => $this->post('kelamin'),
            'waktu' =>  $this->post('waktu'),
            'tanggal' =>  $this->post('tanggal'),
            'status' =>  $this->post('status')
        ];

        if ($this->guru_model->createDataguru($data) > 0) {
            $this->response([
                'kode' => 1,
                'status' => true,
                'pesan' => 'sukses',
                'data' => $data
            ], REST_Controller::HTTP_CREATED);
        }else {
            $this->response([
                'kode' => 0,
                'status' => false,
                'pesan' => 'gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'nik' => $this->put('nik'),
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'telepon' => $this->put('telepon'),
            'kelamin' => $this->put('kelamin'),
            'waktu' => $this->put('waktu'),
            'tanggal' => $this->put('tanggal'),
            'status' => $this->put('status')
        ];

        if ($this->guru_model->updatedataguru($data, $id) > 0) {
            $this->response([
                'kode' => 1,
                'status' => true,
                'pesan' => 'sukses',
                'data' => $data
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'kode' => 0,
                'status' => false,
                'pesan' => 'gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'kode' => 0,
                'status' => false,
                'pesan' => 'gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else {
            if ($this->guru_model->deleteDataguru($id) > 0) {
                $this->response([
                    'kode' => 1,
                    'status' => true,
                    'pesan' => 'sukses',
                    'id' => $id
                ], REST_Controller::HTTP_OK);
            }else {
                $this->response([
                    'kode' => 0,
                    'status' => false,
                    'pesan' => 'gagal'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    
}
/** End of file Controllername.php **/