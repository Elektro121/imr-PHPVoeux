<?php
/**
 * Created by PhpStorm.
 * Date: 03/06/2015
 * Time: 17:31
 */

/**
 * Class m_user
 * @property m_user $m_user Optional
 */
class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("m_user");
    }

    public function index()
    {
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->library('session');
        $this->load->library("form_validation");

        $data['title'] = "Se connecter";
        $data['user'] = $this->session->user;
        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->form_validation->set_rules('user', 'Nom d\'utilisateur', 'required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("login");
        }
        else {
            if($this->m_user->check_password($this->input->post("user"),$this->input->post("password")) == TRUE) {
                $this->session->set_userdata("user", $this->input->post("user"));
                $data['user'] = $this->input->post("user");
                $this->load->view("login", $data);
            } else {
                $data['login_error'] = "Oh ! Il existe une erreur dans la combinaison Utilisateur / Mot de passe, veuillez réessayer.";
                $this->load->view("login", $data);
            }
        }
    }
    public function Disconnect()
    {
        $this->load->helper("url");
        $this->load->library('session');
        $this->session->sess_destroy();
        $this->index();
    }
}