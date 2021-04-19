<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class Staff extends REST_Controller {

function __construct() {
    parent::__construct();
$this->load->model('staff_model');
    

    }

    public function index_get(){
        $id = $this->get('id');

        if ($id === null) {
            $staff=$this->staff_model->getDataStaff();
        }else {
            $staff = $this->staff_model->getDataStaff($id);
        }

        if ($staff) {
            $this->response([
                'kode'=>1,
                'status'=>true,
                'pesan' =>'data berhasil tampil',
                'data'=>$staff
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'kode'=>0,
                'status'=>false,
                'pesan'=>"id tidak ditemukan"
            ],REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            
            $this->response([
                'pesan' => 'id salah'
            ],REST_Controller::HTTP_BAD_REQUEST);

        }else {

            if ($this->staff_model->deleteStaff($id) > 0) {
                $this->response([
                    'pesan' => 'terhapus',
                    'id' => $id
                ],REST_Controller::HTTP_OK);

            }else {

                $this->response([
                    'pesan' => 'id tidak di temukan'
                ],REST_Controller::HTTP_NOT_FOUND);

            }
        }
    }
    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'telepon' => $this->post('telepon'),
            'kelamin' => $this->post('kelamin')
        ];

        if ($this->staff_model->createStaff($data) > 0) {
            $this->response([
                'kode'=>1,
                'status'=>true,
                'pesan'=>'sukses',
                'data'=> $data
            ], REST_Controller::HTTP_CREATED);
        }else {
            $this->response([
                'kode'=>0,
                'status'=>false,
                'pesan'=>'data staff gagal di tambahkan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'telepon' => $this->put('telepon'),
            'kelamin' => $this->put('kelamin')
        ];

        if ($this->staff_model->updateStaff($data,$id) > 0) {
            $this->response([
                'kode'=>1,
                'status'=>true,
                'pesan' => 'sukses'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'kode'=>0,
                'status'=>false,
                'pesan' => 'data gagal di update'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
/** End of file Controllername.php **/