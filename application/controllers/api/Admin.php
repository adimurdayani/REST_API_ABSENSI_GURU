<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';

    class Admin extends REST_Controller {

    function __construct() {
    parent::__construct();
    $this->load->model('admin_model');
    

    }

    public function index_get(){
        $id = $this->get('id');
        if ($id === null) {
            $admin = $this->admin_model->getdataAdmin();
        }else {
            $admin = $this->admin_model->getdataAdmin($id);
        }

        if ($admin) {
            $this->response([
                'kode' => 1,
                'status' => true,
                'pesan' => 'sukses',
                'data' => $admin
            ], REST_Controller::HTTP_OK);
        }else{
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
                'pesan' => 'id tidak di temukan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else {
            if ($this->admin_model->deletedataAdmin($id) > 0) {
                $this->response([
                    'kode' => 1,
                    'status' => true,
                    'id'    => $id,
                    'pesan' => 'terhaspus'
                ], REST_Controller::HTTP_OK);
            }else {
                $this->response([
                    'kode' => 0,
                    'status' => false,
                    'pesan' => 'id salah'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function index_post()
    {
        $data = [
            'nama_admin'   => $this->post('nama_admin'),
            'username_admin'   => $this->post('username_admin'),
            'pass_admin'   => $this->post('pass_admin'),
            'email_admin'   => $this->post('email_admin'),
            'alamat_admin'   => $this->post('alamat_admin'),
            'telepon_admin'   => $this->post('telepon_admin'),
            'kelamin_admin'   => $this->post('kelamin_admin')
        ];
        if ($this->admin_model->createdataAdmin($data) > 0) {
            $this->response([
                'kode'=> 1,
                'status'    => true,
                'pesan'     => 'sukses',
                'data'      => $data
            ], REST_Controller::HTTP_CREATED);
        }else {
            $this->response([
                'kode'  => 0,
                'status'  => true,
                'pesan'  => 'gagal',
            ]);
        }
    }
    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama_admin'   => $this->put('nama_admin'),
            'username_admin'   => $this->put('username_admin'),
            'pass_admin'   => $this->put('pass_admin'),
            'email_admin'   => $this->put('email_admin'),
            'alamat_admin'   => $this->put('alamat_admin'),
            'telepon_admin'   => $this->put('telepon_admin'),
            'kelamin_admin'   => $this->put('kelamin_admin')
        ];
        if ($this->admin_model->updatedataAdmin($data, $id) > 0) {
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
/** End of file Admin.php **/