<?php
function itstart_sidebar_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	/*=========================================
	ItStart Sidebar
	=========================================*/
	$wp_customize->add_section(
        'itstart_blog_settings',
        array(
        	'priority'      => 3,
            'title' 		=> __('Sidebar','itstart'),
			'panel' => 'itstart_general',
		)
    );
	
	if ( class_exists( 'ItStart_Customize_Control_Radio_Image' ) ) {
		// Default pages
		$wp_customize->add_setting(
			'itstart_default_pg_layout', array(
				'sanitize_callback' => 'itstart_sanitize_select',
				'default' => 'itstart_rsb',
			)
		);

		$wp_customize->add_control(
			new ItStart_Customize_Control_Radio_Image(
				$wp_customize, 'itstart_default_pg_layout', array(
					'label'     => esc_html__( 'Default Page Layout', 'itstart' ),
					'section'   => 'itstart_blog_settings',
					'priority'  => 1,
					'choices'   => array(
						'itstart_lsb' => array(
							'url' => apply_filters( 'itstart_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'itstart_fullwidth' => array(
							'url' => apply_filters( 'itstart_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'itstart_rsb' => array(
							'url' => apply_filters( 'itstart_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		// Archive pages
		$wp_customize->add_setting(
			'archive_pg_layout', array(
				'sanitize_callback' => 'itstart_sanitize_select',
				'default' => 'itstart_rsb',
			)
		);

		$wp_customize->add_control(
			new ItStart_Customize_Control_Radio_Image(
				$wp_customize, 'archive_pg_layout', array(
					'label'     => esc_html__( 'Archive Page Layout', 'itstart' ),
					'section'   => 'itstart_blog_settings',
					'priority'  => 2,
					'choices'   => array(
						'itstart_lsb' => array(
							'url' => apply_filters( 'itstart_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'itstart_fullwidth' => array(
							'url' => apply_filters( 'itstart_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'itstart_rsb' => array(
							'url' => apply_filters( 'itstart_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Single page
		$wp_customize->add_setting(
			'blog_single_layout', array(
				'sanitize_callback' => 'itstart_sanitize_select',
				'default' => 'itstart_rsb',
			)
		);

		$wp_customize->add_control(
			new ItStart_Customize_Control_Radio_Image(
				$wp_customize, 'blog_single_layout', array(
					'label'     => esc_html__( 'Single Page Layout', 'itstart' ),
					'section'   => 'itstart_blog_settings',
					'priority'  => 3,
					'choices'   => array(
						'itstart_lsb' => array(
							'url' => apply_filters( 'itstart_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'itstart_fullwidth' => array(
							'url' => apply_filters( 'itstart_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'itstart_rsb' => array(
							'url' => apply_filters( 'itstart_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Blog page
		$wp_customize->add_setting(
			'blog_page_layout', array(
				'sanitize_callback' => 'itstart_sanitize_select',
				'default' => 'itstart_rsb',
			)
		);

		$wp_customize->add_control(
			new ItStart_Customize_Control_Radio_Image(
				$wp_customize, 'blog_page_layout', array(
					'label'     => esc_html__( 'Blog Page Layout', 'itstart' ),
					'section'   => 'itstart_blog_settings',
					'priority'  => 4,
					'choices'   => array(
						'itstart_lsb' => array(
							'url' => apply_filters( 'itstart_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'itstart_fullwidth' => array(
							'url' => apply_filters( 'itstart_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'itstart_rsb' => array(
							'url' => apply_filters( 'itstart_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Search page
		$wp_customize->add_setting(
			'search_pg_layout', array(
				'sanitize_callback' => 'itstart_sanitize_select',
				'default' => 'itstart_rsb',
			)
		);

		$wp_customize->add_control(
			new ItStart_Customize_Control_Radio_Image(
				$wp_customize, 'search_pg_layout', array(
					'label'     => esc_html__( 'Search Page Layout', 'itstart' ),
					'section'   => 'itstart_blog_settings',
					'priority'  => 5,
					'choices'   => array(
						'itstart_lsb' => array(
							'url' => apply_filters( 'itstart_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'itstart_fullwidth' => array(
							'url' => apply_filters( 'itstart_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'itstart_rsb' => array(
							'url' => apply_filters( 'itstart_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
	}
}
add_action( 'customize_register', 'itstart_sidebar_settings' );