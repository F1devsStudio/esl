<?php
/**
 * F1devs esl functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package F1devsesl
 */

if ( ! function_exists( 'f1devsesl_setup' ) ) :
	function f1devsesl_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'f1devs-esl', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Enable Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'status', 'quote', 'link' ) );

		// Enable support for woocommerce.
		add_theme_support( 'woocommerce' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'f1devs-esl' ),
            'header_menu' => esc_html__( 'Header Menu', 'f1devs-esl' ),
            'header_icons'   => esc_html__( 'Header Icons Menu', 'f1devs-esl' ),
		) );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'f1devsesl_custom_background_args', array(
			'default-color' => 'f8f9fa',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'f1devsesl_setup' );

function custom_endpoint_content() {

    global $wpdb;
    $table_name = $wpdb->prefix . 'wt_wishlists';
    $user = get_current_user_id();
    if(is_user_logged_in()){
        $products = $wpdb->get_results("SELECT * FROM `$table_name` where `user_id` = '$user'", ARRAY_A);
    }else{
        $table_name = $wpdb->prefix . 'wt_guest_wishlists';
        $session_id = WC()->session->get('sessionid');
        $products = $wpdb->get_results("SELECT * FROM `$table_name` where `session_id` = '$session_id'", ARRAY_A);
    }
    $custom_page = get_template_directory() . '/woocommerce/myaccount/wishlist-account-view-frontend.php';
    if ( file_exists($custom_page) ) {
        require_once($custom_page);
    }
}

add_action('init', function (){
    add_rewrite_endpoint( 'webtoffee-wishlist', EP_ROOT | EP_PAGES );
    remove_action('woocommerce_account_webtoffee-wishlist_endpoint' , 'Wishlist_Account_View::endpoint_content');
    add_action('woocommerce_account_webtoffee-wishlist_endpoint', 'custom_endpoint_content');
});

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function f1devsesl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'f1devsesl_content_width', 800 );
}
add_action( 'after_setup_theme', 'f1devsesl_content_width', 0 );




/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function f1devsesl_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'f1devs-esl' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget border-bottom %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'f1devs-esl' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'f1devs-esl' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'f1devs-esl' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'f1devs-esl' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'f1devsesl_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function f1devsesl_scripts() {
    wp_enqueue_style( 'bootstrap-5', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), 'v5.2.3', 'all' );
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css', array(), '1.10.5', 'all');
    wp_enqueue_style( 'f1devs-esl-style', get_template_directory_uri() . '/assets/css/style.css', array('bootstrap-5'), '1.0.0', 'all' );
    wp_enqueue_style( 'f1devs-esl-style-icons', get_template_directory_uri() . '/assets/css/esl-icon.css', array('bootstrap-5'), '1.0.0', 'all' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array('jquery'), 'v3.6.0', true );
    wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/assets/js/jquery.viewportchecker.min.js', array(), 'v1.0.0', true );

    wp_enqueue_style( 'f1devs-esl-style', get_stylesheet_uri(), array(), '1.0.2', 'all' );

    wp_enqueue_script( 'bootstrap-5-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), 'v5.0.0', true );
    wp_enqueue_script( 'js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), 'v1.0.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'f1devsesl_scripts' );


/**
 * Registers an editor stylesheet for the theme.
 */
function f1devsesl_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'f1devsesl_add_editor_styles' );


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Implement the Custom Comment feature.
require get_template_directory() . '/inc/custom-comment.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom Navbar
require get_template_directory() . '/inc/custom-navbar.php';

// Customizer additions.
require get_template_directory() . '/inc/tgmpa/tgmpa-init.php';

// Use Kirki for customizer API
require get_template_directory() . '/inc/theme-options/add-settings.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load WooCommerce compatibility file.
//if ( class_exists( 'WooCommerce' ) ) {
//	require get_template_directory() . '/inc/woocommerce.php';
//}

/**
 * WooCommerce
 */

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    //unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}

/**
 * Enqueue your own stylesheet
 */
function wp_enqueue_woocommerce_style(){
    wp_register_style( 'general-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
    wp_register_style( 'layout-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce-layout.css' );


    if ( class_exists( 'woocommerce' ) ) {
        wp_enqueue_style( 'general-woocommerce');
        wp_enqueue_style( 'layout-woocommerce' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style');


//
//-------Delete downloads li from my-account menu
function custom_my_account_menu_items( $items ) {
    unset($items['downloads']);
    unset($items['edit-address']);
    unset($items['customer-logout']);

    $new_items = array();

    $new_items['dashboard'] = __('Main', 'woocommerce');
    $new_items['edit-account'] = __('Profile', 'woocommerce');
    $new_items['webtoffee-wishlist'] = __('Wish list', 'woocommerce');
    $new_items['orders'] = __('Orders', 'woocommerce');

    return $new_items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );

//-------Limit to one item per basket

//add_filter( 'woocommerce_add_cart_item_data', 'single_item_add_to_cart' );


// icons for my-account menu
function custom_wc_account_menu_icons() {
    return array(
        'dashboard'          => 'esl-home esl-reg-1',
        'orders'             => 'esl-order esl-reg-1',
        'edit-account'       => 'esl-profile esl-reg-1',
        'webtoffee-wishlist' => 'esl-bookmark-heart esl-reg-1'
    );
}

function my_account_custom_fields_validation( $errors, $user ) {
    if (!empty($_FILES['avatar_upload']['name']) && $_FILES['avatar_upload']['error'] == UPLOAD_ERR_OK){
        $file = $_FILES['avatar_upload'];
        $max_size = 2 * 1024 * 1024;
        if ($file['size'] > $max_size) {
            $errors->add('avatar_upload_size', __('Avatar is too large (max 2 MB).', 'esl'));
        }
    }
    if (!empty( $_POST['account_birthday'])){
        $birthday = sanitize_text_field( $_POST['account_birthday'] );
        $d = DateTime::createFromFormat( 'Y-m-d', $birthday );
        if (!$d || $d->format('Y-m-d') !== $birthday || strtotime($birthday) > time()){
            $errors->add( 'account_birthday', __( 'Please enter a valid birthday.', 'esl' ) );
        }
    }
    if (!empty( $_POST['account_gender'] ) ) {
        $gender = sanitize_text_field( $_POST['account_gender'] );
        $genders_access = array( 'male', 'female', 'other' );
        if ( ! in_array( $gender, $genders_access, true ) ) {
            $errors->add( 'account_gender', __( 'Please select a valid gender.', 'esl' ) );
        }
    }
    if (!empty( $_POST['account_tel'])){
        $tel = sanitize_text_field( $_POST['account_tel'] );
        if ( strlen($tel) < 6 ) {
            $errors->add( 'account_tel', __( 'Please enter a valid phone number.', 'esl' ) );
        }
    }
}
add_action( 'woocommerce_save_account_details_errors', 'my_account_custom_fields_validation', 10, 2 );



function my_custom_save_account_fields( $user_id ){
    if (wc_notice_count( 'error' ) > 0){
        return;
    }
    $user_id = get_current_user_id();
    $upload_dir = wp_get_upload_dir();
    $target_dir = $upload_dir['basedir'] . '/avatars/';
    if (!file_exists($target_dir)) {
        wp_mkdir_p($target_dir);
    }

    if (isset($_POST['avatar_remove']) && $_POST['avatar_remove'] == '1') {
        $old_data = get_user_meta($user_id, 'simple_local_avatar', true);
        if (!empty($old_data['file_path']) && file_exists($old_data['file_path'])) {
            @unlink($old_data['file_path']);
        }
        delete_user_meta($user_id, 'simple_local_avatar');
    } elseif (!empty($_FILES['avatar_upload']['name']) && $_FILES['avatar_upload']['error'] == UPLOAD_ERR_OK) {
        $old_data = get_user_meta($user_id, 'simple_local_avatar', true);
        if (!empty($old_data['file_path']) && file_exists($old_data['file_path'])) {
            @unlink($old_data['file_path']);
        }

        $ext = strtolower(pathinfo($_FILES['avatar_upload']['name'], PATHINFO_EXTENSION));
        $filename = time() . '-' . wp_generate_password(8, false) . '.' . $ext;
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($_FILES['avatar_upload']['tmp_name'], $target_file)) {
            $avatar_url = $upload_dir['baseurl'] . '/avatars/' . $filename;
            update_user_meta(
                $user_id,
                'simple_local_avatar',
                [
                    'full'      => $avatar_url,
                    'file_path' => $target_file,
                ]
            );
        }
    }
    if (isset( $_POST['account_birthday'])){
        $birthday = sanitize_text_field( $_POST['account_birthday'] );
        update_user_meta( $user_id, 'birthday', $birthday );
    }
    if (isset( $_POST['account_gender'])){
        $gender = sanitize_text_field( $_POST['account_gender'] );
        update_user_meta( $user_id, 'gender', $gender );
    }
    if (isset( $_POST['account_tel'])){
        $tel = sanitize_text_field( $_POST['account_tel'] );
        update_user_meta( $user_id, 'billing_phone', $tel );
    }
}
add_action( 'woocommerce_save_account_details', 'my_custom_save_account_fields', 20 );
//require get_template_directory() . '/inc/about-metabox.php';

add_filter( 'rwmb_meta_boxes', 'register_about_first_metabox' );
function register_about_first_metabox( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Banner',
        'id'         => 'about_banner_section',
        'post_types' => ['page'],
        'include'    => [
            'template' => ['about.php'],
        ],
        'fields'     => [
            [
                'id'   => 'about_banner_image',
                'name' => 'Image',
                'type' => 'single_image',
                'max_file_uploads' => 1,
            ],
            [
                'id'   => 'about_banner_title',
                'name' => 'Title',
                'type' => 'textarea',
            ],
            [
                'id'   => 'about_banner_text',
                'name' => 'Text',
                'type' => 'wysiwyg',
                'raw'  => false,
            ],
        ],
    ];
    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'register_about_story_metabox' );

function register_about_story_metabox( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Our Story',
        'id'         => 'our_story_section',
        'post_types' => ['page'],
        'include'    => [
            'template' => ['about.php'],
        ],
        'fields'     => [
            [
                'id'   => 'our_story_title',
                'name' => 'Section title',
                'type' => 'text',
            ],
            [
                'id'   => 'our_story_text',
                'name' => 'Description text',
                'type' => 'wysiwyg',
            ],
            [
                'type' => 'heading',
                'name' => 'Card Info',
            ],
            [
                'id'   => 'card_info_items',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'collapsible' => true,
                'group_title' => ['field' => 'our_story_name', 'template' => 'Card {{our_story_name}}'],
                'fields' => [
                    [
                        'id'   => 'our_story_image',
                        'name' => 'Card image',
                        'type' => 'single_image',
                        'max_file_uploads' => 1,
                    ],
                    [
                        'id'   => 'our_story_position',
                        'name' => 'Card position title',
                        'type' => 'text',
                    ],
                    [
                        'id'   => 'our_story_name',
                        'name' => 'Card Name',
                        'type' => 'text',
                    ],
                    [
                        'id'   => 'our_story_social_icon',
                        'name' => 'Social icon',
                        'type' => 'single_image',
                        'max_file_uploads' => 1,
                    ],
                    [
                        'id'   => 'our_story_social',
                        'name' => 'Social URL',
                        'type' => 'url',
                    ],
                ],
            ],
            [
                'type' => 'heading',
                'name' => 'Our Mission Section',
            ],
            [
                'id'   => 'mission_title',
                'name' => 'Mission title',
                'type' => 'text',
            ],
            [
                'id'   => 'mission_text',
                'name' => 'Mission text',
                'type' => 'wysiwyg',
            ],

            [
                'type' => 'heading',
                'name' => 'Experience Section',
            ],
            [
                'id'   => 'experience_title',
                'name' => 'Experience title',
                'type' => 'text',
            ],
            [
                'id'   => 'experience_text',
                'name' => 'Experience text',
                'type' => 'wysiwyg',
            ],

            [
                'type' => 'heading',
                'name' => 'What We Offer',
            ],
            [
                'id'   => 'offer_title',
                'name' => 'Offer title',
                'type' => 'text',
            ],
            [
                'id'     => 'offer_items',
                'type'   => 'group',
                'clone'  => true,
                'sort_clone' => true,
                'collapsible' => true,
                'group_title' => ['field' => 'offer_number', 'template' => 'Offer {{offer_number}}'],
                'fields' => [
                    [
                        'id'   => 'offer_number',
                        'name' => 'Number',
                        'type' => 'text',
                    ],
                    [
                        'id'   => 'offer_title',
                        'name' => 'Title',
                        'type' => 'text',
                    ],
                    [
                        'id'   => 'offer_text',
                        'name' => 'Description',
                        'type' => 'textarea',
                    ],
                    [
                        'id'   => 'offer_align_right',
                        'name' => 'Right position',
                        'type' => 'checkbox',
                    ],
                ],
            ],

            [
                'type' => 'heading',
                'name' => 'Join us',
            ],
            [
                'id'   => 'join_title',
                'name' => 'Section title',
                'type' => 'text',
            ],
            [
                'id'   => 'join_text',
                'name' => 'Description text',
                'type' => 'wysiwyg',
            ],
            [
                'id'   => 'join_button_text',
                'name' => 'Button text',
                'type' => 'text',
            ],
            [
                'id'   => 'join_button_url',
                'name' => 'Button Page',
                'type' => 'post',
                'post_type' => 'page',
                'field_type' => 'select',
                'placeholder' => 'Выберите страницу',
            ],
            [
                'id'   => 'join_final_text',
                'name' => 'Final message',
                'type' => 'textarea',
            ],
        ],
    ];

    return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'f1dev_materials_fields' );

function f1dev_materials_fields( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Lesson Materials',
        'id'         => 'lesson_materials',
        'post_types' => ['product'],
        'fields'     => [
            [
                'id'     => 'lesson_materials_group',
                'type'   => 'group',
                'clone'  => true,
                'sort_clone' => true,
                'collapsible' => true,
                'group_title' => ['field' => 'title'],
                'fields' => [
                    [
                        'name' => 'Title',
                        'id'   => 'title',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'Format',
                        'id'   => 'format',
                        'type' => 'text',
                    ],
                ],
            ],
        ],
    ];

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'custom_accordion_meta_boxes');

function custom_accordion_meta_boxes($meta_boxes) {
    $meta_boxes[] = [
        'title'      => 'Section "Whats you get"',
        'id'         => 'product_accordion_data',
        'post_types' => ['product'],
        'context'    => 'normal',
        'priority'   => 'high',
        'fields'     => [
            [
                'id'   => 'custom_section_title',
                'type' => 'text',
                'name' => 'Title',
            ],

            // Vocabulary
            [
                'type' => 'heading',
                'name' => 'Vocabulary',
            ],
            [
                'id'   => 'accordion_vocabulary_title',
                'type' => 'text',
                'name' => 'Title',
            ],
            [
                'id'   => 'accordion_vocabulary_content',
                'type' => 'wysiwyg',
                'name' => 'Description',
            ],

            // Activities
            [
                'type' => 'heading',
                'name' => 'Activities',
            ],
            [
                'id'   => 'accordion_activities_title',
                'type' => 'text',
                'name' => 'Title',
            ],
            [
                'id'   => 'accordion_activities_content',
                'type' => 'wysiwyg',
                'name' => 'Description',
            ],

            // Video Lessons
            [
                'type' => 'heading',
                'name' => 'Video lessons',
            ],
            [
                'id'   => 'accordion_video_title',
                'type' => 'text',
                'name' => 'Title',
            ],
            [
                'id'   => 'accordion_video_content',
                'type' => 'wysiwyg',
                'name' => 'Description',
            ],
            [
                'id'   => 'accordion_video_link',
                'type' => 'URL',
                'name' => 'Video link',
            ],

            // Lesson Plans
            [
                'type' => 'heading',
                'name' => 'Lesson plans',
            ],
            [
                'id'   => 'accordion_plans_title',
                'type' => 'text',
                'name' => 'Title',
            ],
            [
                'id'   => 'accordion_plans_content',
                'type' => 'wysiwyg',
                'name' => 'Description',
            ],

            // Lesson Topics
            [
                'type' => 'heading',
                'name' => 'Lesson topics',
            ],
            [
                'id'   => 'accordion_topics_title',
                'type' => 'text',
                'name' => 'Title',
            ],
            [
                'id'   => 'accordion_topics_content',
                'type' => 'wysiwyg',
                'name' => 'Description',
            ],
        ],
    ];

    return $meta_boxes;
}

add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');

function get_cart_count() {
    if ( function_exists( 'WC' ) && WC()->cart ) {
        echo WC()->cart->get_cart_contents_count();
    } else {
        echo 0;
    }
    wp_die();
}

add_action('admin_post_nopriv_submit_product_feedback', 'handle_custom_product_feedback');
add_action('admin_post_submit_product_feedback', 'handle_custom_product_feedback');

function handle_custom_product_feedback() {
    if (
        !isset($_POST['submit_product_feedback_nonce']) ||
        !wp_verify_nonce($_POST['submit_product_feedback_nonce'], 'submit_product_feedback_action')
    ) {
        wp_die('Security check failed');
    }

    if (
        empty($_POST['first_name']) ||
        empty($_POST['email']) ||
        empty($_POST['product_id']) ||
        empty($_POST['rating']) || intval($_POST['rating']) < 1
    ) {
        wp_safe_redirect(add_query_arg('review_submitted', 'false', wp_get_referer()));
        exit;
    }

    $product_id  = intval($_POST['product_id']);
    $first_name  = sanitize_text_field($_POST['first_name']);
    $last_name   = sanitize_text_field($_POST['last_name']);
    $email       = sanitize_email($_POST['email']);
    $rating      = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $comment     = sanitize_textarea_field($_POST['comment']);
    $full_name   = trim($first_name . ' ' . $last_name);
    $agree       = isset($_POST['agree_publish']) ? 1 : 0;

    $commentdata = array(
        'comment_post_ID'      => $product_id,
        'comment_author'       => $full_name,
        'comment_author_email' => $email,
        'comment_content'      => $comment,
        'comment_type'         => 'review',
        'comment_approved'     => 0,
    );

    $comment_id = wp_insert_comment($commentdata);

    if ($comment_id) {
        update_comment_meta($comment_id, 'agreed_to_publish', $agree);
        if ($rating > 0) {
            update_comment_meta($comment_id, 'rating', $rating);
        }
    }

    wp_safe_redirect(add_query_arg('review_submitted', 'true', wp_get_referer()));
    exit;
}

add_action('after_setup_theme', 'reorder_product_summery');
function reorder_product_summery(){
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title',      5  );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating',    10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price',     10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',   20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta',      40 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing',   50 );
}


add_action( 'woocommerce_single_product_summary', 'add_new_product_summary_elements', 30 );

function add_new_product_summary_elements() {
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 1 );
    //add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 2 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 60 );
    //add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 4 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 80 );
    //add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6 );
    //add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 7 );
}


add_action( 'woocommerce_single_product_summary', function() {
    do_action( 'product_attributes_after' );
}, 35 );


function custom_after_attributes_output() {
    echo '<p class="custom-after-attributes">';
    require get_template_directory() . '/woocommerce/single-product/atributs.php';
    echo '</p>';
}
add_action( 'product_attributes_after', 'custom_after_attributes_output' );

add_action('after_setup_theme', 'woocommerce_after_single_product_summary');
function woocommerce_after_single_product_summary(){
    //remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs',    10 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display',     15 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',   20 );
}

add_filter( 'woocommerce_product_tabs', '__return_empty_array' );
remove_action( 'woocommerce_review_form', 'woocommerce_review_form', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'comments_template', 50 );
add_action( 'woocommerce_after_single_product_summary', 'custom_show_review_form', 15 );

function custom_show_review_form() {
    wc_get_template( '/single-product/review.php' );
}

add_action('wp_footer', function () {
    if (is_product()) {
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var hearts = document.querySelectorAll('.single_product_div');
                if (hearts.length > 1) {
                    hearts[0].classList.add('original-heart');
                }
            });
        </script>
        <style>
            .original-heart {
                display: none !important;
            }
        </style>
        <?php
    }
});


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title_custom', 5 );
function woocommerce_template_single_title_custom() {
    $wishlist = new WT_Wishlist_Singlepage();

    echo '<div class="d-flex justify-content-between align-items-center mb-4">';
    echo '<h1 class="mb-4">' . get_the_title() . '</h1>';
    $wishlist->render_webtoffee_wishlist_button();
    echo '</div>';
}



add_filter( 'rwmb_meta_boxes', 'register_workbooks_baner_metabox' );
function register_workbooks_baner_metabox( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Banner workbook',
        'id'         => 'workbook_banner_section',
        'post_types' => ['page'],
        'include'    => [
            'template' => ['workbooks.php'],
        ],
        'fields'     => [
            [
                'id'   => 'workbook_banner_image',
                'name' => 'Image',
                'type' => 'single_image',
                'max_file_uploads' => 1,
            ],
            [
                'id'   => 'workbook_banner_title',
                'name' => 'Title',
                'type' => 'textarea',
            ],
            [
                'id'   => 'workbook_banner_text',
                'name' => 'Text',
                'type' => 'wysiwyg',
                'raw'  => false,
            ],
        ],
    ];
    return $meta_boxes;
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'custom_woocommerce_breadcrumb_container', 20 );

function custom_woocommerce_breadcrumb_container() {
    echo '<div class="container">';
    woocommerce_breadcrumb();
    echo '</div>';
}

remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );

add_action( 'woocommerce_before_single_product', 'custom_woocommerce_notices_inside_container', 10 );

function custom_woocommerce_notices_inside_container() {
    $notices = wc_get_notices();
    if ( empty( $notices ) ) {
        return;
    }
    echo '<div class="container">';
    wc_print_notices();
    echo '</div>';
}

add_action( 'wp_ajax_get_cart_count', 'ajax_get_cart_count' );
add_action( 'wp_ajax_nopriv_get_cart_count', 'ajax_get_cart_count' );

function ajax_get_cart_count() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
}

add_action('wp_footer', function () {
    if (!is_product()) return;
    ?>
        <div id="wishlist-toast" class="wishlist-toast"></div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.body.addEventListener('click', function (e) {
                    const target = e.target.closest('.wt-wishlist-button');
                    if (target) {
                        const toast = document.getElementById('wishlist-toast');
                        if (!toast) return;

                        if (target.dataset.action === 'add') {
                            toast.textContent = 'The item successfully added';
                        } else if (target.dataset.action === 'remove') {
                            toast.textContent = 'The item successfully removed';
                        } else {
                            return;
                        }

                        toast.classList.add('show');
                        setTimeout(() => {
                            toast.classList.remove('show');
                        }, 3000);
                    }
                });
            });
        </script>
        <?php
});


add_action('wp_ajax_get_wishlist_count', 'custom_get_wishlist_count');
add_action('wp_ajax_nopriv_get_wishlist_count', 'custom_get_wishlist_count');

function custom_get_wishlist_count() {
    global $wt_wishlist;

    $count = 0;
    if ( isset( $wt_wishlist ) && is_object( $wt_wishlist ) ) {
        $items = $wt_wishlist->get_wishlist_items();
        $count = is_array($items) ? count($items) : 0;
    }

    echo $count;
    wp_die();
}





//filter for showing columns in orders table

add_filter('woocommerce_account_orders_columns', function($columns){

    $my_columns = [];

    $my_columns['order-picture'] = __( 'Product', 'f1dev-esl' );
    $my_columns['order-name'] = __( 'Name', 'f1dev-esl' );
    $my_columns['order-num-date'] = __('Order/Date', 'f1dev-esl');
    $my_columns['order-total']   = $columns['order-total'];
    $my_columns['order-status']  = $columns['order-status'];
    $my_columns['order-actions'] = $columns['order-actions'];
    return $my_columns;
},20);

//actions to add new columns to orders table

add_action('woocommerce_my_account_my_orders_column_order-picture', function($order){
    $items = $order->get_items();
    $first_item = reset( $items );
    $product = wc_get_product($first_item->get_product_id());
    $image_id  = $product->get_image_id();
    $image_url = wp_get_attachment_image_url( $image_id, 'full' );
    echo '<img src="'. $image_url .'">';
//    echo $product->get_image('thumbnail');
});

add_action('woocommerce_my_account_my_orders_column_order-name', function($order){
    $items = $order->get_items();
    $product_names = [];
    foreach ($items as $item) {
        $prod = wc_get_product($item->get_product_id());
        if ($prod) {
            $product_names[] = $prod->get_name();
        }
    }
    $title_attr = implode(', ', $product_names);
    $first_item = reset($items );
    $product = wc_get_product($first_item->get_product_id());
    echo '<span title="' . esc_attr($title_attr) . '">' . esc_html($product->get_name()) . '</span>';
});

add_action('woocommerce_my_account_my_orders_column_order-num-date', function($order){
    printf('<div>№ %s</div><div>%s</div>', esc_html($order->get_order_number()), esc_html(wc_format_datetime($order->get_date_created(), 'd.m.Y')));
});