<?php

F1devsesl_Kirki::add_section( 'blog_home', array(
    'title'          => esc_html__( 'Blog Homepage', 'f1devs-esl' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'blog_home_title_1',
	'section'  => 'blog_home',
	'type'     => 'custom',
    'default'  => '<h2 class="wp-bp-region-title first-region-title">' . esc_html__( 'Cover Section', 'f1devs-esl' ) . '</h2>',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'blog_display_cover_section',
	'label'    => esc_html__( 'Display Cover Section', 'f1devs-esl' ),
	'section'  => 'blog_home',
	'type'     => 'checkbox',
    'default'  => 1,
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings'          => 'blog_cover_title',
	'label'             => esc_html__( 'Cover Title', 'f1devs-esl' ),
	'section'           => 'blog_home',
	'type'              => 'text',
    'sanitize_callback' => 'wp_kses_post',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings'          => 'blog_cover_lead',
	'label'             => esc_html__( 'Cover Lead Text', 'f1devs-esl' ),
	'section'           => 'blog_home',
	'type'              => 'text',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings'          => 'blog_cover_btn_text',
	'label'             => esc_html__( 'Cover Button Text', 'f1devs-esl' ),
	'section'           => 'blog_home',
	'type'              => 'text',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings'          => 'blog_cover_btn_link',
	'label'             => esc_html__( 'Cover Button Link', 'f1devs-esl' ),
	'section'           => 'blog_home',
	'type'              => 'text',
) );


F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'blog_home_title_2',
	'section'  => 'blog_home',
	'type'     => 'custom',
    'default'  => '<h2 class="wp-bp-region-title">' . esc_html__( 'Featured Posts Slider', 'f1devs-esl' ) . '</h2>',
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'blog_display_posts_slider',
	'label'    => esc_html__( 'Display Posts Slider', 'f1devs-esl' ),
	'section'  => 'blog_home',
	'type'     => 'checkbox',
    'default'  => 1,
) );

F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
	'settings' => 'featured_count',
	'label'    => esc_html__( 'Number of Posts In Slider', 'f1devs-esl' ),
	'section'  => 'blog_home',
	'type'     => 'number',
    'default'  => '5',
    'choices'  => array(
		'min'  => 1,
		'max'  => 10,
		'step' => 1,
	),
) );

if( class_exists( 'Kirki_Helper' ) ) {
    F1devsesl_Kirki::add_field( 'f1devsesl_theme', array(
    	'settings'    => 'featured_ids',
    	'label'       => esc_html__( 'Select Posts', 'f1devs-esl' ),
    	'section'     => 'blog_home',
    	'type'        => 'select',
        'multiple'    => 10,
        'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 100, 'post_type' => 'post' ) ),
    ) );
}
