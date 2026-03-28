<?php get_header(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Jamestown Feed</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 40px;
      background: #f5f5f5;
    }

    .card {
      background: white;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .parallax {
      height: 300px;
      background-size: cover;
      background-position: center;
      margin: 40px 0;
      border-radius: 8px;
    }
  </style>

  <?php wp_head(); ?>
</head>

<body>

<h1>Jamestown Feed</h1>

<?php
// =========================
// 🔥 FETCH WORDPRESS API IN PHP
// =========================

$response = wp_remote_get('https://jamestownco.org/wp-json/wp/v2/posts');

if (is_wp_error($response)) {
    echo '<p>API ERROR</p>';
} else {
    $body = wp_remote_retrieve_body($response);
    $posts = json_decode($body);

    if (!empty($posts)) {
        foreach ($posts as $index => $post) {

            // 👇 insert image after 2nd post
            if ($index === 2) {
                echo '<div class="parallax" style="background-image:url(https://jamestownco.org/wp-content/uploads/2026/03/collage.png);"></div>';
            }

            echo '<div class="card">';
            echo '<h2>' . $post->title->rendered . '</h2>';
            echo '<div>' . $post->excerpt->rendered . '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No posts found.</p>';
    }
}
?>

<?php wp_footer(); ?>
</body>
</html>