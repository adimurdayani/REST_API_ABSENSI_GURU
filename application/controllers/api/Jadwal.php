<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

    require(APPPATH . 'libraries/REST_Controller.php');
    require APPPATH . 'libraries/Format.php';

    class Jadwal extends REST_Controller {

function __construct() {
    parent::__construct();
    $this->load->model('jadwal_model');
    

    }

    public function index_get(){

        $id = $this->get('id');

        if ($id === null) {
            $jadwal = $this->jadwal_model->getData();
        }else {
            $jadwal = $this->jadwal_model->getData($id);
        }

        if($jadwal) {
            $this->response([
                'kode' => 1,
                'status' => true,
                'pesan' => 'sukses',
                'data'  =>  $jadwal
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'kode' => 0,
                'status' => false,
                'pesan' => 'gagal'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_post()
    {
        $data = [
            'tanggal'   => $this->post('tanggal'),
            'waktu'   => $this->post('waktu'),
            'nik'   => $this->post('nik'),
            'nama'   => $this->post('nama'),
            'kelamin'   => $this->post('kelamin'),
            'telepon'   => $this->post('telepon')
        ];

        if ($this->jadwal_model->createdatajadwal($data) > 0) {
            $this->response([
                'kode' => 1,
                'status' => true,
                'pesan' => 'sukses'
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
            'tanggal' => $this->put('tanggal'),
            'waktu' => $this->put('waktu'),
            'nik' => $this->put('nik'),
            'nama' => $this->put('nama'),
            'kelamin' => $this->put('kelamin'),
            'telepon' => $this->put('telepon')
        ];

        if ($this->jadwal_model->updatedatajadwal($data, $id) > 0) {
            $this->response([
                'kode' => 1,
                'status' => true,
                'pesan' => 'sukses'
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
                'pesan' => 'id tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }else {
            if ($this->jadwal_model->deletedatajadwal($id) > 0) {
                $this->response([
                    'kode' => 1,
                    'status' => true,
                    'pesan' => 'sukses'
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