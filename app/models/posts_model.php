<?php

class posts_model extends base_model {
    
    function __construct() {
        $this->table_name = 'posts';
        parent::__construct();
    }
    
    function get_all() {
        return $this->db->get_all();
    }
    
    function get_by_id($id) {
        $post = $this->db->get_rows_by('id', $id);
        if (count($post)) {
            return $post[0];
        }
        return false;
    }
}