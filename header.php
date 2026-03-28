<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php bloginfo('name'); ?></title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@500;700&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">

  <!-- Your CSS -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">

  <!-- LOGO --> 
  <!-- <div class="header-logo">
    <a href="<?php echo home_url(); ?>">
      <img src="https://jamestownco.org/wp-content/uploads/2026/03/ksldjflksdjl.png">
    </a>
  </div> -->

<!-- NAV -->
  <nav class="header-nav">
    <ul>

      <li><a href="<?php echo home_url(); ?>">Home</a></li>

      <li>
        <a href="#">Business ▾</a>
        <ul>
          <li><a href="<?php echo home_url('/town-board/'); ?>">Town Board</a></li>
          <li><a href="<?php echo home_url('/board-of-trustees-meetings/'); ?>">Meetings</a></li>
          <li><a href="<?php echo home_url('/minutes/'); ?>">Minutes</a></li>
          <li><a href="<?php echo home_url('/board-of-trustees-meeting-agendas/'); ?>">Agendas</a></li>
          <li><a href="<?php echo home_url('/construction/'); ?>">Construction</a></li>
          <li><a href="<?php echo home_url('/ordinances-2/'); ?>">Ordinances</a></li>
          <li><a href="<?php echo home_url('/resolutions-2/'); ?>">Resolutions</a></li>
          <li><a href="<?php echo home_url('/permits/'); ?>">Permits</a></li>
          <li><a href="<?php echo home_url('/parks/'); ?>">Parks & Land Use</a></li>
          <li><a href="<?php echo home_url('/cemetery/'); ?>">Cemetery</a></li>
          <li><a href="<?php echo home_url('/water-operations/'); ?>">Water Operations</a></li>
          <li><a href="<?php echo home_url('/luhac-jamestown-land-use-and-housing-advisory-committee/'); ?>">LUHAC</a></li>
          <li><a href="<?php echo home_url('/jvfd-ems/'); ?>">Fire / EMS</a></li>
          <li><a href="<?php echo home_url('/library/'); ?>">Library</a></li>
          <li><a href="<?php echo home_url('/calendar/'); ?>">Calendar</a></li>
        </ul>
      </li>

      <li>
        <a href="#">Services ▾</a>
        <ul>
          <li><a href="<?php echo home_url('/fire-department-jvfd-ems/'); ?>">Fire Department</a></li>
          <li><a href="<?php echo home_url('/garden-committee/'); ?>">Community Gardens</a></li>
          <li><a href="<?php echo home_url('/library-faqs/'); ?>">Library FAQs</a></li>
          <li><a href="<?php echo home_url('/boulder-county-sustainability-grant/'); ?>">Sustainability Grant</a></li>
        </ul>
      </li>

      <li>
        <a href="#">News & Events ▾</a>
        <ul>
          <li><a href="<?php echo home_url('/history/'); ?>">History</a></li>
          <li><a href="<?php echo home_url('/fundraisers/'); ?>">Fundraisers</a></li>
          <li><a href="<?php echo home_url('/news-media/'); ?>">News</a></li>
        </ul>
      </li>

      <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>

    </ul>
  </nav>
  

</header>