<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
$user = wp_get_current_user();
$name = $user->first_name;
$surname = $user->last_name;
$current_avatar = get_avatar_url($user->ID, ['size' => 300]);
$email = $user->user_email;
$birthday = get_user_meta($user->ID, 'birthday', true);
$gender = get_user_meta($user->ID, 'gender', true);
$phone = get_user_meta($user->ID, 'billing_phone', true);
?>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );
?>
<div class="row">
	<div class="col-xl-3 col-lg-12 profile-container d-flex align-items-center flex-column">
        <h2 class="pt-5 custom-bold"><?php esc_html_e('Profile', 'woocommerce'); ?></h2>
        <img src="<?= $current_avatar?>" alt="profile image" class="profile-image">
        <div class="custom-bold my-3">
            <span><?= $name?> <?= $surname?></span>
        </div>
        <div class="custom-bold mb-3">
            <span><?= $email?></span>
        </div>
        <div class="special-info mb-4">
            <div>
                <span><?php esc_html_e('Birthday', 'woocommerce'); ?>  <span class="custom-bold"><?= $birthday?></span></span>
            </div>
            <div>
                <span><?php esc_html_e('Gender', 'woocommerce'); ?>  <span class="custom-bold"><?= $gender?></span></span>
            </div>
            <div>
                <span><?php esc_html_e('Phone', 'woocommerce'); ?>  <span class="custom-bold"><?= $phone?></span></span>
            </div>
        </div>
        <a class="btn btn-edit" href="<?php echo esc_url( wc_get_account_endpoint_url('edit-account') );?>"><i class="esl-edit esl-reg-1"></i>   <?php esc_html_e('Edit', 'woocommerce'); ?></a>
	</div>
	<div class="col-xl-9 dash-orders mt-xl-0 mt-4">
		<?php do_action('woocommerce_account_orders_endpoint'); ?>
	</div>
    <div class="dash-wishlist mt-4 col-xl-12">
        <?php do_action('woocommerce_account_webtoffee-wishlist_endpoint'); ?>
    </div>
</div>
<?php
	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
