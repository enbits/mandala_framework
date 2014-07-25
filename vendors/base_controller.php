<?php
/**
 * 
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
        parent::__construct();
        
    }
    
    function render() {
        echo load::view($this->template, array('views' => $this->views, 'name' => $this->name));
    }
}