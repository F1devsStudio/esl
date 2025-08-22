<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>
<div class="container mb-4" id="login-register">
    <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

    <div class="row" id="customer_login">

    	<div class="col-md-6 mb-4 mb-md-0">

    <?php endif; ?>


            <form class="woocommerce-form login" method="post" novalidate>
                <h2 class="h4 mb-4"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

                <?php do_action( 'woocommerce_login_form_start' ); ?>

                <div class="mb-3">
                    <label for="username" class="form-label">
                        <?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>
                        <span class="text-danger" aria-hidden="true">*</span>
                        <span class="visually-hidden"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span>
                    </label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) && is_string( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true"/>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <?php esc_html_e( 'Password', 'woocommerce' ); ?>
                        <span class="text-danger" aria-hidden="true">*</span>
                        <span class="visually-hidden"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span>
                    </label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="current-password" required aria-required="true"
                    />
                </div>

                <?php do_action( 'woocommerce_login_form' ); ?>

                <div class="d-flex align-items-center justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                        <label class="form-check-label" for="rememberme">
                            <?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
                        </label>
                    </div>

                    <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

                    <button type="submit" class="btn btn-primary woocommerce-button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">
                        <?php esc_html_e( 'Log in', 'woocommerce' ); ?>
                    </button>
                </div>
                <div class="mt-3 mb-0">
                    <a class="link-secondary" href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
                        <?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?>
                    </a>
                </div>

                <?php do_action( 'woocommerce_login_form_end' ); ?>
            </form>

    <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

    	</div>

    	<div class="col-md-6">

            <form method="post" class="woocommerce-form register" <?php do_action( 'woocommerce_register_form_tag' ); ?>>
                <h2 class="h4 mb-4"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

                <?php do_action( 'woocommerce_register_form_start' ); ?>

                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                    <div class="mb-3">
                        <label for="reg_username" class="form-label">
                            <?php esc_html_e( 'Username', 'woocommerce' ); ?>
                            <span class="text-danger" aria-hidden="true">*</span>
                            <span class="visually-hidden"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span>
                        </label>
                        <input type="text" class="form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true">
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="reg_email" class="form-label">
                        <?php esc_html_e( 'Email address', 'woocommerce' ); ?>
                        <span class="text-danger" aria-hidden="true">*</span>
                        <span class="visually-hidden"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span>
                    </label>
                    <input type="email" class="form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true">
                </div>

                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                    <div class="mb-3">
                        <label for="reg_password" class="form-label">
                            <?php esc_html_e( 'Password', 'woocommerce' ); ?>
                            <span class="text-danger" aria-hidden="true">*</span>
                            <span class="visually-hidden"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span>
                        </label>
                        <input type="password" class="form-control" name="password" id="reg_password" autocomplete="new-password" required aria-required="true">
                    </div>
                <?php else : ?>
                    <p class="mb-3"><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>
                <?php endif; ?>

                <?php do_action( 'woocommerce_register_form' ); ?>

                <div class="d-flex align-items-center justify-content-end">
                    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                    <button type="submit" class="btn btn-primary woocommerce-Button woocommerce-button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                </div>

                <?php do_action( 'woocommerce_register_form_end' ); ?>
            </form>

    	</div>

    </div>
    <?php endif; ?>
</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
