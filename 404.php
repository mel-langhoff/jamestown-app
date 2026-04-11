<?php get_header(); ?>

<div class="page-hero"></div>

<div class="layout">
  <div class="main-content">

    <div class="page-content-box">

      <h1 class="page-title">Page Not Found</h1>

      <p>
        Looks like you wandered off the trail. This page doesn’t exist or has been moved.
      </p>

      <div style="margin-top: 20px;">
        <a href="<?php echo home_url(); ?>" class="btn primary">
          Return Home
        </a>
      </div>

      <div style="margin-top: 30px;">
        <?php get_search_form(); ?>
      </div>

    </div>

  </div>
</div>

<?php get_footer(); ?>