<?php 
    $template_path = BASE_PATH.'/app/views/templates/html5_bones';
?>
<!DOCTYPE html>
<html lang="en"> <!-- Set this to the main language of your site -->
<head>
	<meta charset="utf-8">
	
	<title>HTML5 Bones :: PAGE TITLE</title>
	
	<!-- Enter a brief description of your page -->
	<meta name="description" content="">
	
	<!-- Define a viewport to mobile devices to use - telling the browser to assume that the page is as wide as the device (width=device-width) and setting the initial page zoom level to be 1 (initial-scale=1.0) -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Add normalize.css which enables browsers to render all elements more consistently and in line with modern standards as it only targets particular styles that need normalizing -->
	<link href="<?php echo $template_path;?>/css/normalize.css" rel="stylesheet" media="all">
	<!-- For legacy support (IE 6/7, Firefox < 4, and Safari < 5) use normalize-legacy.css instead -->
	<!--<link href="<?php echo $template_path;?>/css/normalize-legacy.css" rel="stylesheet" media="all">-->
	
	<!-- Include the site stylesheet -->
	<link href="<?php echo $template_path;?>/css/styles.css" rel="stylesheet" media="all">
	
	<!-- Include the HTML5 shiv print polyfill for Internet Explorer browsers 8 and below -->
	<!--[if lt IE 9]><script src="<?php echo $template_path;?>/js/html5shiv-printshiv.js" media="all"></script><![endif]-->
</head>
<body>

	<!-- The page header typically contains items such as your site heading, logo and possibly the main site navigation -->
	<!-- ARIA: the landmark role "banner" is set as it is the prime heading or internal title of the page --> 
	<header role="banner">
	
		<h1><abbr title="Website Example Developed With rack_mvc">My</abbr> Website</h1>
		
		<!-- ARIA: the landmark role "navigation" is added here as the element contains site navigation
		NOTE: The <nav> element does not have to be contained within a <header> element, even though the two examples on this page are. -->
		<nav role="navigation">
                    <?php echo $variables['views']['menu'];?>
			<!-- This can contain your site navigation either in an unordered list or even a paragraph that contains links that allow users to navigate your site -->			
		</nav>
		
	</header>
	
	<!-- If you want to use an element as a wrapper, i.e. for styling only, then <div> is still the element to use -->
	<div class="wrap">
	
		<!-- The <main> element is used to enclose the main content, i.e. that which contains the central topic of a document -->
		<!-- ARIA: the landmark role "main" is added here as it contains the main content of the document, and it is recommended to add it to the
		<main> element until user agents implement the required role mapping. -->
		<main role="main">
	
			<!-- The <section> element can be used to enclose content that comes under a related heading. 
			NOTE: The <section> element can contain <article> elements and vice versa, if you think the content warrants it. -->		
			<section>
			
				<!-- This is the section's header. It contains the heading and navigation links for within the section -->
				<!--<header>
					<h2><?php echo ucfirst($variables['name']);?></h2>
					<!-- ARIA: the landmark role "navigation" is added here as the element contains page navigation -->
					<!--<nav role="navigation">
						<ul>
							<li><a href="#introduction">Introduction</a></li>
							<li><a href="#instructions">Instructions</a></li>
						</ul>
					</nav>
				</header>-->
				
				<!-- The <article> element can be used to enclose content that still makes sense on its own and is therefore "reusable" -->
				<article id="<?php echo $variables['title'];?>-article">
				
					<?php echo $variables['views']['main_content'];?>
					
				</article>			
			</section>
		</main>	
	</div>
	<footer role="contentinfo">
		<!-- Copyright information can be contained within the <small> element. The <time> element is used here to indicate that the '2013' is a date -->
		<small>Copyright &copy; <time datetime="2014">2014</time></small>
	</footer>	
</body>
</html>
