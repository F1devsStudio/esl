<?php


function enqueue_swiper() {
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.css');

    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper');
