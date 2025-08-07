<?php
/* Template Name: Woo My Account */

get_header(); ?>
<!---->
<!--<nav class="navbar navbar-expand-xl navbar-light bg-light border-top" aria-label="--><?php //esc_html_e( 'Account pages', 'woocommerce' ); ?><!--">-->
<!--    <div class="container-fluid">-->
<!--        --><?php
//        wp_nav_menu([
//            'theme_location' => 'my_account_menu',
//            'container'      => false,
//            'menu_class'     => 'navbar-nav flex-row gap-3 mx-auto',
//            'items_wrap'     => '%3$s',
//            'fallback_cb'    => false,
//            'walker'         => new F1devsesl_walker_nav_menu(),
//        ]);
//        ?>
<section class="my-account">
    <?php the_content() ?>
</section>
<?php
get_footer();
