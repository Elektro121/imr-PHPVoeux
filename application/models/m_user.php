<?php
/**
 * Created by PhpStorm.
 * Date: 29/05/2015
 * Time: 13:42
 */

// TODO fonction del
// TODO fonction set

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
            'pwd' => $password
        );
        $where = array(
            'login' => $user
        );
        $this->db->update("enseignant", $query, $where);
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

    /***
     * @param $user string
     * @return array
     */
    public function get_all() {
        $query=$this->db->get("enseignant");
        $result = $query->result_array();
        return $result;
    }

    /**
     * @param $user string
     */
    public function del($user) {
        $this -> db -> where('login', $user);
        $this -> db -> delete('enseignant');
    }

    public function clean($user) {
        $this -> db -> where('enseignant', $user);
        $this -> db -> update('contenu', array('enseignant' => NULL));

        $this -> db -> where('responsable', $user);
        $this -> db -> update('module', array('responsable' => NULL));

        $this -> db -> delete('decharge', array('enseignant' => $user));
    }

    public function get_usernames() {
        $this->db->select('login');
        $query=$this->db->get("enseignant");
        $result = $query->result_array();
        return $result;
    }

    public function add($login, $pwd, $nom, $prenom, $statutaire, $choixtype, $actif, $administrateur) {
        $request = array(
            'login' => $login,
            'pwd' => $pwd,
            'nom' => $nom,
            'prenom' => $prenom,
            'statut' => $choixtype,
            'statutaire' => $statutaire,
            'actif' => $actif,
            'administrateur' => $administrateur,
        );
        $this->db->insert('enseignant',$request);
    }

    public function modify($login, $nom, $prenom, $statutaire, $choixtype, $actif, $administrateur) {
        $request = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'statut' => $choixtype,
            'statutaire' => $statutaire,
            'actif' => $actif,
            'administrateur' => $administrateur,
        );
        $this->db->update('enseignant',$request,array('login' => $login));
    }

    public function gen_login($nom, $prenom) {
        $nom = substr(strtolower(trim($nom)),0,8);
        $prenom = substr(strtolower(trim($prenom)),0,1);
        $doublon = 0;
        do {
            $generation = "";
            if($doublon != 0) {
                $generation = $doublon;
            }

            $generation = $prenom.$nom.$generation;

            if($doublon == 0) {
                $doublon = 2;
            } else {
                $doublon = $doublon + 1;
            }
        } while ($this->exists($generation));
        return $generation;
    }

    public function mdp($user){
        $query=$this->db->query("SELECT pwd FROM enseignant WHERE login ='".$this->db->escape_str($user)."'");
        $results = $query->row_array();
        if($results['pwd']== "servicesENSSAT") {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

