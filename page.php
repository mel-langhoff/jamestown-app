<?php get_header(); ?>

<div id="app">
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>

<?php
$response = wp_remote_get('https://jamestownco.org/wp-json/wp/v2/pages');

if (is_array($response) && !is_wp_error($response)) {
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    foreach ($data as $page) {
        echo '<h2>' . $page->title->rendered . '</h2>';
        echo $page->content->rendered;
    }
}
?>