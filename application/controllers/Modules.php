<?php
/**
 * Created by PhpStorm.
 * User: Viince
 * Date: 17/06/2015
 * Time: 17:30
 */

class Modules extends CI_Controller
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

    public function Index()
    {
        global $data;
        $data['title'] = "Administration des modules";
        $data['contenu'] = $this->m_module->get_module();
        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->load->view("menu_left", $data);
        $this->load->view('view_moduladmin', $data);
        $this->load->view("footer", $data);
    }

    public function Creation() {
        global $data;
        if($data['admin']) {
            $data['title'] = "Création d'un module";

            $this->form_validation->set_rules('pwd', 'Mot de passe', 'required');
            $this->form_validation->set_rules('pwdconfirm', 'Confirmation du mot de passe', 'required|matches[pwd]');
            $this->form_validation->set_rules('nom', 'Nom de Famille', 'required');
            $this->form_validation->set_rules('prenom', 'Prénom', 'required');
            $this->form_validation->set_rules('statutaire', 'Heures statutaires', 'required');
            $this->form_validation->set_rules('choixtype', 'Choix du Type', 'required');

            if ($this->form_validation->run() == FALSE) {

            } else {
                $actif = ($this->input->post('actif') === "1") ? 1 : 0;
                $admin = ($this->input->post('administrateur') === "1") ? 1 : 0;
                $login = $this->m_user->gen_login(
                    $this->input->post('nom'),
                    $this->input->post('prenom')
                );
                $this->m_user->add(
                    $login,
                    $this->input->post('pwd'),
                    $this->input->post('nom'),
                    $this->input->post('prenom'),
                    $this->input->post('statutaire'),
                    $this->input->post('choixtype'),
                    $actif,
                    $admin
                );
                $data['resultat'] = "L'utilisateur ".$login." à bien été ajouté dans la base de données.";
                $data['retour'] = "/Utilisateur/Admin";
            }
            $this->load->view("header", $data);
            $this->load->view("head", $data);
            $this->load->view("menu_left", $data);
            $this->load->view('resultat_action', $data);
            $this->load->view('utilisateur_form', $data);
            $this->load->view("footer", $data);
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

}