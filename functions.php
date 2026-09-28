<?php

// =========================
// REGISTER MENU
// =========================
function jamestown_setup() {
    register_nav_menus(array(
        'primary' => 'Primary Menu'
    ));
}
add_action('after_setup_theme', 'jamestown_setup');


// =========================
// API ROUTES
// =========================
function jamestown_register_routes() {

    // POSTS
    register_rest_route('jamestown/v1', '/posts', array(
        'methods'  => 'GET',
        'callback' => 'jamestown_get_posts'
    ));

    // PAGES
    register_rest_route('jamestown/v1', '/pages', array(
        'methods'  => 'GET',
        'callback' => 'jamestown_get_pages'
    ));

    // MENU
    register_rest_route('jamestown/v1', '/menu', array(
        'methods'  => 'GET',
        'callback' => 'jamestown_get_menu'
    ));
}
add_action('rest_api_init', 'jamestown_register_routes');


// =========================
// CALLBACKS
// =========================

function jamestown_get_posts() {
    $response = wp_remote_get(home_url('/wp-json/wp/v2/posts'));

    if (is_wp_error($response)) {
        return [];
    }

    return json_decode(wp_remote_retrieve_body($response), true);
}

function jamestown_get_pages() {
    $response = wp_remote_get(home_url('/wp-json/wp/v2/pages'));

    if (is_wp_error($response)) {
        return [];
    }

    return json_decode(wp_remote_retrieve_body($response), true);
}

function jamestown_get_menu() {
    return wp_get_nav_menu_items('primary');
}   

function jamestown_enqueue_styles() {
    wp_enqueue_style('jamestown-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'jamestown_enqueue_styles');