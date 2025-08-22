<?php

require get_template_directory() . '/inc/theme-options/class-theme-kirki.php';

F1devsesl_Kirki::add_config( 'f1devsesl_theme', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

F1devsesl_Kirki::add_panel( 'theme_options', array(
    'priority'    => 31,
    'title'       => esc_html__( 'Theme Options', 'f1devs-esl' ),
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'logo_height',
	'label'    => esc_html__( 'Logo Height (in px)', 'f1devs-esl' ),
	'section'  => 'title_tagline',
	'type'     => 'number',
	'priority' => 8,
	'default'  => 60,
    'tooltip'  => esc_html__( 'Minimum height 25px & maximum height 200px. Width will be adjusted automatically.', 'f1devs-esl' ),
    'choices'  => array(
		'min'  => 25,
		'max'  => 200,
		'step' => 1,
	),
    'output'   => array(
        array(
			'element'  => '.custom-logo',
			'property' => 'height',
			'units'    => 'px',
		),
        array(
			'element'       => '.custom-logo',
			'property'      => 'width',
            'value_pattern' => 'auto',
		)
    )
) );

// Add settings
//include( get_template_directory() . '/inc/theme-options/theme-colors.php' );
//include( get_template_directory() . '/inc/theme-options/typography.php' );
//include( get_template_directory() . '/inc/theme-options/layout.php' );
//include( get_template_directory() . '/inc/theme-options/static-frontpage.php' );
//include( get_template_directory() . '/inc/theme-options/blog-home.php' );


// Section Contacts
F1devsesl_Kirki::add_section( 'contact_section', array(
    'title'       => esc_html__( 'Contacts', 'f1devs-esl' ),
    'priority'    => 150,
) );

// Field: adress
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'contact_address',
    'label'    => esc_html__( 'Adress', 'f1devs-esl' ),
    'section'  => 'contact_section',
    'default'  => 'USA, California',
) );

// Field: phone
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'contact_phone',
    'label'    => esc_html__( 'Phone', 'f1devs-esl' ),
    'section'  => 'contact_section',
    'default'  => '+1 (123) 456-7890',
) );

// Field: email
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'contact_email',
    'label'    => esc_html__( 'Email', 'f1devs-esl' ),
    'section'  => 'contact_section',
    'default'  => 'contact@connected.com',
) );

// Field: email
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'contact_message',
    'label'    => esc_html__( 'Second title', 'f1devs-esl' ),
    'section'  => 'contact_section',
    'default'  => 'Live Us a message!',
) );

// Footer
F1devsesl_Kirki::add_section( 'footer_section', array(
    'title'       => esc_html__( 'Footer', 'f1devs-esl' ),
    'priority'    => 160,
) );

// Field: title bold
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'footer_title_bold',
    'label'    => esc_html__( 'Title bold', 'f1devs-esl' ),
    'section'  => 'footer_section',
    'default'  => 'LET`S STAY CONNECT',
) );

// Field: title
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'footer_title',
    'label'    => esc_html__( 'Title', 'f1devs-esl' ),
    'section'  => 'footer_section',
    'default'  => 'ED',
) );

// Field: title bold sign
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'footer_title_sign',
    'label'    => esc_html__( 'Title sign', 'f1devs-esl' ),
    'section'  => 'footer_section',
    'default'  => '!',
) );

// Field: text
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'footer_text',
    'label'    => esc_html__( 'Sub text', 'f1devs-esl' ),
    'section'  => 'footer_section',
    'default'  => 'Contact us to share your feedback, ask questions and suggest topics for new workbooks!
                We appreciate your ideas and engagement.',
) );

// Field: subtitle bold
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'footer_bold_subtitle',
    'label'    => esc_html__( 'Subtitle bold', 'f1devs-esl' ),
    'section'  => 'footer_section',
    'default'  => 'We`re CONNECT',
) );

// Field: subtitle text
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'footer_subtitle',
    'label'    => esc_html__( 'Subtitle', 'f1devs-esl' ),
    'section'  => 'footer_section',
    'default'  => 'ED',
) );

// Field: Subtitle sign bold
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    'type'     => 'text',
    'settings' => 'footer_subtitle_sign',
    'label'    => esc_html__( 'Subtitle sign', 'f1devs-esl' ),
    'section'  => 'footer_section',
    'default'  => '!',
) );



//
//F1devsesl_Kirki::add_section( 'upgrade_theme', array(
//    'title'          => esc_html__( 'Get More Features', 'f1devs-esl' ),
//    'panel'          => '',
//    'capability'     => 'edit_theme_options',
//    'theme_supports' => '',
//	'priority'		 => 500
//) );
//
//F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
//	'settings' => 'pro_features',
//	'section'  => 'upgrade_theme',
//	'type'     => 'custom',
//    'default'  => '<h2 class="wp-bp-region-title first-region-title">' . esc_html__( 'Upgrade To Pro', 'f1devs-esl' ) . '</h2>
//					<p>Let\'s make your website even better with the pro version of this theme.</p>
//					<a class="button button-primary button-hero" href="https://bootstrap-wp.com/downloads/f1devs-esl-pro/" target="_blank">Read More</a>',
//) );

//section: product settings
F1devsesl_Kirki::add_section('product_settings', array(
    'title'       => esc_html__('Product Settings', 'f1devs-esl'),
    'priority'    => 200,
));
//field: products per category on home slider
F1devsesl_Kirki::add_field('f1devsesl_theme', array(
    'settings' => 'products_per_category_slider',
    'label'    => esc_html__('Products to show on Home slider', 'f1devs-esl'),
    'section'  => 'product_settings',
    'type'     => 'number',
    'default'  => 6,
    'tooltip'  => esc_html__('type count of products', 'f1devs-esl'),
    'choices'  => array(
        'min'  => 1,
        'max'  => 100,
        'step' => 1,
    ),
));
//field: products per category
F1devsesl_Kirki::add_field('f1devsesl_theme', array(
    'settings' => 'products_per_category',
    'label'    => esc_html__('Products to show in the category', 'f1devs-esl'),
    'section'  => 'product_settings',
    'type'     => 'number',
    'default'  => 12,
    'tooltip'  => esc_html__('type count of products', 'f1devs-esl'),
    'choices'  => array(
        'min'  => 1,
        'max'  => 100,
        'step' => 1,
    ),
));


/**
* Styling Customizer
*/
function f1devsesl_customizer_css()
{
	if( class_exists( 'Kirki' ) ) {
		wp_enqueue_style( 'f1devs-esl-customizer-css', get_template_directory_uri() . '/inc/theme-options/customizer.css' );
	}
}
add_action( 'customize_controls_print_styles', 'f1devsesl_customizer_css' );
