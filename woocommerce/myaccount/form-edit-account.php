<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook - woocommerce_before_edit_account_form.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_before_edit_account_form' );
wc_print_notices();
?>
<?php
    $user_id = get_current_user_id();
    $birthday = get_user_meta($user_id, 'birthday', true);
    $gender = get_user_meta($user_id, 'gender', true);
    $tel = get_user_meta($user_id, 'billing_phone', true);
    $current_avatar = get_avatar_url($user_id, ['size' => 150]);
    $default_avatar = get_avatar_url(0, ['size' => 150]);
?>

<form class="woocommerce-EditAccountForm edit-account" action="" enctype="multipart/form-data" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

    <input type="hidden" name="account_display_name" value="<?php echo esc_attr( $user->display_name ?: trim($user->first_name . ' ' . $user->last_name) ); ?>">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
    <div class="row" id="account-form">
        <div class="col-md-4 d-flex flex-column align-items-center avatar-custom">
            <div class="avatar-preview mb-3">
                <img id="js-av-preview" src="<?php echo esc_url($current_avatar); ?>" alt="Avatar">
            </div>
            <div class="d-flex gap-2 edit-only">
                <button type="button" class="btn btn-add" id="js-av-add"><i class="esl-add esl-reg-1"></i>Add</button>
                <button type="button" class="btn btn-delete" id="js-av-remove"><i class="esl-delete esl-reg-1"></i>Delete</button>
            </div>
            <input class="d-none" type="file" name="avatar_upload" id="js-av-file" accept="image/*">
            <input type="hidden" name="avatar_remove" id="js-av-remove-value" value="0">
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="account_first_name" class="text-muted form-label"><?php esc_html_e( 'Name', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
                    <input type="text" class="form-control edit-field" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" aria-required="true" />
                    <div class="form-view-value d-none">
                        <?php echo esc_html($user->first_name); ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="account_last_name" class="text-muted form-label"><?php esc_html_e( 'Surname', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
                    <input type="text" class="form-control edit-field" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" aria-required="true" />
                    <div class="form-view-value d-none">
                        <?php echo esc_html($user->last_name); ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="birthday" class="text-muted form-label"><?php esc_html_e( 'Birthday', 'woocommerce' ); ?></label>
                    <input type="date" class="form-control edit-field" name="account_birthday" id="birthday" autocomplete="family-name" value="<?php echo esc_attr( $birthday ); ?>" aria-required="true" />
                    <div class="form-view-value d-none">
                        <?php echo esc_html($birthday); ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="gender" class="text-muted form-label"><?php esc_html_e( 'Gender', 'woocommerce' ); ?></label>
                    <select name="account_gender" id="gender" class="form-select">
                        <option value="female" <?php selected($gender, 'female'); ?>>female</option>
                        <option value="male" <?php selected($gender, 'male'); ?>>male</option>
                        <option value="other" <?php selected($gender, 'other'); ?>>other</option>
                    </select>
                    <div class="form-view-value d-none">
                        <?php
                        if ($gender === 'female') {
                            echo esc_html__( 'Female', 'woocommerce' );
                        } elseif ($gender === 'male') {
                            echo esc_html__( 'Male', 'woocommerce' );
                        } elseif ($gender === 'other') {
                            echo esc_html__( 'Other', 'woocommerce' );
                        }
                        ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="tel" class="text-muted form-label"><?php esc_html_e( 'Phone', 'woocommerce' ); ?></label>
                    <input type="tel" class="form-control edit-field" name="account_tel" id="tel" value="<?php echo esc_attr( $tel ); ?>" aria-required="true" />
                    <div class="form-view-value d-none">
                        <?php echo esc_html($tel); ?>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="email" class="text-muted form-label"><?php esc_html_e( 'Email', 'woocommerce' ); ?></label>
                    <input type="email" class="form-control edit-field" name="account_email" id="tel" value="<?php echo esc_attr( $user->user_email ); ?>" aria-required="true" />
                    <div class="form-view-value d-none">
                        <?php echo esc_html($user->user_email); ?>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button type="button" class="btn btn-edit" id="js-edit-toggle"><i class="esl-edit esl-reg-1"></i><?php esc_html_e('Edit', 'woocommerce'); ?></button>
                <button type="submit" class="btn btn-add d-none" id="js-save-toggle" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">
                    <i class="esl-edit esl-reg-1"></i>
                    <?php esc_html_e( 'Save', 'woocommerce' ); ?>
                </button>
                <input type="hidden" name="action" value="save_account_details" />
                <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
            </div>
        </div>
    </div>
	<?php
		/**
		 * Hook where additional fields should be rendered.
		 *
		 * @since 8.7.0
		 */
		do_action( 'woocommerce_edit_account_form_fields' );
	?>
	<?php
		/**
		 * My Account edit account form.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_edit_account_form' );
	?>
	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addBtn = document.getElementById('js-av-add');
        const removeBtn = document.getElementById('js-av-remove');
        const fileInput = document.getElementById('js-av-file');
        const preview = document.getElementById('js-av-preview');
        const defaultImg = '<?php echo esc_js($default_avatar); ?>';
        const removeValue = document.getElementById('js-av-remove-value');

        if (addBtn && fileInput && preview && removeBtn) {
            addBtn.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                if (fileInput.files && fileInput.files[0]) {
                    const reader = new FileReader();
                    reader.addEventListener('load', function(e) {
                        preview.src = e.target.result;
                    });
                    reader.readAsDataURL(fileInput.files[0]);
                    removeValue.value = 0;
                }
            });

            removeBtn.addEventListener('click', function() {
                fileInput.value = '';
                preview.src = defaultImg;
                removeValue.value = 1;
            });

            fileInput.addEventListener('click', function() {
                fileInput.value = '';
            });
        }
        let isEdit = false;
        if (localStorage.getItem('editAccountMode') === 'edit') {
            isEdit = true;
        }
        if (document.querySelector('.alert.alert-danger')) {
            isEdit = true;
            localStorage.setItem('editAccountMode', 'edit');
        }else if(localStorage.getItem('editAccountMode') === 'send'){
            isEdit = false;
            localStorage.removeItem('editAccountMode');
        }
        function setViewMode(edit) {
            document.querySelectorAll('.edit-account .edit-field, .edit-account select, .edit-account .edit-only').forEach(el => {
                el.classList.toggle('d-none', !edit);
            });
            document.querySelectorAll('.edit-account .form-view-value').forEach(el => {
                el.classList.toggle('d-none', edit);
            });
            document.getElementById('js-edit-toggle').classList.toggle('d-none', edit);
            document.getElementById('js-save-toggle').classList.toggle('d-none', !edit);
            localStorage.setItem('editAccountMode', edit ? 'edit' : 'view');
        }
        document.getElementById('js-edit-toggle').addEventListener('click', function() {
            setViewMode(true);
        });
        document.getElementById('js-save-toggle').addEventListener('click', function() {
            localStorage.setItem('editAccountMode', 'send');
        });
        setViewMode(isEdit);
    });
</script>
