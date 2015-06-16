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
        $this->load->helper("url");
        $this->load->library('session');
        $data['user'] = $this->session->user;
        if (empty($data['user'])) {
            redirect("/Login", 'refresh');
        }
        $data['admin'] = $this->m_user->is_admin($data['user']);
    }

    public function Admin()
    {
        global $data;
        if ($data['admin']) {
            $this->load->view("header", $data);
            $this->load->view("head", $data);
            $this->load->view("menu_left", $data);
            $this->load->view('resultat_action', $data);
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
                $data['result'] = "La décharge de " . $user . " à été supprimé.";
            } else {
                $data['error'] = "L'utilisateur n'existe pas."
            }
            $this->Admin();
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function Modifier($user, $decharge)
    {
        global $data;
        if ($data['admin']) {
            if ($this->m_user->exists($user)) {
                $this->m_decharge->modify($user);
                $data['result'] = "La décharge de " . $user . " à été supprimé.";
            } else {
                $data['error'] = "L'utilisateur n'existe pas.";
            }
            $this->Admin();
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function Creer($user, $decharge)
    {
        global $data;
        if ($data['admin']) {

            $this->Admin();
        } else {
            redirect('Dashboard', 'refresh');
        }

    }
}