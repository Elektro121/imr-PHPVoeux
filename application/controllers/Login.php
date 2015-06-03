<?php
/**
 * Created by PhpStorm.
 * Date: 03/06/2015
 * Time: 17:31
 */

class Login extends CI_Controller {

    public function index()
    {
        $this->load->helper("url");
        $this->load->view("login");
    }
}