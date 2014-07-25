<?php

class controller {

    /*
     * The controller name
     */
    protected $name;

    /*
     * Parameters passed trough url
     */
    public $params;

    /*
     * Parameters passed trough POST
     */
    public $post;

    /*
     * Parameters passed trough GET
     */
    public $get;

    public function __construct() {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->load = new load();
    }

    public function set_params(array $params = array()) {
        $this->params = $params;
    }

    public function output($action, $params) {
        $this->set_params($params);
        echo $this->$action();
    }
}