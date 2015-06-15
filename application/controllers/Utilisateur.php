<?php
/**
 * Created by PhpStorm.
 * Date: 15/06/2015
 * Time: 15:28
 */

class Utilisateur extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        global $data;
        $this->load->model("m_user");
        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->library('session');
        $this->load->library("form_validation");
        $data['user'] = $this->session->user;
        if (empty($data['user'])) {
            redirect("/Login", 'refresh');
        }
        $data['admin'] = $this->m_user->is_admin($data['user']);
    }

    public function Admin() {
        global $data;
        if($data['admin']) {
            $data['contenu'] = $this->m_user->get_all();
            $data['title'] = "Administration des utilisateurs";
            $this->load->view("header", $data);
            $this->load->view("head", $data);
            $this->load->view("menu_left", $data);
            $this->load->view('utilisateurs_admin', $data);
            $this->load->view("footer", $data);
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function Creation() {
        global $data;
        if($data['admin']) {
            $data['title'] = "Création d'un utilisateur";

            $this->form_validation->set_rules('login', 'Nom d\'utilisateur', 'required');
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
                $this->m_user->add(
                    $this->input->post('login'),
                    $this->input->post('pwd'),
                    $this->input->post('nom'),
                    $this->input->post('prenom'),
                    $this->input->post('statutaire'),
                    $this->input->post('choixtype'),
                    $actif,
                    $admin
                );
                $data['resultat'] = "L'utilisateur ".$this->input->get('login')."à bien été ajouté dans la base de données.";
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

    public function Modification($user) {
        global $data;
        if($data['admin']) {
            $data['title'] = "Modification d'un utilisateur";

            $this->form_validation->set_rules('login', 'Nom d\'utilisateur', 'required');
            $this->form_validation->set_rules('nom', 'Nom de Famille', 'required');
            $this->form_validation->set_rules('prenom', 'Prénom', 'required');
            $this->form_validation->set_rules('statutaire', 'Heures statutaires', 'required');
            $this->form_validation->set_rules('choixtype', 'Choix du Type', 'required');

            if ($this->form_validation->run() == FALSE) {

            } else {
                $actif = ($this->input->post('actif') === "1") ? 1 : 0;
                $admin = ($this->input->post('administrateur') === "1") ? 1 : 0;
                $this->m_user->modify(
                    $this->input->post('login'),
                    $this->input->post('nom'),
                    $this->input->post('prenom'),
                    $this->input->post('statutaire'),
                    $this->input->post('choixtype'),
                    $actif,
                    $admin
                );
                $data['resultat'] = "L'utilisateur ".$this->input->get('login')."à bien été modifié dans la base de données.";
            }
            $data['modify'] = $this->m_user->get_details($user);
            $this->load->view("header", $data);
            $this->load->view("head", $data);
            $this->load->view("menu_left", $data);
            $this->load->view('resultat_action', $data);
            $this->load->view('utilisateur_modification', $data);
            $this->load->view("footer", $data);
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function Supprimer($user) {
        global $data;
        if($data['admin']) {
            if($this->m_user->exists($user)) {
                //Ajouter des trucs là quand même
                $this->m_user->clean($user);
                $this->m_user->del($user);
                $data["resultat"] = "L'utilisateur ".$user." à bien été supprimé.";
            } else {
                $data["error"] = "L'utilisateur n'existe pas.";
            }

            $data['title'] = "Suppression d'un utilisateur";
            $this->load->view("header", $data);
            $this->load->view("head", $data);
            $this->load->view("menu_left", $data);
            $this->load->view('resultat_action', $data);
            $this->load->view("footer", $data);
        } else {
            redirect('Dashboard', 'refresh');
        }
    }
}