<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
  <link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/img/favicon.png" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/bootstrap-theme.min.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/style.css">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="<?php bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
  
</head>
<body <?php body_class(); ?>>
<!-- Header -->
<header class="head-row">
  <div class="container">
    <div class="row">
      <div class="col-md-2"><a href="<?php echo home_url( '/' ); ?>"><img src="<?php bloginfo('template_directory');?>/img/logo-sib.svg" alt="logo"></a></div>
      <div class="col-md-10">
        <div class="icon-nav">
          <ul class="sub-nav">
            <li><a href="#"><img src="<?php bloginfo('template_directory');?>/img/ico-search.svg" alt="Buscar"></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_directory');?>/img/ico-share.svg" alt="Compartir"></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_directory');?>/img/ico-contact.svg" alt="Buscar"></a></li>
          </ul>
        </div>
        <nav class="main-nav">
          <?php 
            $args = array(
              'theme_location' => 'primary'
            );
          ?>
          <?php wp_nav_menu($args); ?>
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- / Header -->