<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        $this->load->view('login.php');

    }

    public function isLogin(){
        if(!empty($this->session->userdata('userID')))
            echo json_encode(array('code'=>"0000",'data'=>$this->session->userdata('username')));
        else
            echo json_encode(array('code'=>"0003",'msg'=>'未登录'));
    }

    public function signIn(){
        $post = $this->input->post();
        $query = $this->db->where('phone',$post['username'])->get('user');
        if($query->num_rows() > 0)
            if(md5($query->row()->password) == $post['password']){
                $this->session->set_userdata('userID' , $query->row()->id);
                $this->session->set_userdata('username' , $post['username']);
                echo json_encode(array('code'=>"0000",'msg'=>'success'));
            }else
                echo json_encode(array('code'=>"0001",'msg'=>'密码错误！'));
        else
            echo json_encode(array('code'=>"0002",'msg'=>'用户名不存在！'));
    }

    public function signUp(){
        $this->session->sess_destroy();
    }

}