<?php 
    $post = $variables['post'];
?>

<article>
        <header>
        <h1>Single Post View</h1>
        <p>This is how blog_controller loads this view: </p>
        <pre class="language-php"><code>function single() {
    $post = $this->posts_model->get_by_id($this->params[0]);
    if ($post !== false) {
        $this->views['main_content'] = load::view('blog/single',array('post' => $post));
    } else {
        $this->views['main_content'] = load::view('not_found');
    }
    $this->render();
}</code></pre>
    </header>
    <header>
        <h1><?php echo $post->title;?></h1>
        <p><?php echo $post->content;?></p>
    </header>   
    
</article>