<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** access library REST_Controller, remember is library is a REST Server resource*/
require APPPATH . 'libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Api extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'use');        
    }

    public function index_get()
    {
        $id = $this->input->get('id');

        if(!empty($id)) {

            $data = $this->use->get_by_id($id)->result();

            if($data) {
                $res['error'] = false;
                $res['message'] = 'success get data by id';
                $res['data'] = $data;    
                
            }else {
                $res['error'] = true;
                $res['message'] = 'failed get data';
            }

        }else {

            $data = $this->use->get_all()->result();

            if($data) {
                $res['error'] = false;
                $res['message'] = 'success get all data';
                $res['data'] = $data;

            } else {
                $res['error'] = true;
                $res['message'] = 'failed get data';
            }

        }
        $this->response($res, 200);        
    }

    public function index_post()
    {
        $id = $this->input->post('id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $user = $this->input->post('user');
        $password = $this->input->post('password');
        $email = $this->input->post('email');

        $data = array(
            'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user' => $user,
            'password' => $password,
            'email' => $email
        );

        $insert = $this->use->save($data);

        if($insert) {
            $res['error'] = false;
            $res['message'] = 'insert success';
            $res['data'] = $data;
        } else {
            $res['error'] = true;
            $res['message'] = 'insert failed';
            $res['data'] = null;
        }

        $this->response($res, 200);        
    }

    public function index_put()
    {
        $id = $this->input->get('id');

        $first_name = $this->put('first_name');
        $last_name = $this->put('last_name');
        $user = $this->put('user');
        $password = $this->put('password');
        $email = $this->put('email');

        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user' => $user,
            'password' => $password,
            'email' => $email
        );

        if(!empty($id)) {
           $update = $this->use->edit($id, $data);

           if($update) {
                $res['error'] = false;
                $res['message'] = 'update success';
                $res['data'] = $data;
           } else {
                $res['error'] = true;
                $res['message'] = 'update failed';
                $res['data'] = null;
           }
        } else {
            $res['error'] = true;
            $res['message'] = 'update failed';
            $res['data'] = null;
        }

        $this->response($res, 200);        
    }

    public function index_delete()
    {
        $id = $this->input->get('id');

        if(!empty($id)) {

            $delete = $this->use->delete($id);

            if($delete) {
                $res['error'] = false;
                $res['message'] = 'delete success';
                
           } else {
                $res['error'] = true;
                $res['message'] = 'delete failed';
                
           }
        } else {
            $res['error'] = true;
            $res['message'] = 'delete failed';
        }

        $this->response($res, 200);        
    }
}