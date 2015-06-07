<?php
/**
 * Created by PhpStorm.
 * Date: 07/06/2015
 * Time: 09:41
 */

class m_decharge extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    /***
     * @return array
     */
    public function get_all() {
        $query=$this->db->get("decharge");
        $result = $query->row_array();
        return $query;
    }

    /***
     * @param $user string
     * @param $decharge int
     */
    public function set($user, $decharge) {
        $query = array(
            'enseignant' => $user,
            'decharge' => $decharge
        );
        $this->db->update("decharge", $query);
    }

    /***
     * @param $user string
     * @return bool
     */
    public function exists($user) {
        $query=$this->db->query("SELECT COUNT(*) FROM module WHERE enseignant='".$this->db->escape_str($user)."'");
        $result = $query->row_array();
        if($result['COUNT(*)']== "1") {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /***
     * @param $user string
     * @param $decharge int
     */
    public function add($user, $decharge) {
        if(exist($user)) {
            set($user, $decharge);
        }
        else {
            $query = array(
                'enseignant' => $user,
                'decharge' => $decharge
            );
            $this->db->insert("decharge",$query);
        }
    }

    /***
     * @param $user string
     */
    public function del($user) {
        $this -> db -> where('enseignant', $user);
        $this -> db -> delete('decharge');
    }

}