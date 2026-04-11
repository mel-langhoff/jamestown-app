<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php bloginfo('name'); ?></title>

  <!-- FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@400;500;600&family=Cinzel:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">

  <!-- MAIN HEADER -->
  <div class="header-main container">

    <div class="logo-circle">
      <div class="logo-placeholder">INC. 1883</div>
    </div>

    <div class="header-title">
      <div class="script-logo">Town of Jamestown</div>
      <div class="sub-logo">COLORADO</div>
    </div>

  

  </div>

  <!-- 🔥 MOBILE TOGGLE -->
  <button class="menu-toggle">☰</button>

  <!-- NAV -->
  <nav class="nav-bar">
    <div class="nav-wrapper container">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'nav-menu'
        ));
      ?>
    </div>
  </nav>

</header>