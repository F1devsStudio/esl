<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment_container">

<!--		--><?php
//		/**
//		 * The woocommerce_review_before hook
//		 *
//		 * @hooked woocommerce_review_display_gravatar - 10
//		 */
//		do_action( 'woocommerce_review_before', $comment );
//		?>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
            <input type="hidden" name="action" value="submit_product_feedback">
            <input type="hidden" name="product_id" value="<?php echo esc_attr( get_the_ID() ); ?>">
            <?php wp_nonce_field('submit_product_feedback_action', 'submit_product_feedback_nonce'); ?>

            <div class="row gx-md-5">
                <div class="col-md-6 py-3">
                    <label for="first_name" class="rate">First Name *</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required>
                </div>
                <div class="col-md-6 py-3">
                    <label for="last_name" class="rate">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name">
                </div>
                <div class="col-md-6 py-3">
                    <label for="email" class="rate">Email *</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="col-md-6 py-3">
                    <label class="rate">Rate the workbook *</label>
                    <div class="py-2 rating-hearts" data-selected="0">
                        <input type="hidden" name="rating" id="ratingInput" value="0" required>
                        <p class="heart d-flex">
                            <i class="heart-icon esl-reg-2 ms-1" data-value="1"></i>
                            <i class="heart-icon esl-reg-2 ms-1" data-value="2"></i>
                            <i class="heart-icon esl-reg-2 ms-1" data-value="3"></i>
                            <i class="heart-icon esl-reg-2 ms-1" data-value="4"></i>
                            <i class="heart-icon esl-reg-2 ms-1" data-value="5"></i>
                        </p>
                    </div>
                </div>

                <div class="col-md-12 py-3">
                    <label for="comment" class="rate">What are your impressions?</label>
                    <textarea class="form-control" name="comment" id="comment"></textarea>
                </div>

                <div class="col-md-12 py-3">
                    <div class="d-flex justify-content-between align-items-center flex-wrap pos-btn">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="agree_publish" id="agreeCheck">
                            <label class="form-check-label" for="agreeCheck">I agree to publish my feedback online</label>
                        </div>
                        <div class="text-center more-padd mt-3 mt-md-0">
                            <button type="submit" class="btn btn-send px-5">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
<!--		<div class="comment-text">-->
<!---->
<!--			--><?php
//			/**
//			 * The woocommerce_review_before_comment_meta hook.
//			 *
//			 * @hooked woocommerce_review_display_rating - 10
//			 */
//			do_action( 'woocommerce_review_before_comment_meta', $comment );
//
//			/**
//			 * The woocommerce_review_meta hook.
//			 *
//			 * @hooked woocommerce_review_display_meta - 10
//			 */
//			do_action( 'woocommerce_review_meta', $comment );
//
//			do_action( 'woocommerce_review_before_comment_text', $comment );
//
//			/**
//			 * The woocommerce_review_comment_text hook
//			 *
//			 * @hooked woocommerce_review_display_comment_text - 10
//			 */
//			do_action( 'woocommerce_review_comment_text', $comment );
//
//			do_action( 'woocommerce_review_after_comment_text', $comment );
//			?>
<!---->
<!--		</div>-->
	</div>
