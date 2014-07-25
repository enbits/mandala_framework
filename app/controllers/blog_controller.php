<?php

class blog_controller extends base_controller {
    
    var $posts_model;
       
    function __construct() {
        $this->name = 'blog';
        $this->posts_model = load::model('posts');
        parent::__construct();
    }
    
    function index() {
        $posts = $this->posts_model->get_all();
        $this->views['main_content'] = load::view('blog/index',array('posts' => $posts));
        $this->render();
    }
    
    function single() {
        $post = $this->posts_model->get_by_id($this->params[0]);
        if ($post !== false) {
            $this->views['main_content'] = load::view('blog/single',array('post' => $post));
        } else {
            $this->views['main_content'] = load::view('not_found');
        }
        $this->render();
    }
}