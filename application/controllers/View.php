<?php
/**
 * Created by PhpStorm.
 * Date: 12/06/2015
 * Time: 08:49
 */

class View extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_user");
        $this->load->helper("url");
        $this->load->library('session');
        $user = $this->session->user;
        if (empty($user)) {
            redirect("/Login", 'refresh');
        }
    }

    public function index() {
        echo "Mais lol";
    }

    public function MyHours() {
        echo "Mes Heures";
    }

}