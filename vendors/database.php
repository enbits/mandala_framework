<?php

class database {

    public $show_errors = true;
    public $table_name;
    private $db_conn;
    private static $instance = null;

    private function __construct($params = null) {
        if ($params === null) {
            return false;
        }

        return $this->set_conn($params);
    }

    public static function get_instance($params = null) {
        if (self::$instance === null) {
            self::$instance = new self($params);
        }
        return self::$instance;
    }

    public function set_conn($params = null) {
        try {
            if ($params['type'] === 'sqlite') {
                $file = $params['file'];
                $this->db_conn = new PDO('sqlite:' . $file);
            } else {
                $this->db_conn = new PDO($params['type'] . ':host=' . $params['host'] . ';dbname=' . $params['db_name'], $params['db_user'], $params['db_pass']);
                $this->db_conn->query("SET NAMES 'utf8'");
            }

            if ($this->show_errors) {
                $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }
        } catch (PDOException $e) {
            $this->db_conn = null;
            return false;
        }

        return true;
    }

    function get_conn() {
        return $this->db_conn;
    }

    public function execute_stmt($query, $params = array()) {
        if ($this->db_conn !== null) {
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
        return false;
    }

    public function fetch_rows($query, $params = array()) {
        $stmt = $this->execute_stmt($query, $params);
        if ($stmt !== false) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }

    private function get_stmt_by($field_name, $field_value, $columns_select = array('*')) {
        $columns_names = implode(',', $columns_select);
        $query = 'SELECT ' . $columns_names . ' FROM ' . $this->table_name . ' WHERE ' . $field_name . ' = ? ';
        return $this->execute_stmt($query, array($field_value));
    }

    public function get_rows_by($field_name, $field_value, $columns_select = array('*')) {
        $stmt = $this->get_stmt_by($field_name, $field_value, $columns_select);
        if ($result !== false) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function get_all() {
        $query = 'SELECT * FROM ' . $this->table_name;
        $result = $this->execute_stmt($query);
        if ($result !== false) {
            return $result->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    function count_rows_by($field_name, $field_value) {
        $query = 'SELECT count(*) as total FROM ' . $this->table_name . ' WHERE ' . $field_name . ' = ? ';
        $result = $this->execute_stmt($this->db_conn, $query, array($field_value));
        if ($result !== false) {
            $obj = $result->fetchObject();
            return $obj->total;
        }
        return false;
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
