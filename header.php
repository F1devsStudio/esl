<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package F1devsesl
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="navbar navbar-expand-xl py-3" id="navbar-header">
    <div class="container">

        <button class="navbar-toggler collapsed ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-open"><i class="esl-burger esl-reg-1"></i></span>
            <span class="icon-close"><i class="esl-close esl-reg-1"></i></span>
        </button>

        <div class="collapse navbar-collapse navjust" id="navMenu">
            <a class="navbar-brand d-flex gap-2" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo-yellow.png" alt="Connected Logo" height="100" class="logo-img">
            </a>
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" id="smart-search-input" class="d-flex ms-3 p-4 order-2 order-xl-1">
                <div class="input-group search">
                    <span class="input-group-text">
                        <i class="esl-search esl-reg-1"></i>
                    </span>
                    <input class="form-control" type="search" name="s" placeholder="Search" autocomplete="off">
                    <input type="hidden" name="post_type" value="product">
                </div>
            </form>
            <nav class="d-flex gap-3 flex-xl-row flex-column mt-3 mt-xl-0 order-3 order-xl-2">
                <?php
                wp_nav_menu([
                    'theme_location' => 'header_menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => '__return_false',
                    'walker'         => new F1devsesl_walker_nav_menu(),
                ]);
                ?>
            </nav>
            <div class="order-1 order-xl-3">
                <?php
                if ( class_exists( 'WT_Webtoffee_Wishlist' ) ) {
                    $wishlist = WT_Webtoffee_Wishlist::get_instance();
                    $items = $wishlist->get_wishlist_items();
                    $wishlist_count = is_array($items) ? count($items) : 0;
                } else {
                    $wishlist_count = 0;
                }
                ?>

                <a class="decor position-relative" href="<?php echo esc_url( home_url('/wt-webtoffee-wishlist') ); ?>">
                    <i class="esl-bookmark-heart esl-reg-2 icon ms-3"></i>
                    <span class="wishlist-count"<?php if ($wishlist_count == 0) echo ' style="display:none;"'; ?>>
        <?php echo esc_html( $wishlist_count ); ?>
    </span>
                </a>
                <?php
                $cart_url   = wc_get_cart_url();
                $cart_count = WC()->cart->get_cart_contents_count();
                ?>
                <a class="decor position-relative" href="<?php echo esc_url( $cart_url ); ?>">
                    <i class="esl-shopping-go esl-reg-2 icon ms-3"></i>
                    <?php if ($cart_count > 0): ?>
                        <span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
                    <?php else: ?>
                        <span class="cart-count" style="display:none;"></span>
                    <?php endif; ?>
                </a>
                <a class="decor" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                    <i class="esl-person esl-reg-2 icon ms-3"></i>
                </a>
            </div>
        </div>
    </div>
</header>
