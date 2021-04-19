<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

    class User extends REST_Controller {

function __construct() {
  parent::__construct();
  $this->load->model('user_model');

}

    public function index_get(){

        $id = $this->get('id');

        if ($id === null) {
            $user= $this->user_model->getdataUser();
        }else {
            $user = $this->user_model->getdataUser($id);
        }

        if ($user) {
            $this->response([
                'kode' => 1,
                'status' =>true,
                'pesan' => 'Sukses',
                'data'=>$user
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'kode' => 0,
                'status' =>false,
                'pesan' => 'Gagal',
                'data'=>$user
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }
    public function index_delete()
    {
        $id = $this->delete('id');
        
        if ($id === null) {
            $this->response([
                'kode'=> 0,
                'status'=> false,
                'pesan'=> 'id tidak di temukan',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else {
            if ($this->user_model->deletedataUser($id) > 0) {
                $this->response([
                    'kode' => 1,
                    'status' => true,
                    'id'    => $id,
                    'pesan' => 'sukses'
                ], REST_Controller::HTTP_OK);
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
            'nik'   => $this->post('nik'),
            'nama'   => $this->post('nama'),
            'email'   => $this->post('email'),
            'pass'   => $this->post('pass'),
            'telepon'   => $this->post('telepon'),
            'alamat'   => $this->post('alamat'),
            'jabatan'   => $this->post('jabatan'),
            'kelamin'   => $this->post('kelamin')
        ];
        if ($this->user_model->createdataUser($data) > 0) {
            $this->response([
                'kode'  => 1,
                'status'  => true,
                'pesan'  => 'sukses',
                'data'  => $data
            ], REST_Controller::HTTP_CREATED);
        }else {
            $this->response([
                'kode'  => 0,
                'status'  => false,
                'pesan'  => 'gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nik'   => $this->put('nik'),
            'nama'   => $this->put('nama'),
            'email'   => $this->put('email'),
            'pass'   => $this->put('pass'),
            'telepon'   => $this->put('telepon'),
            'alamat'   => $this->put('alamat'),
            'jabatan'   => $this->put('jabatan'),
            'kelamin'   => $this->put('kelamin')
        ];
        if ($this->user_model->updatedataUser($data, $id) > 0) {
            $this->response([
                'kode'  => 1,
                'status'  => true,
                'pesan'  => 'sukses',
                'data'  => $data
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'kode'  => 0,
                'status'  => false,
                'pesan'  => 'gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
/** End of file Controllername.php **/