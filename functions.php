<?php

// =========================
// LOAD JS
// =========================
function jamestown_scripts() {
    wp_enqueue_script(
        'jamestown-js',
        get_template_directory_uri() . '/js/app.js',
        array(),
        time(),
        true
    );
}
add_action('wp_enqueue_scripts', 'jamestown_scripts');


// =========================
// REGISTER MENU
// =========================
function jamestown_menus() {
    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'jamestown_menus');


// =========================
// API ROUTE (FIXED VERSION)
// =========================
add_action('rest_api_init', function () {
    register_rest_route('jamestown/v1', '/posts', array(
        'methods'  => 'GET',
        'callback' => function () {

            $response = wp_remote_get('https://jamestownco.org/wp-json/wp/v2/posts');

            if (is_wp_error($response)) {
                return [];
            }

            $body = wp_remote_retrieve_body($response);

            // 👇 THIS IS IMPORTANT (fixes weird JSON issues)
            return json_decode($body, true);
        }
    ));
});

add_action('rest_api_init', function () {
  register_rest_route('jamestown/v1', '/pages', array(
    'methods'  => 'GET',
    'callback' => function () {

      $response = wp_remote_get('https://jamestownco.org/wp-json/wp/v2/pages');

      if (is_wp_error($response)) {
        return [];
      }

      return json_decode(wp_remote_retrieve_body($response), true);
    }
  ));
});