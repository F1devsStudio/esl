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
            <form class="d-flex ms-3 p-4 order-2 order-xl-1">
                <div class="input-group search">
                    <span class="input-group-text ">
                        <i class="esl-search esl-reg-1"></i>
                    </span>
                    <input class="form-control" type="search" placeholder="Search">
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
                <a class="decor" href="#"><i class="esl-bookmark-heart esl-reg-2 icon ms-3"></i></a>
                <a class="decor" href="#"><i class="esl-shopping-go esl-reg-2 icon ms-3"></i></a>
                <a class="decor" href="#"><i class="esl-person esl-reg-2 icon ms-3"></i></a>
            </div>
        </div>
    </div>
</header>
