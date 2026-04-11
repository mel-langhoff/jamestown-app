<?php get_header(); ?>

<section class="hero">
  <div class="hero-overlay">
    <div class="hero-content">

      <div class="hero-frame">

        <h1 class="hero-title hero-script" id="heroText">
          Town of<br>Jamestown
        </h1>

        <div class="divider">
          <span></span>
          <img src="https://jamestownco.org/wp-content/uploads/2026/04/pd2.png">
          <span></span>
        </div>

        <div class="hero-buttons">
          <a href="#" class="btn primary">Pay Water Bill</a>
          <a href="#" class="btn primary">Town Board</a>
          <a href="#" class="btn primary">Calendar</a>
        </div>

      </div>

    </div>
  </div>
</section>

<section class="news-row-section">

  <h2 class="section-title">Town News</h2>
  <div class="full-bar"></div>

  <div class="news-row" id="app"></div>

  <div class="scroll-controls">
  <div class="scroll-arrow left" id="scrollLeft">←</div>
  <div class="scroll-arrow right" id="scrollRight">→</div>
</div>

</section>

<?php get_footer(); ?>