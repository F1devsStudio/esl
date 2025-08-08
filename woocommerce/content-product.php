<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( 'col-md-3 py-4 cardpad', $product ); ?>>
    <div class="card workbook-card">
        <div class="card-body">
            <div class="img-container">
                <div class="overlay"></div>
                <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="card-img-top rounded-0 img-fluid" alt="<?php the_title(); ?>">
                <?php else : ?>
                    <img src="<?= wc_placeholder_img_src(); ?>" class="card-img-top rounded-0 img-fluid" alt="No image">
                <?php endif; ?>
            </div>
            <h5><?php the_title(); ?></h5>
            <ul class="list-unstyled mb-4 text-start">
                <li>
                    <i class="esl-unlock esl-reg-1 me-2"></i>
                    <?php
                    if ( $product->get_price() == 0 ) : ?>
                        FREE
                    <?php else : ?>
                        <?= $product->get_price_html(); ?>
                    <?php endif; ?>
                </li>
                <li>
                    <i class="esl-level esl-reg-1 me-2"></i>
                    <?php
                    $level = wc_get_product_terms( $product->get_id(), 'pa_level', array('fields' => 'names') );
                    if ( !empty($level) ) :?>
                        <?= esc_html( $level[0] ); ?>
                    <?php endif; ?>
                </li>
                <li>
                    <i class="esl-timer esl-reg-1 me-2"></i>
                    <?php
                    $time_spend = wc_get_product_terms( $product->get_id(), 'pa_time_spend', array('fields' => 'names') );
                    if ( !empty($time_spend) ) {
                        echo esc_html( $time_spend[0] );
                    }
                    ?>
                </li>
            </ul>
            <a href="<?php the_permalink(); ?>" class="btn btn-download w-100">Download</a>
        </div>
    </div>
</div>