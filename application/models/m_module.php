<?php
/**
 * Created by PhpStorm.
 * Date: 07/06/2015
 * Time: 09:41
 */

class m_module extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    /***
     * @return array
     */
    public function get_all() {
        $query=$this->db->get("contenu");
        $result = $query->row_array();
        return $query;
    }

    /***
     * @param $ident string
     * @param $public string
     * @param $semestre string
     * @param $libelle string
     */
    public function add($ident, $public, $semestre, $libelle) {
        $query = array(
            'ident' => $ident,
            'public' => $public,
            'semestre' => $semestre,
            'libelle' => $libelle
        );
        $this->db->insert("module", $query);
    }

    /***
     * @param $ident string
     * @param $public string
     * @param $semestre string
     * @param $libelle string
     */
    public function set($ident, $public, $semestre, $libelle) {
        $query = array(
            'ident' => $ident,
            'public' => $public,
            'semestre' => $semestre,
            'libelle' => $libelle
        );
        $this->db->update("module", $query);
    }

    /***
     * @param $ident string
     * Probablement buggée
     */
    public function del($ident) {
        $this->db->where('ident', $ident);
        $this->db->delete("module");
    }

    /***
     * @param $ident string
     * @return array
     */
    public function get_details($ident) {
        $query=$this->db->query("SELECT * FROM module WHERE ident ='".$this->db->escape_str($ident)."'");
        $results = $query->row_array();
        return $results;
    }

    /***
     * @param $ident string
     * @return bool
     */
    public function exists($ident) {
        $query=$this->db->query("SELECT COUNT(*) FROM module WHERE ident='".$this->db->escape_str($ident)."'");
        $result = $query->row_array();
        if($result['COUNT(*)']== "1") {
            return TRUE;
        }else{
            return FALSE;
        }
    }


    /***
     * @return array
     */
    public function get_module() {
        $module = "SELECT  ident, libelle, sum(hed), public, semestre
                    FROM contenu INNER JOIN module
                    WHERE module.ident = contenu.module
                    GROUP BY contenu.module";
        $query=$this->db->query($module);
        $result = $query->result_array();
        return $result;
    }

    public function get_enseignant() {
        $enseignant = "SELECT login, nom, service, statutaire - service
                        FROM contenu INNER JOIN services
                        GROUP BY services.login";
        $query=$this->db->query($enseignant);
        $result = $query->result_array();
        return $result;
    }

    public function get_hmodule() {
        $enseignant = "SELECT ident, libelle, sum(contenu.hed), sum(if(contenu.enseignant is null,contenu.hed, 0)), semestre
                        FROM contenu, module
                        where module.ident = contenu.module
                        group by contenu.module";
        $query=$this->db->query($enseignant);
        $result = $query->result_array();
        return $result;
    }


}


