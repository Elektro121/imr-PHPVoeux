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
        $this->load->library('form_validation');
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

            $this->form_validation->set_rules('nbcours', 'Nombre de cours (invisible)', 'required');
            $this->form_validation->set_rules('identifiant', 'Identifiant Cours', 'required');
            $this->form_validation->set_rules('public', 'Publique', 'required');
            $this->form_validation->set_rules('semestre', 'Semestre', 'required');
            $this->form_validation->set_rules('libelle', 'Libellé', 'required');
            $nbcours = $this->input->post('nbcours');
            echo $nbcours;

            for($i = 0; $i < $nbcours ; $i++) {
                $this->form_validation->set_rules('partie['.$i.']', 'Partie '.$i, 'required');
                $this->form_validation->set_rules('type['.$i.']', 'Type '.$i, 'required');
                $this->form_validation->set_rules('hed['.$i.']', 'HED '.$i, 'required');
            }

            if($this->form_validation->run() == FALSE) {

            } else {
                if($nbcours != 0) {
                    if($this->m_module->exist($this->input->post('identifiant'))) {
                        $this->m_module->add(
                            $this->input->post('identifiant'),
                            $this->input->post('public'),
                            $this->input->post('semestre'),
                            $this->input->post('libelle')
                        );
                        for($i = 0; $i < $nbcours; $i++) {
                            if($this->m_contenu->exists(
                                $this->input->post('identifiant'),
                                $this->input->post('partie['.$i.']')
                            )){
                                $this->m_contenu->add(
                                    $this->input->post('identifiant'),
                                    $this->input->post('partie['.$i.']'),
                                    $this->input->post('type['.$i.']'),
                                    $this->input->post('hed['.$i.']')
                                );
                            }
                            $data['resultat'] = "Le module ainsi que tout les cours ayant une partie unique ont été ajoutés.";
                    }
                }
                } else {
                    $data['error']="Le module existe déjà, opération annulée.";
                }
            }

            $this->load->view("header", $data);
            $this->load->view("head", $data);
            $this->load->view("menu_left", $data);
            $this->load->view('resultat_action', $data);
            $this->load->view('modules_add', $data);
            $this->load->view("footer", $data);
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function Supprimer($module) {
        global $data;
        if($data['admin']) {
            $data['title'] = "Suppression d'un module";

            if($this->m_module->exists($module)) {
                $this -> m_contenu -> del_all($module);
                $this -> m_module -> del($module);
                $data['resultat'] = "Le module à bien été supprimé";
            } else {
                $data['error'] = "Ce module n'existe pas !";
            }
            $data['retour'] = "/Modules";

            $this->load->view("header", $data);
            $this->load->view("head", $data);
            $this->load->view("menu_left", $data);
            $this->load->view('resultat_action', $data);
            $this->load->view("footer", $data);
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function Modification($module) {
        global $data;
        if($data['admin']) {
            $data['module']=$module;
            $data['title']="Modification du module ".$module;
            if($this->m_module->exists($module)) {
                if(!isset($data['modifier'])) {
                    $this->form_validation->set_rules('public', 'Public', 'required');
                    $this->form_validation->set_rules('semestre', 'Semestre', 'required');
                    $this->form_validation->set_rules('libelle', 'Libellé', 'required');

                    if($this->form_validation->run() == FALSE) {

                    } else {
                        $this->m_module->set(
                            $module,
                            $this->input->post('public'),
                            $this->input->post('semestre'),
                            $this->input->post('libelle')
                        );
                        $data['resultat']="Le module à bien été modifié.";
                    }
                }

                $data['selected']=$this->m_module->get_details($module);
                $data['contenu']=$this->m_contenu->get_module($module);

                $this->load->view("header", $data);
                $this->load->view("head", $data);
                $this->load->view("menu_left", $data);
                $this->load->view('resultat_action', $data);
                $this->load->view('modules_edit', $data);
                $this->load->view("footer", $data);
            } else {
                $data['error'] = "Le cours ".$partie." n'existe pas.";
                $data['retour'] = "/Modules";
                $this->load->view("header", $data);
                $this->load->view("head", $data);
                $this->load->view("menu_left", $data);
                $this->load->view('resultat_action', $data);
                $this->load->view("footer", $data);
            }
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function SupprimerCours($module, $partie) {
        global $data;
        $partie = urldecode($partie);
        if($data['admin']) {
            if($this->m_contenu->exists($module, $partie)) {
                $this->m_contenu->del($module, $partie);
                $data['resultat'] = "Le cours ".$partie." à bien été supprimé.";
                $this->Modification($module);
            } else {
                $data['error'] = "Le cours ".$partie." n'existe pas.";
                $this->Modification($module);
            }
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function ModifierCours($module, $partie) {
        global $data;
        if($data['admin']) {
            $partie = urldecode($partie);
            if($this->m_contenu->exists($module, $partie)) {
                $this->form_validation->set_rules('modif_type', 'Modification Identitée', 'required');
                $this->form_validation->set_rules('modif_hed', 'Modification HED', 'required');

                if($this->form_validation->run() == FALSE) {
                    $data['module'] = $module;
                    $data['modifier'] = $partie;
                } else {
                    $this->m_contenu->set(
                        $module,
                        $partie,
                        $this->input->post('modif_type'),
                        $this->input->post('modif_hed')
                    );
                    $data['resultat'] = "Le cours ".$partie." à bien été modifié !";
                    $data['modifier']="????????";
                    $data['module']=$module;
                }
                $this->Modification($module);
            } else {
                $data['error'] = "Le cours ".$partie." n'existe pas.";
                $this->Modification($module);
            }
        } else {
            redirect('Dashboard', 'refresh');
        }
    }

    public function CreerCours($module) {
        global $data;
        if($data['admin']) {
            $this->form_validation->set_rules('nouveau_ident', 'Création Identifiant', 'required');
            $this->form_validation->set_rules('nouveau_type', 'Création Type', 'required');
            $this->form_validation->set_rules('nouveau_hed', 'Création HED', 'required');

            if($this->form_validation->run() == FALSE) {

            } else {
                if(!$this->m_contenu->exists(
                    $module,
                    $this->input->post('nouveau_ident')
                )) {
                    $this->m_contenu->add(
                        $module,
                        $this->input->post('nouveau_ident'),
                        $this->input->post('nouveau_type'),
                        $this->input->post('nouveau_hed')
                        );
                    $data['resultat'] = "Le cours ". $this->input->post('nouveau_ident') ." à bien été crée.";
                    $data['modifier'] = "?????????";
                    $this->Modification($module);
                } else {
                    $data['error'] = "Le cours " . $this->input->post('nouveau_ident') . " existe déjà.";
                    $this->Modification($module);
                }
            }


        } else {
            redirect('Dashboard', 'refresh');
        }
    }
}