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

    public function get_user($user) {
        $query=$this->db->get_where("contenu", array('enseignant' => $user));
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
}