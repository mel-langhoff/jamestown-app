<?php
/*
Template Name: Custom Page
*/
get_header();
?>

<div class="layout">

  <div class="main-content">

    <?php while (have_posts()) : the_post(); ?>

      <h1 class="page-title"><?php the_title(); ?></h1>

      <div class="page-content">
        <?php the_content(); ?>
      </div>

    <?php endwhile; ?>

  </div>

  <aside class="sidebar">
    <img src="https://jamestownco.org/wp-content/uploads/2026/03/deer-scaled.jpg">
  </aside>

</div>

<?php get_footer(); ?>