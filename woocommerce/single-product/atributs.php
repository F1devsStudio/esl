<?php
/**
 * Template for displaying product attributes
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/attributes.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attributes = $product->get_attributes();

if ( ! empty( $attributes ) ) : ?>
<ul class="list-unstyled mt-md-4">
            <li class="mb-5">
                <p class="mb-1">Level:</p>
                <div class="d-flex align-items-center">
                    <i class="esl-level esl-reg-1 me-2"></i>
                    <?php
                    $level = wc_get_product_terms( $product->get_id(), 'pa_level', array( 'fields' => 'names' ) );
                    if ( ! empty( $level ) ) :
                        echo esc_html( $level[0] );
                    endif;
                    ?>
                </div>
            </li>

            <li class="mb-5">
                <p class="mb-1">Time to complete the course:</p>
                <div class="d-flex align-items-center">
                    <i class="esl-timer esl-reg-1 me-2"></i>
                    <?php
                    $time_spend = wc_get_product_terms( $product->get_id(), 'pa_time_spend', array( 'fields' => 'names' ) );
                    if ( ! empty( $time_spend ) ) {
                        echo esc_html( $time_spend[0] );
                    }
                    ?>
                </div>
            </li>
<?php endif; ?>
