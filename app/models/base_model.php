<?php

class base_model 
{
    protected $db;
    protected $table_name;
    
    function __construct() {
        $this->db = new database();
        $this->db->table_name = $this->table_name;
        
    }
}