<?php



// =========================
// 🔥 REGISTER MENU
// =========================
function jamestown_setup() {
    register_nav_menus(array(
        'primary' => 'Primary Menu'
    ));
}
add_action('after_setup_theme', 'jamestown_setup');


// =========================
// 🔥 API ROUTE - POSTS
// =========================
add_action('rest_api_init', function () {
    register_rest_route('jamestown/v1', '/posts', array(
        'methods'  => 'GET',
        'callback' => function () {

            $response = wp_remote_get('https://jamestownco.org/wp-json/wp/v2/posts');

            if (is_wp_error($response)) {
                return [];
            }

            return json_decode(wp_remote_retrieve_body($response), true);
        }
    ));
});


// =========================
// 🔥 API ROUTE - PAGES
// =========================
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


// =========================
// 🔥 API ROUTE - MENU
// =========================
add_action('rest_api_init', function () {
    register_rest_route('jamestown/v1', '/menu', array(
        'methods'  => 'GET',
        'callback' => function () {

            return wp_get_nav_menu_items('primary');
        }
    ));
});