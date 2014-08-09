<?php

class base_model 
{
    protected $db;
    protected $table_name;
    
    function __construct() {
        if (DB_TYPE === 'sqlite') {
            $params = array('type' => 'sqlite', 'file' => DB_FILE);
        } else {
            $params = array('db_type' => DB_TYPE, 'db_host' => DB_HOST, 'db_user' => DB_USER, 'db_pass' => DB_PASS, 'db_name' => DB_NAME);
        }
       
        $this->db = database::get_instance($params);
        $this->db->table_name = $this->table_name;
        
    }
}