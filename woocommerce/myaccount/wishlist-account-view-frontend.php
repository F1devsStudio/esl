<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
global $wt_wishlist_table_settings_options;
$wishlist_text = apply_filters('wishlist_table_heading','Wish list');
?>
<?php global $wp?>
<?php if (isset($wp->query_vars['webtoffee-wishlist'])): ?>
    <h2><?php esc_html_e($wishlist_text, 'wt-woocommerce-wishlist'); ?></h2>
<?php else: ?>
    <div class="d-flex flex-between align-items-center justify-content-between">
        <h2><?php esc_html_e($wishlist_text, 'wt-woocommerce-wishlist'); ?></h2>
        <a class="redirect-link" href="<?php echo esc_url( wc_get_account_endpoint_url('webtoffee-wishlist') );?>">See all  <i class="esl-arrow-right esl-reg"></i></a>
    </div>
<?php endif;?>
<?php if ($products) { ?>
    <form action="">
        <table class="wt_frontend_wishlist_table" >
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
            </colgroup>
            <tr class="wishlist-header d-none d-lg-table-row">
                <th></th>
                <th><?php esc_html_e('Product name', 'wt-woocommerce-wishlist'); ?></th>
                <?php if(isset($wt_wishlist_table_settings_options['wt_enable_unit_price_column'])==1){ ?> <th><?php esc_html_e('Price', 'wt-woocommerce-wishlist'); ?></th> <?php } ?>
                <?php if(isset($wt_wishlist_table_settings_options['wt_enable_wishlisted_date_column']) && $wt_wishlist_table_settings_options['wt_enable_wishlisted_date_column'] ==1){ ?> <th><?php esc_html_e('Added on', 'wt-woocommerce-wishlist'); ?></th> <?php } ?>
                <?php if(isset($wt_wishlist_table_settings_options['wt_enable_add_to_cart_option_column'])==1){ ?> <th></th> <?php } ?>
            </tr>
            <?php
            foreach ($products as $product) {
                $product_data = wc_get_product($product['product_id']);
                if ($product_data) {
                    ?>
                    <tr class="wishlist-product">
                        <td><?php
                            if($product_data->is_type( 'variable' )){
                                if($product['variation_id'] !=0){
                                    $product_data = wc_get_product($product['variation_id']);
                                }
                            }
                            $image_id  = $product_data->get_image_id();
                            $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                            echo '<img src="'. $image_url .'">';
                            ?>
                        </td>
                        <td> <a href="<?php echo esc_url( $product_data->get_permalink() ); ?>"><?php esc_html_e( $product_data->get_title() );  ?></a>
                            <?php 
                            if( (isset($wt_wishlist_table_settings_options['wt_enable_product_variation_column'])==1) && $product_data->is_type( 'variation' ) ){ 
                              echo wc_get_formatted_variation( $product_data );
                            }
                            ?>  
                        </td>
                        <?php if(isset($wt_wishlist_table_settings_options['wt_enable_unit_price_column'])==1){ ?>
                        <td>
                            <?php 
                            $base_price = $product_data->is_type( 'variable' ) ? $product_data->get_variation_regular_price( 'max' ) : $product_data->get_price();
                            echo $product_data->get_price_html() ?>
                       </td>
                        <?php } ?>
                        <?php if(isset($wt_wishlist_table_settings_options['wt_enable_wishlisted_date_column']) && $wt_wishlist_table_settings_options['wt_enable_wishlisted_date_column'] ==1){ ?>
                            <td>
                                <?php
                                echo !empty($product['date'])
                                    ? esc_html( date_i18n('d.m.Y', strtotime($product['date'])) )
                                    : '';
                                ?>
                            </td>
                        <?php } ?>
                        <?php if(isset($wt_wishlist_table_settings_options['wt_enable_add_to_cart_option_column'])==1){ 
                            $id = ($product_data->is_type( 'variation' )) ? $product['variation_id'] : $product['product_id'] ;
                            $redirect_to_cart = isset($wt_wishlist_table_settings_options['redirect_to_cart']) ? $wt_wishlist_table_settings_options['redirect_to_cart'] : '';
                        ?>  
                        <td class="wishlist-actions">
                            <button  class="button single-add-to-cart" data-product_id="<?php esc_attr_e($id); ?>" data-redirect_to_cart="<?php esc_attr_e($redirect_to_cart); ?>"> <?php ( ! empty($wt_wishlist_table_settings_options['wt_add_to_cart_text']) ? esc_html_e($wt_wishlist_table_settings_options['wt_add_to_cart_text'], 'wt-woocommerce-wishlist')  :  esc_html_e('Add to cart', 'wt-woocommerce-wishlist') ); ?></button>
                        </td>
                        <?php } ?>
                    </tr>
                <?php
                }
            }
            ?>
        </table>
    </form>
<?php } else { ?>
<h3 style="text-align: center"><?php esc_html_e('No Wishlists yet!', 'wt-woocommerce-wishlist'); ?></h3>
<?php } ?>

<?php 

/**
 * 
 * @since 2.0.8
 * 
 * Compatability with in Twenty-Twenty-Two & Twenty-Twenty-Three Themes
 * 
 */

if(strstr(wp_get_theme()->get('Name'),'Twenty Twenty-Two') || strstr(wp_get_theme()->get('Name'),'Twenty Twenty-Three')  )
{
    
    if(is_cart())
    {
        ?>

        <style>
            .woocommerce .quantity input[type=number] { width: 5em !important;  }

        </style>
        <?php
    }
    ?>

    <style>
        .wt_frontend_wishlist_table td{  padding: 10px; }
        .wt_frontend_wishlist_table { padding: 10px; }

    </style>

    <?php

} 

?>

