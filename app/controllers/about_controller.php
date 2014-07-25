<?php

class about_controller extends base_controller {
    
    public function __construct() {
        $this->name = 'about';
        parent::__construct();
    }
    
    function index() {
        $this->views['main_content'] = load::view('about/index');
        $this->views['sidebar'] = load::view('about/sidebar');
        $this->render();
    }
}