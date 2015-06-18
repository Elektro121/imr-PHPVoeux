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
        $query=$this->db->get_where("contenu", array('module' => $module));
        $result = $query->result_array();
        return $result;
    }

    public function exists($module, $partie) {
        $query=$this->db->query("SELECT COUNT(*) FROM contenu WHERE module='".$this->db->escape_str($module)."' AND partie='".$this->db->escape_str($partie)."'");
        $result = $query->row_array();
        if($result['COUNT(*)']== "1") {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function del($module, $partie) {
        $this->unsuscribe($module, $partie);

        $this -> db -> where('module', $module);
        $this -> db -> where('partie', $partie);
        $this -> db -> delete('contenu');
    }

    public function del_all($module) {
        $this -> unsuscribe_all($module);

        $this -> db -> where('module', $module);
        $this -> db -> delete('contenu');
    }

    public function add($module, $partie, $type, $hed) {
        $query = array(
            'module' => $module,
            'partie' => $partie,
            'type' => $type,
            'hed' => $hed
        );
        $this->db->insert('contenu', $query);
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

    public function unsuscribe_all($module) {
        $where = array(
            'module' => $module,
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