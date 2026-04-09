<?php
/*
Template Name: Custom Page
*/
get_header();
?>

<!-- 🔥 FIXED IMAGE AT TOP -->
<div class="page-hero"></div>

<div class="layout">

  <div class="main-content page-content-box">

    <?php while (have_posts()) : the_post(); ?>

      <h1 class="page-title"><?php the_title(); ?></h1>

      <div class="page-content">
        <?php the_content(); ?>
      </div>

    <?php endwhile; ?>

  </div>

</div>

<?php get_footer(); ?>