<?php get_header(); ?>

<div class="page-hero"></div>

<div class="layout">
  <div class="main-content">

    <div class="page-content-box">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <h1 class="page-title"><?php the_title(); ?></h1>

        <p style="font-size: 14px; color: #777; margin-bottom: 20px;">
          Posted on <?php echo get_the_date(); ?>
        </p>

        <?php if (has_post_thumbnail()) : ?>
          <div style="margin-bottom: 20px;">
            <?php the_post_thumbnail('large', ['style' => 'width:100%; height:auto; border-radius:8px;']); ?>
          </div>
        <?php endif; ?>

        <div class="page-content">
          <?php the_content(); ?>
        </div>

        <div style="margin-top: 40px;">
          <a href="<?php echo home_url(); ?>" class="btn primary">
            ← Back to Home
          </a>
        </div>

      <?php endwhile; endif; ?>

    </div>

  </div>
</div>

<?php get_footer(); ?>