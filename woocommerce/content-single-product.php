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

<section class="item-section py-5">
    <div class="container">
        <div class="row gx-5 align-items-stretch">
            <!-- Left Column: Carousel -->
            <div class="col-md-6">
                <div id="carouselItems" class="carousel slide mb-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $main_image_id = $product->get_image_id();
                        $gallery_image_ids = $product->get_gallery_image_ids();
                        $image_ids = array_filter(array_merge([$main_image_id], is_array($gallery_image_ids) ? $gallery_image_ids : []));
                        $image_ids = array_merge([$main_image_id], $gallery_image_ids);
                        foreach ($image_ids as $index => $image_id) :
                            $image_url = wp_get_attachment_image_url($image_id, 'large');
                            ?>
                            <div class="carousel-item <?php if ($index === 0) echo 'active'; ?>">
                                <img src="<?php echo esc_url($image_url); ?>" class="d-block w-100" alt="product-image-<?php echo $index; ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="thumb-gallery-wrapper mt-3">
                    <div class="d-flex flex-nowrap overflow-auto gap-2">
                        <?php foreach ($image_ids as $index => $image_id) :
                            $thumb_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                            ?>
                            <img src="<?php echo esc_url($thumb_url); ?>"
                                 class="img-thumbnail thumb flex-shrink-0"
                                 data-bs-target="#carouselItems" data-bs-slide-to="<?php echo esc_attr($index); ?>"
                                 alt="thumb-<?php echo esc_attr($index); ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Right Column: Item Content -->
            <div class="col-md-6 item-content">
                <div class="d-flex">
                    <h2 class="mb-4"><?php the_title(); ?></h2>
                    <a href="#" class="webtoffee_wishlist wt-wishlist-button" data-product-id="<?php echo esc_attr( $product->get_id() ); ?>" data-variation-id="0" data-quantity="1" data-act="add_to_wishlist" data-action="add_to_wishlist">
                        <i class="esl-bookmark-heart esl-reg-1 ms-2"></i>
                    </a>
                </div>
                <ul class="list-unstyled mt-md-4">
                    <li class="mb-5">
                        <p class="mb-1">Level:</p>
                        <div class="d-flex align-items-center">
                            <i class="esl-level esl-reg-1 me-2"></i>
                            <?php
                            $level = wc_get_product_terms( $product->get_id(), 'pa_level', array('fields' => 'names') );
                            if ( !empty($level) ) :?>
                                <?= esc_html( $level[0] ); ?>
                            <?php endif; ?>
                        </div>
                    </li>

                    <li class="mb-5">
                        <p class="mb-1">Time to complete the course:</p>
                        <div class="d-flex align-items-center">
                            <i class="esl-timer esl-reg-1 me-2"></i>
                            <?php
                            $time_spend = wc_get_product_terms( $product->get_id(), 'pa_time_spend', array('fields' => 'names') );
                            if ( !empty($time_spend) ) {
                                echo esc_html( $time_spend[0] );
                            }
                            ?>
                        </div>
                    </li>

                    <li class="mb-5">
                        <p class="mb-1">Price:</p>
                        <div class="d-flex align-items-center">
                            <i class="esl-lock esl-reg-1 me-2"></i>
                            <?php
                            if ( $product->get_price() == 0 ) : ?>
                                FREE
                            <?php else : ?>
                                <?= $product->get_price_html(); ?>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>

                <div class="text-center mt-4">
                    <?php if ( is_user_logged_in() ) : ?>
                        <form class="cart" method="post" enctype="multipart/form-data">
                            <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>"
                                    class="btn btn-login d-inline-flex align-items-center justify-content-center">
                                ADD TO CART
                            </button>
                        </form>
                    <?php else : ?>
                        <a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>"
                           class="btn btn-login d-inline-flex align-items-center justify-content-center">
                            <i class="esl-key esl-reg-1 me-2"></i> LOG TO GET
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


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
$content_plans = rwmb_meta( 'accordion_plans_content' );
$content_topics = rwmb_meta( 'accordion_topics_content' );

if ( $content_vocabulary || $content_activities || $content_video || $content_plans || $content_topics ) :
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

                    <?php if ( $content_video ) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    <i class="esl-youtube esl-reg-1 me-2"></i><span><?php echo esc_html( rwmb_meta( 'accordion_video_title' ) ); ?></span>
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    <?php echo wp_kses_post( $content_video ); ?>
                                </div>
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
                    <div class="wpcf7">
                        <?php echo do_shortcode('[contact-form-7 id="188236a" title="feedback"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
?>


<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

    <div class="summary entry-summary">
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



