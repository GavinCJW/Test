<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {

    public function index()
    {
        $this->load->view('home.php');
    }
}

?>