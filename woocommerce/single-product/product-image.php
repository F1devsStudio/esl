<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

use Automattic\WooCommerce\Enums\ProductType;

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
    'woocommerce_single_product_image_gallery_classes',
    array(
        'woocommerce-product-gallery',
        'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
        'woocommerce-product-gallery--columns-' . absint( $columns ),
        'images',
    )
);
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
    <div class="woocommerce-product-gallery__wrapper">
        <div id="carouselItems" class="carousel slide mb-3" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                global $product;
                $main_image_id = $product->get_image_id();
                $main_image_url = wp_get_attachment_image_url( $main_image_id, 'full' );

                if ( $main_image_url ) {
                    echo '<div class="carousel-item active">
                        <img src="' . esc_url( $main_image_url ) . '" class="d-block w-100" alt="photo-main" id="main-image">
                    </div>';
                }

                $attachment_ids = $product->get_gallery_image_ids();
                if ( $attachment_ids ) {
                    foreach ( $attachment_ids as $key => $attachment_id ) {
                        $image_url = wp_get_attachment_image_url( $attachment_id, 'full' );
                        echo '<div class="carousel-item">
                            <img src="' . esc_url( $image_url ) . '" class="d-block w-100" alt="photo-' . ( $key + 1 ) . '">
                        </div>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="d-flex gap-2 flex-wrap justify-content-between">
            <?php
            $all_images = array_merge( array( $main_image_id ), $attachment_ids );

            if ( $all_images ) {
                foreach ( $all_images as $key => $image_id ) {
                    $image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
                    echo '<img src="' . esc_url( $image_url ) . '" class="img-thumbnail thumb" data-bs-target="#carouselItems" data-bs-slide-to="' . $key . '" alt="thumb-' . $key . '" data-image="' . esc_url( $image_url ) . '">';
                }
            }
            ?>
        </div>
    </div>
</div>


