<?php
/**
 * Created by PhpStorm.
 * Date: 15/06/2015
 * Time: 23:40
 */

class Decharges extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        global $data;
        $this->load->model("m_user");
        $this->load->model("m_decharge");
        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->library('session');
        $this->load->library('form_validation');
        $data['user'] = $this->session->user;
        if (empty($data['user'])) {
            redirect("/Login", 'refresh');
        }
        $data['admin'] = $this->m_user->is_admin($data['user']);
    }

    public function index() {
        global $data;
        $data['title'] = "Modification de vos décharges";
        $this->form_validation->set_rules('decharge', 'Heures déchargés', 'required');

        $user = $this->session->user;

        if ($this->form_validation->run() == FALSE) {

        } else {
            $decharge = $this->input->post('decharge');
            if ($this->m_user->exists($user)) {
                $this->m_decharge->add($user, $decharge);
                $data['resultat'] = "Votre décharge à bien été prise en compte.";
                $data["retour"] = "Dashboard";
            } else {
                $data['error'] = "L'utilisateur n'existe pas, vous avez sûrement été supprimé de la base, dommage pour vous, humain.";
            }
        }

        $data['decharge'] = $this->m_decharge->get($user);

        $this->load->view("header", $data);
        $this->load->view("head", $data);
        $this->load->view("menu_left", $data);
        $this->load->view("resultat_action", $data);
        $this->load->view("decharge_user", $data);
        $this->load->view("footer", $data);
    }

    public function Admin()
    {
        global $data;
        if ($data['admin']) {
            $data['title']="Administration des décharges";
            $data['contenu']=$this->m_decharge->get_all();
            $this->load->view("header", $data);
            $this->load->view("head", $data);
            $this->load->view("menu_left", $data);
            $this->load->view('decharges_admin', $data);
            $this->load->view("footer", $data);
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function Supprimer($user)
    {
        global $data;
        if ($data['admin']) {
            if ($this->m_user->exists($user)) {
                $this->m_decharge->del($user);
                $data['resultat'] = "La décharge de " . $user . " à été supprimé.";
            } else {
                $data['error'] = "L'utilisateur n'existe pas.";
            }
            $this->Admin();
        } else {
            //Code autre chose pour qu'un utilisateur unique puisse supprimer sa décharge
            redirect('Dashboard', 'refresh');
        }
    }

    public function Modifier($user)
    {
        global $data;
        if ($data['admin']) {
            $data['modify'] = $user;

            $this->form_validation->set_rules('decharge', 'Heures déchargés', 'required');

            if($this->form_validation->run() == FALSE) {

            } else {
                $decharge = $this ->input->post('decharge');
                if ($this->m_user->exists($user)) {
                    $this->m_decharge->set($user,$decharge);
                    $data['resultat'] = "La décharge de " . $user . " à été modifié.";
                } else {
                    $data['error'] = "L'utilisateur n'existe pas.";
                }

            }
            $this->Admin();
        } else {
            //Code autre chose pour qu'un utilsiateur unique puisse modifier ses propres décharges.
            redirect('Dashboard', 'refresh');
        }
    }

    public function Creer()
    {
        global $data;
        if ($data['admin']) {

            $this->form_validation->set_rules('enseignant', 'Utilisateur', 'required');
            $this->form_validation->set_rules('decharge', 'Heures déchargés', 'required');

            if($this->form_validation->run() == FALSE) {

            } else {
                $user = $this ->input->post('enseignant');
                $decharge = $this ->input->post('decharge');
                if ($this->m_user->exists($user)) {
                    $this->m_decharge->add($user,$decharge);
                    $data['resultat'] = "La décharge de " . $user . " à été crée.";
                } else {
                    $data['error'] = "L'utilisateur n'existe pas.";
                }

            }
            $this->Admin();
        } else {
            redirect('Dashboard', 'refresh');
        }
    }
}