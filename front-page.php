<?php get_header(); ?>

<section class="hero">

  <div class="hero-overlay">

    <div class="hero-content">

      <div class="hero-frame">

        <div class="hero-small"></div>

        <h1 class="hero-title hero-script" id="heroText">
  Town of Jamestown
</h1>

        <div class="divider">
          <span></span>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/pickaxe.svg">
          <span></span>
        </div>

        <p class="hero-description">
          A historic mountain community rooted in Colorado’s mining heritage, 
          preserving our past while building a strong future.
        </p>

        <div class="hero-buttons">
          <a href="#" class="btn primary">Pay Water Bill</a>
          <a href="#" class="btn primary">In Town</a>
          <a href="#" class="btn primary">Calendar</a>          

          <!-- <a href="#" class="btn outline">News & Events</a> -->
        </div>

      </div>

    </div>

  </div>

</section>


<section class="news-row-section">

  <h2 class="section-title">Town News</h2>

  <div class="news-row" id="app"></div>

</section>


<?php get_footer(); ?>