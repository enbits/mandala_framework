<?php
/*
 * This is the parent of all the controllers in app/controller folder. It's located here so it can't be accesed trough a public url like: http:/mysite.com/base_controller
 */
class base_controller extends controller {
    
    protected $template;
    protected $views;
    
    function __construct() {      
        $this->template ='templates/initializr/index';
        $this->views = array();
        $this->views['menu'] = load::view('menu');
        $this->views['sidebar'] = load::view('sidebar');
        $this->views['footer'] = load::view('footer');

        if ((DB_TYPE == 'sqlite') && (!in_array('sqlite',PDO::getAvailableDrivers()))) {
            $this->views['message'] = load::view('message',array('message' => "It seems that you don't have PDO's sqlite driver enabled. Please, enable it or use mysql connection instead. By doing so you will be able to see the post listing in the Blog Section.",'message_type' => 'error'));
        }
        parent::__construct();
        
    }
    
    function render() {
        echo load::view($this->template, array('views' => $this->views, 'name' => $this->name));
    }
}