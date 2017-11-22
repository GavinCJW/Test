<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index(){
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        $redis->set("name","cjw");
        echo $redis->get("name");
    }

}