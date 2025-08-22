<?php


function enqueue_swiper() {
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.css');

    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper');
//do all products x1 sold only
add_filter('woocommerce_is_sold_individually', function(){
    return true;
}, 10, 2);

add_filter( 'woocommerce_checkout_fields', function( $fields ) {

    unset( $fields['billing']['billing_country'] );
    unset( $fields['billing']['billing_address_1'] );
    unset( $fields['billing']['billing_address_2'] );
    unset( $fields['billing']['billing_city'] );
    unset( $fields['billing']['billing_state'] );
    unset( $fields['billing']['billing_postcode'] );

    return $fields;
}, 20 );