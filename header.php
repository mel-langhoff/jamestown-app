<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php bloginfo('name'); ?></title>

  <!-- FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@400;500;600&family=Cinzel:wght@400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
  <!-- MAIN HEADER -->
  <div class="header-main">

    <!-- LEFT LOGO (optional image later) -->
    <div class="logo-circle">
      <!-- you can replace with your seal -->
      <div class="logo-placeholder">INC. 1883</div>
    </div>

    <!-- SCRIPT TITLE -->
    <div class="header-title">
      <div class="script-logo">Town of Jamestown</div>
      <div class="sub-logo">COLORADO</div>
    </div>

    <!-- SEARCH -->
    <div class="header-search">
      <?php get_search_form(); ?>
    </div>

  </div>

  <!-- NAV -->
  <nav class="nav-bar">
    <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'nav-menu'
      ));
    ?>
  </nav>

</header>