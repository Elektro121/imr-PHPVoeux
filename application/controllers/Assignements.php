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
        $this->load->helper("form");
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

    public function Desinscrire($module, $type) {
        global $data;
        $module = urldecode($module);
        $type = urldecode($type);

        if ($this->m_contenu->verif_enseignant($module, $type, $data['user'])) {
            $this->m_contenu->unsuscribe($module, $type);
            $data['resultat'] = "Vous avez bien été désinscrit au cours " . $type . " du module " . $module . ".";
        } else {
            if ($data['admin'] == TRUE) {
                $this->m_contenu->unsuscribe($module, $type);
                $data['resultat'] = "Vous avez bien désinscrit l'enseignant du cours " . $type . " du module " . $module . ".";
            } else {
                $data['error'] = "Vous n'avez pas les droits nécessaires pour cette action";
            }
        }

        $data['title'] = "Désinscription à un module";
        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->load->view("menu_left", $data);
        $this->load->view('resultat_action', $data);
        $this->load->view("footer", $data);
    }

    public function Inscrire($module, $type, $enseignant = NULL) {
        global $data;
        $module = urldecode($module);
        $type = urldecode($type);

        if ($enseignant === NULL) {
            $this->m_contenu->suscribe($module, $type, $data['user']);
            $data['resultat'] = "Vous avez bien été inscrit au cours " . $type . " du module " . $module . ".";
        } else {
            if ($data['admin'] == TRUE) {
                $this->m_contenu->suscribe($module, $type, $enseignant);
                $data['resultat'] = "Vous avez bien inscrit " . $enseignant . " au cours " . $type . " du module " . $module . ".";
            } else {
                $data['error'] = "Vous n'avez pas les droits nécessaires pour cette action";
            }
        }

        $data['title'] = "Inscription à un module";
        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->load->view("menu_left", $data);
        $this->load->view('resultat_action', $data);
        $this->load->view("footer", $data);
    }

    public function Admin() {
        global $data;
        if($data['admin']) {
            $data['title'] = "Mes heures";
            $data['contenu'] = $this->m_contenu->get_all();
            $data['users'] = $this->m_user->get_usernames();
            $this->load->view("header", $data);
            $this->load->view("head", $data);
            $this->load->view("menu_left", $data);
            $this->load->view('assignements_admin', $data);
            $this->load->view("footer", $data);
        } else {
            redirect('Dashboard', 'refresh');
        }
    }
}