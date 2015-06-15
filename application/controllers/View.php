<?php
/**
 * Created by PhpStorm.
 * Date: 12/06/2015
 * Time: 08:49
 */

class View extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        global $data;
        $this->load->model("m_user");
        $this->load->model("m_contenu");
        $this->load->model("m_module");
        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->library('session');
        $data['user'] = $this->session->user;
        if (empty($data['user'])) {
            redirect("/Login", 'refresh');
        }
        $data['admin'] = $this->m_user->is_admin($data['user']);
    }

    public function Heure_module()
    {
        global $data;
        $data['title'] = "Heures par module";
        $data['contenu'] = $this->m_module->get_module();
        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->load->view("menu_left", $data);
        $this->load->view('view_module', $data);
        $this->load->view("footer", $data);
    }

}