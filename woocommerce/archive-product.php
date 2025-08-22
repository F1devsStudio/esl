<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header('shop');

?>

    <section class="workbook-section mb-4">
        <div class="container">
            <?php
            $shop_id = function_exists('wc_get_page_id') ? wc_get_page_id('shop') : 0;

            $title = rwmb_get_value('workbook_banner_title', [], $shop_id);
            $text = rwmb_get_value('workbook_banner_text', [], $shop_id);
            $image = rwmb_get_value('workbook_banner_image', [], $shop_id);
            $image_url = '';

            if (!empty($image) && is_array($image) && isset($image['ID'])) {
                $image_url = wp_get_attachment_image_url($image['ID'], 'full');
            }

            if ($image_url || $title || $text) :?>
                <div class="row g-0">
                    <div class="col-md-6">
                        <?php if ($image_url): ?>
                            <img src="<?php echo esc_url($image_url); ?>" class="w-100 h-auto"
                                 alt="Intro Image">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 main-text">
                        <?php if ($title): ?>
                            <h2 class="card-title pb-4">
                                <?php echo nl2br(esc_html($title)); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($text): ?>
                            <?php echo wpautop(wp_kses_post($text)); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<!--    <section id="breadcrumbs">-->
<!--        --><?php
//        /**
//         * Hook: woocommerce_before_main_content.
//         *
//         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
//         * @hooked woocommerce_breadcrumb - 20
//         * @hooked WC_Structured_Data::generate_website_data() - 30
//         */
//        do_action( 'woocommerce_before_main_content' );
//        ?>
<!--    </section>-->
    <section class="workbooks text-center ">
        <div class="container">
            <div class="input-search">
                <div class="text-center mb-4">
                    <?php
                    /**
                     * Hook: woocommerce_shop_loop_header.
                     *
                     * @since 8.6.0
                     *
                     * @hooked woocommerce_product_taxonomy_archive_header - 10
                     */
                    do_action( 'woocommerce_shop_loop_header' );
                    ?>
                </div>

                <form class="search-bar d-flex justify-content-center" id="smart-search-input">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="esl-search esl-reg-1"></i>
                        </span>
                        <input type="search" class="form-control" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="woo-sort-area">
        <div class="container">
            <?php
            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action( 'woocommerce_before_shop_loop' );
            ?>
        </div>
    </section>

<?php
if (woocommerce_product_loop()) {

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

?>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
