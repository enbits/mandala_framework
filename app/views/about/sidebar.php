<h3>About Sidebar View</h3>
<p>The About Controller loads a sidebar view that is different from the rest by just adding a single extra line of code: 

</p>
<pre><code>$this->views['sidebar'] = load::view('about/sidebar');</code></pre>
<p>It overrides the sidebar view loaded in base controller</p>