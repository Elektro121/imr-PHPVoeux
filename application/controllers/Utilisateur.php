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
                $data['retour'] = "/Utilisateur/Admin";
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
                $this->m_user->clean($user);
                $this->m_user->del($user);
                $data["resultat"] = "L'utilisateur ".$user." à bien été supprimé.";
                $data['retour'] = "/Utilisateur/Admin";
            } else {
                $data["error"] = "L'utilisateur n'existe pas.";
                $data['retour'] = "/Utilisateur/Admin";
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

    public function ChangerMotDePasse() {
        global $data;
        $data['title'] = "Modification du mot de passe";
        $this->form_validation->set_rules('pwd', 'Mot de passe', 'required');
        $this->form_validation->set_rules('pwdconfirm', 'Confirmation du mot de passe', 'required|matches[pwd]');

        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->load->view("menu_left", $data);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("resultat_action", $data);
            $this->load->view("utilisateur_mdp", $data);
        } else {
            $this->m_user->change_password(
                $this->session->user,
                $this->input->post("pwd"));
            $data["resultat"] = "Votre mot de passe à bien été changé !";
            $data["retour"] = "Dashboard";
            $this->load->view("resultat_action", $data);
        }
        $this->load->view("footer", $data);
    }

    public function ResetMotDePasse($user) {
        global $data;
        $data['title'] = "Remise à zéro du mot de passe";
        if($data['admin']) {
            $this -> m_user -> change_password($user,"servicesENSSAT");
            $data['resultat']="Le mot de passe à bien été remis à zéro. Utilisez le mot de passe \"servicesENSSAT\" pour vous connecter au compte de".$user.".";
            $data['retour']="Utilisateur/Admin";
        } else {
            redirect('Dashboard', 'refresh');
        }
    }
}