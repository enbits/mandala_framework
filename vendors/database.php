<?php

class database{

    public $show_errors = true;
    public $table_name;
    private $default_conn_string = array('type' => DB_TYPE, 'host' => DB_HOST, 'db_name' => DB_NAME, 'db_user' => DB_USER, 'db_pass' => DB_PASS);
    private $db_conn = null;
    
    

    function __construct($params = null) {
        if ($params === null) {
            $params = $this->default_conn_string;
        }
        
        return $this->set_conn($params);
    }

    public function set_conn($params = null) {  
        try {
            
            $this->db_conn = new PDO($params['type'] . ':host=' . $params['host'] . ';dbname=' . $params['db_name'], $params['db_user'], $params['db_pass']);
           
            if ($this->show_errors) {
                $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }                 
        } catch (PDOException $e) {
            return false;
        }
        $this->db_conn->query("SET NAMES 'utf8'");
        return true;
    }
    
    function get_conn() {
        return $this->db_conn;
    }

    public function execute_stmt( $query, $params = array()) {
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute($params);
        $error = $stmt->errorInfo();
        
        if (intval($error[0])) { 
            if ($this->show_errors === true) {
                echo '<pre>';
                print_r($error);
                echo '</pre>';
            }          
            return false;
        } 
        
        return $stmt;
    }

    public function fetch_rows($query, $params = array()) {
        $stmt = $this->execute_stmt($query, $params);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
     private function get_stmt_by($field_name, $field_value, $columns_select = array('*')) {
        $columns_names = implode(',', $columns_select);
        $query = 'SELECT ' . $columns_names . ' FROM ' . $this->table_name . ' WHERE ' . $field_name . ' = ? ';
        return $this->execute_stmt($query, array($field_value));
    }

    public function get_rows_by($field_name, $field_value, $columns_select = array('*')) {
        $stmt = $this->get_stmt_by($field_name, $field_value, $columns_select);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all() {
        $query = 'SELECT * FROM ' . $this->table_name;
        $result = $this->execute_stmt($query);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    function count_rows_by($field_name, $field_value) {
        $query = 'SELECT count(*) as total FROM ' . $this->table_name . ' WHERE ' . $field_name . ' = ? ';
        $result = $this->execute_stmt($this->db_conn, $query, array($field_value));
        $obj = $result->fetchObject();
        return $obj->total;
    }

    public function insert($values) {
        $column_names = implode(',', array_keys($values));
        $bind_values = str_repeat('?,', count($values));
        $bind_values = substr($bind_values, 0, -1);
        $query = 'INSERT INTO ' . $this->table_name . ' (' . $column_names . ') VALUES (' . $bind_values . ')';
        $params = array_values($values);
        return $this->execute_stmt($query, $params);
    }

    public function update($values, $field_name, $field_value) {
        $columns_names = implode(' = ?,', array_keys($values));
        $columns_names .= ' = ? ';
        $params = array_values($values);
        $params[] = $field_value;
        $query = 'UPDATE ' . $this->table_name . ' SET ' . $columns_names . ' WHERE ' . $field_name . ' = ?';
        return $this->execute_stmt($query, $params);
    }

    public function delete($field_name, $field_value) {
        $query = 'DELETE FROM ' . $this->table_name . ' WHERE ' . $field_name . ' = ? ';
        return $this->execute_stmt($query, array($field_value));
    }
}
