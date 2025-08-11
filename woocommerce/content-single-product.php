<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

//defined( 'ABSPATH' ) || exit;

global $product;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<section class="item-section pb-5" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="container">
        <div class="row gx-5 align-items-stretch">
            <div class="col-md-6">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
                ?>
            </div>
            <div class="summary col-md-6 item-content">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action( 'woocommerce_single_product_summary' );
                ?>
            </div>
        </div>
    </div>
</section>


<?php do_action( 'woocommerce_after_single_product' ); ?>

<?php
$materials = rwmb_meta( 'lesson_materials_group' );

if ( ! empty( $materials ) ) : ?>
    <section class="links-container py-3">
        <div class="container materials">
            <?php foreach ( $materials as $index => $material ) : ?>
                <div class="file-item text-center mb-3 <?php echo ( $index !== array_key_last( $materials ) ) ? 'vertical-line' : ''; ?>">
                    <div class="materials-label"><?php echo esc_html( $material['title'] ); ?></div>
                    <div class="materials-part">
                        <div class="icon-part">
                            <i class="esl-pdf esl-reg-1"></i>
                        </div>
                        <div class="text-part"><?php echo esc_html( $material['format'] ); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>

<?php
$title = rwmb_meta( 'custom_section_title' );
$product_description = apply_filters( 'the_content', get_the_content() );
$content_vocabulary = rwmb_meta( 'accordion_vocabulary_content' );
$content_activities = rwmb_meta( 'accordion_activities_content' );
$content_video = rwmb_meta( 'accordion_video_content' );
$content_video_link = rwmb_meta( 'accordion_video_link' );
$content_plans = rwmb_meta( 'accordion_plans_content' );
$content_topics = rwmb_meta( 'accordion_topics_content' );


if ( $content_vocabulary || $content_activities || $content_video || $content_video_link || $content_plans || $content_topics ) :
    ?>
    <section class="get-section py-5">
        <div class="container">
            <div class="d-flex align-items-center">
                <i class="esl-mini-logo esl-reg-8"></i>
                <div class="get-info">
                    <?php if ( $title ) : ?>
                        <h2><?php echo esc_html( $title ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $product_description ) : ?>
                        <div class="woocommerce-product-description">
                            <?php echo $product_description; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="study pt-5">
                <div class="accordion accordion-flush" id="accordionFlush">

                    <?php if ( $content_vocabulary ) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <i class="esl-vacablury esl-reg-1 me-2"></i><span><?php echo esc_html( rwmb_meta( 'accordion_vocabulary_title' ) ); ?></span>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    <?php echo wp_kses_post( $content_vocabulary ); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $content_activities ) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    <i class="esl-activities esl-reg-1 me-2"></i><span><?php echo esc_html( rwmb_meta( 'accordion_activities_title' ) ); ?></span>
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    <?php echo wp_kses_post( $content_activities ); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $content_video_link || $content_video ) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    <i class="esl-youtube esl-reg-1 me-2"></i><span><?php echo esc_html( rwmb_meta( 'accordion_video_title' ) ); ?></span>
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush">
                                <?php if ( $content_video_link || $content_video ) :?>
                                    <div class="accordion-body">
                                        <?php if ( $content_video_link ) :?>
                                            <div class="ratio ratio-16x9">
                                                <?php echo wp_oembed_get( esc_url( $content_video_link ) ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ( $content_video ) :echo wp_kses_post( $content_video );endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $content_plans ) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    <i class="esl-todo-list esl-reg-1 me-2"></i><span><?php echo esc_html( rwmb_meta( 'accordion_plans_title' ) ); ?></span>
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    <?php echo wp_kses_post( $content_plans ); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $content_topics ) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                    <i class="esl-folder esl-reg-1 me-2"></i><span><?php echo esc_html( rwmb_meta( 'accordion_topics_title' ) ); ?></span>
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    <?php echo wp_kses_post( $content_topics ); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<section class="pb-5">
    <div class="container feedback-bg">
        <div class="row">
            <div class="col-12 align-items-md-center">
                <h2 class="mb-3">Leave a Feedback</h2>
                    <?php
                    /**
                     * Hook: woocommerce_after_single_product_summary.
                     *
                     * @hooked woocommerce_output_product_data_tabs - 10
                     * @hooked woocommerce_upsell_display - 15
                     * @hooked woocommerce_output_related_products - 20
                     */
                    do_action( 'woocommerce_after_single_product_summary' );
                    ?>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hearts = document.querySelectorAll(".heart-icon");
        const ratingInput = document.getElementById("ratingInput");

        hearts.forEach((heart, index) => {
            heart.addEventListener("click", function (e) {
                e.preventDefault();
                const rating = heart.getAttribute("data-value");
                ratingInput.value = rating;

                hearts.forEach((h, i) => {
                    if (i < rating) {
                        h.classList.add("active");
                    } else {
                        h.classList.remove("active");
                    }
                });
            });
            heart.addEventListener("mouseenter", function () {
                hearts.forEach((h, i) => {
                    if (i <= index) {
                        h.classList.add("active");
                    } else {
                        h.classList.remove("active");
                    }
                });
            });
            heart.addEventListener("mouseleave", function () {
                hearts.forEach((h, i) => {
                    if (parseInt(ratingInput.value) > i) {
                        h.classList.add("active");
                    } else {
                        h.classList.remove("active");
                    }
                });
            });
        });
    });
</script>

<script>
    jQuery(function($) {
        function updateCartCount() {
            fetch('<?php echo admin_url("admin-ajax.php?action=get_cart_count"); ?>')
                .then(response => response.text())
                .then(count => {
                    const cartCountEl = document.querySelector('.cart-count');
                    if (cartCountEl) {
                        cartCountEl.textContent = count;
                        if (count == 0) {
                            cartCountEl.style.display = 'none';
                        } else {
                            cartCountEl.style.display = 'inline-block';
                        }
                    }
                })
                .catch(console.error);
        }
        updateCartCount();
        $(document.body).on('added_to_cart removed_from_cart updated_wc_div updated_cart_totals', function() {
            updateCartCount();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wishlistCountEl = document.querySelector('.wishlist-count');

        function updateWishlistCount() {
            fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=get_wishlist_count')
                .then(response => response.text())
                .then(count => {
                    if (!wishlistCountEl) return;

                    count = parseInt(count);
                    if (count > 0) {
                        wishlistCountEl.textContent = count;
                        wishlistCountEl.style.display = 'inline-block';
                    } else {
                        wishlistCountEl.textContent = '';
                        wishlistCountEl.style.display = 'none';
                    }
                });
        }

        document.body.addEventListener('click', function (e) {
            if (e.target.closest('.wt-wishlist-button')) {
                setTimeout(updateWishlistCount, 1000);
            }
        });
        updateWishlistCount();
    });
</script>




