<?php 
    $template_path = BASE_PATH.'/app/views/templates/initializr';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Website Example - <?php echo ucfirst($variables['name']);?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo $template_path;?>/css/normalize.min.css">
        <link rel="stylesheet" href="<?php echo $template_path;?>/css/main.css">
        <link rel="stylesheet" href="<?php echo $template_path;?>/js/vendor/prism/prism.css">
        <script src="<?php echo $template_path;?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Website Example</h1>
                <nav>
                    <?php echo $variables['views']['menu']; ?>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
                <?php if (isset($variables['views']['message'])) { echo $variables['views']['message'];}?>
                <?php echo $variables['views']['main_content'];?>
                <aside>
                    <?php echo $variables['views']['sidebar'];?>
                </aside>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <?php echo $variables['views']['footer'];?>
            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $template_path;?>/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="<?php echo $template_path;?>/js/vendor/prism/prism.js"></script>
        <script src="<?php echo $template_path;?>/js/main.js"></script>
    </body>
</html>
