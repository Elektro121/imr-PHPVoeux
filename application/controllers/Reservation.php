<?php
/**
 * Created by PhpStorm.
 * User: Viince
 * Date: 12/06/2015
 * Time: 11:33
 */

class Reservation extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        global $data;
        $this->load->model("m_user");
        $this->load->helper("url");
        $this->load->library('session');
        $data['user'] = $this->session->user;
        if (empty($data['user'])) {
            redirect("/Login", 'refresh');
        }
        $data['admin'] = $this->m_user->is_admin($data['user']);
    }

    public function index() {
        global $data;
        $data['title'] = "Acceuil";
        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->load->view("menu_left", $data);
        $this->load->view('reservation', $data);
        $this->load->view("footer", $data);
    }
}