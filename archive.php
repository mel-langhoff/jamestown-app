<?php get_header(); ?>

<div class="page-hero"></div>

<div class="layout">
  <div class="main-content">

    <div class="page-content-box">

      <h1 class="page-title">
        Search Results for: "<?php echo get_search_query(); ?>"
      </h1>

      <?php if (have_posts()) : ?>

        <div id="app">

          <?php while (have_posts()) : the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="news-card">

              <h3><?php the_title(); ?></h3>

              <div class="news-content">
                <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                <span class="read-more">Read more →</span>
              </div>

            </a>

          <?php endwhile; ?>

        </div>

      <?php else : ?>

        <p>No results found. Try a different search.</p>

        <div style="margin-top: 20px;">
          <?php get_search_form(); ?>
        </div>

      <?php endif; ?>

    </div>

  </div>
</div>

<?php get_footer(); ?>