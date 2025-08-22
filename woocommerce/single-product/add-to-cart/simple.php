<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
        <div class="text-center">
<!--            --><?php //if ( is_user_logged_in() ) : ?>
                <button type="submit"
                        name="add-to-cart"
                        value="<?php echo esc_attr( $product->get_id() ); ?>"
                        class="btn btn-login d-inline-flex align-items-center justify-content-center mt-2">
                    <?php echo esc_html( $product->single_add_to_cart_text() ); ?>
                </button>
<!--            --><?php //else : ?>
<!--                <a href="--><?php //echo esc_url( wp_login_url( get_permalink() ) ); ?><!--"-->
<!--                   class="btn btn-login d-inline-flex align-items-center justify-content-center mt-2">-->
<!--                    <i class="esl-key esl-reg-1 me-2"></i> LOG TO GET-->
<!--                </a>-->
<!--            --><?php //endif; ?>
        </div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
