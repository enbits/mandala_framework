<?php
$posts = $variables['posts'];
?>
<article>
    <header>
        <h1>Blog</h1>
        <p>In this case the blog controller gets the posts from the model and passes them to the view: </p>
        <pre class="language-php"><code>function index() {
    $posts_model = load::model('posts');
    $posts = $posts_model->get_all();
    $this->views['main_content'] = load::view('blog/index',array('posts' => $posts));
    $this->render();
}</code></pre>
    </header>
<?php if (is_array($posts)): ?>
<h1>And here's the post listing...</h1>    
    <?php foreach ($posts as $p): ?>
    <section>
        <h2><a href="<?php echo BASE_PATH . '/blog/single/' . $p->id; ?>"><?php echo $p->title;?></a></h2>
        <p><?php echo substr($p->content,0,200);?></p>
    </section>
    <?php endforeach; ?>
<?php else:?>
<h1>No posts found...</h1>
<section><p>There are no posts...missing database connection?</section>
<?php endif; ?>
</article>

