<?php
/**
 * Created by PhpStorm.
 * Date: 07/06/2015
 * Time: 09:41
 */

class m_contenu extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_all() {
        $query=$this->db->get("contenu");
        $result = $query->result_array();
        return $result;
    }

    /***
     * @param $user string
     * @return array
     */
    public function get_user($user) {
        $query=$this->db->get_where("contenu", array('enseignant' => $user));
        $result = $query->result_array();
        return $result;
    }

    /***
     * @param $module string
     * @return array
     */
    public function get_module($module) {
        $query=$this->db->get_where("module", array('ident' => $module));
        $result = $query->result_array();
        return $result;
    }

    public function get_details($module, $partie) {

    }

    public function del($module, $partie) {

    }

    public function add() {

    }

    public function get_all_unsuscribed() {
        $query=$this->db->get_where("contenu", array('enseignant' => NULL));
        $result = $query->result_array();
        return $result;
    }
    /**
     * @param $user string
     * @return int
     */
    public function resteAPlacer($user) {
        $query= $this->db->query("SELECT Statutaire, Service FROM services WHERE login = '".$this->db->escape_str($user)."'");
        $resultat = $query->row_array();
        $resultat = $resultat['Statutaire'] - $resultat['Service'];
        return $resultat;
    }

    public function suscribe($module, $type, $enseignant) {
        $where = array(
            'module' => $module,
            'partie' => $type,
        );
        $this->db->update('contenu',array('enseignant' => $enseignant), $where);
    }

    public function unsuscribe($module, $partie) {
        $where = array(
            'module' => $module,
            'partie' => $partie,
        );
        $this->db->update('contenu',array('enseignant' => NULL), $where);
    }

    public function verif_enseignant($module, $partie, $enseignant) {
        $query=$this->db->query("SELECT enseignant FROM contenu WHERE module='".$this->db->escape_str($module)."' AND partie='".$this->db->escape_str($partie)."';");
        $result = $query->row_array();
        if($result['enseignant']== $enseignant) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}