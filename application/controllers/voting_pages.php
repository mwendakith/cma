<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voting_pages extends CI_Controller {
    public function nation() {
        
    }
    
    
    public function functionName($list_id) {
        $return_string;
        for($var = 2; $var < 10; $var ++){
            $this->voting_list($list_id, $var);
        }
    }
    
    public function voting_list($list_id, $post) {
        // Selects details of candidates
        // The nested query gets the national id of the candidates
        $sql = "SELECT * ";
        $sql .= "FROM `Members` ";
        $sql .= "WHERE `National_ID` = (";
        $sql .= "SELECT `National_ID` ";
        $sql .= "FROM `Election` ";
        $sql .= "WHERE `List_ID` =  '{$list_id}' ";
        $sql .= "AND `Post_ID` = '{$post}' ";
        
        $query = $this->db->query($sql);
        
        //$candidate_array = array();
        
        foreach ($query->result as $new_row) {
            $name = $new_row->surname . " " . $new_row->first_name;
            // $candidate_array[$new_row->national_id] = $name;
            
            
        }
        
       // return $candidate_array;
    }
}