<article>
    <header>
        <h1>Home Sweet Home</h1>
        <p>This is the Home View located in app/views/home/index.php and added by the home_controller located in app/controllers/home just like this: </p>
<pre class="language-php"><code>function index() {
    $this->views['main_content'] = load::view('home/index'); 
    $this->render();
}</code></pre>
    </header>
</article>