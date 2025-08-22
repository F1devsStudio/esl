<?php
/*
* Template Name: wishlist
* */

get_header();
?>
<section id="<?php
if ( function_exists('is_cart') && is_cart() ) {
    echo 'cart';
} elseif ( is_page('wt-webtoffee-wishlist') || is_page('wishlist') ) {
    echo 'wishlist';
}elseif ( function_exists('is_checkout') || is_checkout() ) {
    echo 'checkout';
} else {
    echo 'default';
}
?>">
    <div class="container" id="<?php
    if ( is_page('wt-webtoffee-wishlist') || is_page('wishlist') ) {
        echo 'my-wishlist-container';
    }else{
        echo 'default';
    }
    ?>">
        <?php the_content(); ?>
    </div>
</section>
<?php
get_footer();
?>
