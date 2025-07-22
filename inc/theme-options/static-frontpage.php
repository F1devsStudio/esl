<?php

F1devsesl_Kirki::add_section( 'wp_bp_frontpage', array(
    'title'          => esc_html__( 'Static Frontpage', 'f1devs-esl' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

if( class_exists( 'Kirki' ) ) {
    function f1devsesl_move_header_bg_image( $wp_customize ) {
        $wp_customize->get_control( 'header_image' )->section = 'wp_bp_frontpage';
    }
    add_action( 'customize_register', 'f1devsesl_move_header_bg_image' );
}


F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'front_cover_title',
	'label'    => esc_html__( 'Cover Title', 'f1devs-esl' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => get_bloginfo( 'name' ),
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'front_cover_lead',
	'label'    => esc_html__( 'Cover Lead', 'f1devs-esl' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => get_bloginfo( 'description' ),
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'front_cover_btn_text',
	'label'    => esc_html__( 'Cover Button Text', 'f1devs-esl' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => '',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'front_cover_btn_link',
	'label'    => esc_html__( 'Cover Button Link', 'f1devs-esl' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => '',
) );


F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'featured_page_1',
	'label'    => esc_html__( '1st Featured Page', 'f1devs-esl' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'dropdown-pages',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'featured_page_2',
	'label'    => esc_html__( '2nd Featured Page', 'f1devs-esl' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'dropdown-pages',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'featured_page_3',
	'label'    => esc_html__( '3rd Featured Page', 'f1devs-esl' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'dropdown-pages',
) );


F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'show_main_content',
	'label'    => esc_html__( 'Show Main Content', 'f1devs-esl' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'checkbox',
    'default'  => 1
) );
