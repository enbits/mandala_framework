<?php

class home_controller extends base_controller {
    
    function __construct() {
        parent::__construct();
        
        $this->name = 'home';
    }
    
    function index() {
        $this->views['main_content'] = load::view('home/index'); 
        $this->render();
    }
     
}

