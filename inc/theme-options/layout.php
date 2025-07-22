<?php

F1devsesl_Kirki::add_section( 'wp_bp_layout', array(
    'title'          => esc_html__( 'Layout Settings', 'f1devs-esl' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'container_width',
	'label'    => esc_html__( 'Container Max Width (in px)', 'f1devs-esl' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'slider',
    'default'  => 1140,
	'choices'  => array(
		'min'  => '1080',
		'max'  => '1400',
		'step' => '10',
	),
    'output' => array(
		array(
			'element'  => '.container',
			'property' => 'max-width',
			'units'    => 'px',
		),
        array(
			'element'  => '.elementor-section.elementor-section-boxed>.elementor-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
) );

// Header Content Width
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'header_within_container',
	'label'    => esc_html__( 'Header Content Within Container', 'f1devs-esl' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'checkbox',
    'default'  => 0,
) );

// Sticky header
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'sticky_header',
	'label'    => esc_html__( 'Sticky Header', 'f1devs-esl' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'checkbox',
    'default'  => 0,
    'tooltip'  => esc_html__( 'Some browsers may be outdated to support this feature.', 'f1devs-esl' ),
) );

// Default Sidebar Position
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'default_sidebar_position',
	'label'    => esc_html__( 'Default Sidebar Position', 'f1devs-esl' ),
    'tooltip'  => esc_html__( 'This can be overwritten on the particular page by using a page template.', 'f1devs-esl' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'radio',
    'default'  => 'right',
    'choices'  => array(
        'right' => esc_html__( 'Right', 'f1devs-esl' ),
        'left'  => esc_html__( 'Left', 'f1devs-esl' ),
        'no'    => esc_html__( 'No Sidebar', 'f1devs-esl' ),
    )
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'hide_sidebar_on_mobile',
	'label'    => esc_html__( 'Hide Sidebar On Mobile', 'f1devs-esl' ),
	'section'  => 'wp_bp_layout',
	'type'     => 'radio',
    'default'  => 'no',
    'choices' => array(
        'no'  => esc_html__( 'No.', 'f1devs-esl' ),
        'yes'  => esc_html__( 'Yes, hide sidebar on small devices.', 'f1devs-esl' ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'default_sidebar_position',
            'operator' => '!==',
            'value'    => 'no',
        ),
    ),
) );

// Blog Display
F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings'    => 'default_blog_display',
	'label'       => esc_html__( 'Blog Display', 'f1devs-esl' ),
    'description' => esc_html__( 'Choose between a full post or an excerpt for the blog and archive pages.', 'f1devs-esl' ),
	'section'     => 'wp_bp_layout',
	'type'        => 'radio',
    'default'     => 'excerpt',
    'choices'     => array(
        'excerpt' => esc_html__( 'Post excerpt', 'f1devs-esl' ),
        'full'    => esc_html__( 'Full Post', 'f1devs-esl' ),
    )
) );
