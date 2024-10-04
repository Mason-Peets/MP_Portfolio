<?php
function itstart_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Blog  Section
	=========================================*/
	$wp_customize->add_section(
		'blog_setting', array(
			'title' => esc_html__( 'Blog Section', 'itstart' ),
			'priority' => 10,
			'panel' => 'itstart_homepage_sections',
		)
	);

	// Blog Header Section // 
	$wp_customize->add_setting(
		'blog_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'blog_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','itstart'),
			'section' => 'blog_setting',
		)
	);
	
	// Blog Title // 
	$wp_customize->add_setting(
    	'blog_title',
    	array(
	        'default'			=> __('What People Writes','itstart'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_title',
		array(
		    'label'   => __('Title','itstart'),
		    'section' => 'blog_setting',
			'type'           => 'text',
		)  
	);
	
	// Blog Subtitle // 
	$wp_customize->add_setting(
    	'blog_subtitle',
    	array(
	        'default'			=> __('Outstanding Blog','itstart'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_subtitle',
		array(
		    'label'   => __('Subtitle','itstart'),
		    'section' => 'blog_setting',
			'type'           => 'text',
		)  
	);
}

add_action( 'customize_register', 'itstart_blog_setting' );

// blog selective refresh
function itstart_home_blog_section_partials( $wp_customize ){	
	// blog title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.post-home .section-title p span',
		'settings'            => 'blog_title',
		'render_callback'  => 'itstart_blog_title_render_callback',	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.post-home .section-title .section-heading',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'itstart_blog_subtitle_render_callback',	
	) );
	
	
	
	}

add_action( 'customize_register', 'itstart_home_blog_section_partials' );

// blog title
function itstart_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function itstart_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}