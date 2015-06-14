<?php
/**
 * Created by PhpStorm.
 * Date: 12/06/2015
 * Time: 09:03
 */

class Assignements extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        global $data;
        $this->load->model("m_user");
        $this->load->model("m_contenu");
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
        $data['title'] = "Mes heures";
        $data['contenu'] = $this->m_contenu->get_user($data['user']);
        $data['heuresaplacer'] = $this->m_contenu->resteAPlacer($data['user']);
        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->load->view("menu_left", $data);
        $this->load->view('assignements_my', $data);
        $this->load->view("footer", $data);
    }

    public function Inscription() {
        global $data;
        $data['title'] = "Inscription à un module";
        $data['contenu'] = $this->m_contenu->get_all_unsuscribed($data['user']);
        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->load->view("menu_left", $data);
        $this->load->view('assignements_inscription', $data);
        $this->load->view("footer", $data);
    }
}