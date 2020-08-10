<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

    protected $User_table_name = "students";

    /**
     * Insert User Data in Database
     * @param: {array} userData
     */
    public function insert_user($userData) {
        return $this->db->insert($this->User_table_name, $userData);
    }

    /**
     * Check User Login in Database
     * @param: {array} userData
     */
    public function check_login($userData) {

        /**
         * First Check Registration Id is Exists in Database
         */

try {
      $query = $this->db->get_where($this->User_table_name, array('reg_id' => $userData['reg_id']));


     if ($this->db->affected_rows() > 0) {

       /**
        * Student Registration Id Valid
        */
       return [
           'status' => TRUE,
           'data' => $query->row(),
       ];

     }
} catch (\Exception $e) {
    return ['status' => FALSE,'data' => $e." Registration Id doest not exist"];
}


    }
}
