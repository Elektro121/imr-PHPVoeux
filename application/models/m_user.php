<?php
/**
 * Created by PhpStorm.
 * Date: 29/05/2015
 * Time: 13:42
 */

class m_user extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    /**
     * @param $user string
     * @param $password string
     */
    public function change_password($user,$password){
        $query = array(
            'login' => $user,
            'pwd' => $password
        );
        $this->db->update("enseignant", $query);
    }

    /**
     * @param $user string
     * @param $name string
     */
    public function change_name($user,$name){
        $query = array(
            'login' => $user,
            'prenom' => $name
        );
        $this->db->update("enseignant", $query);
}

    /**
     * @param $user string
     * @param $surname string
     */
    public function change_surname($user,$surname){
        $query = array(
            'login' => $user,
            'nom' => $surname
        );
        $this->db->update("enseignant", $query);
    }

    /**
     * @param $user string
     * @param $statut string
     */
    public function change_statut($user,$statut){
        $query = array(
            'login' => $user,
            'statut' => $statut
        );
        $this->db->update("enseignant", $query);
    }


    /**
     * @param $user string
     * @param $statutaire string
     */
    public function change_statutaire($user,$statutaire) {
        $query = array(
            'login' => $user,
            'statut' => $statutaire
        );
        $this->db->update("enseignant", $query);
    }

    /**
     * @param $user string
     * @param $password
     * @return bool
     */
    public function check_password($user, $password){
        $query=$this->db->query("SELECT pwd FROM enseignant WHERE login ='".$this->db->escape_str($user)."'");
        $results = $query->row_array();
        if($results['pwd'] === $password) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
     * @param $user string
     * @return bool
     */
    public function is_admin($user){
        $query=$this->db->query("SELECT administrateur FROM enseignant WHERE login ='".$this->db->escape_str($user)."'");
        $results = $query->row_array();
        if($results['administrateur']== "1") {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
     * @param $user string
     * @return bool
     */
    public function is_active($user){
        $query=$this->db->query("SELECT actif FROM enseignant WHERE login ='".$this->db->escape_str($user)."'");
        $result = $query->row_array();
        if($result['actif']== "1") {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
     * @param $user string
     * @return array
     */
    public function get_details($user) {
        $query=$this->db->query("SELECT * FROM enseignant WHERE login ='".$this->db->escape_str($user)."'");
        $results = $query->row_array();
        return $results;
    }

    /**
     * @param $user string
     * @return bool
     */
    public function exists($user) {
        $query=$this->db->query("SELECT COUNT(*) FROM enseignant WHERE login='".$this->db->escape_str($user)."'");
        $result = $query->row_array();
        if($result['COUNT(*)']== "1") {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}