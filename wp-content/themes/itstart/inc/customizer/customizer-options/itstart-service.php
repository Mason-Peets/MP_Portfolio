<?php
function itstart_service_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Service  Section
	=========================================*/
	$wp_customize->add_section(
		'service_setting', array(
			'title' => esc_html__( 'Service Section', 'itstart' ),
			'priority' => 3,
			'panel' => 'itstart_homepage_sections',
		)
	);

	// Service Section // 
	$wp_customize->add_setting(
		'service_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'service_headings',
		array(
			'type' => 'hidden',
			'label' => __('Services','itstart'),
			'section' => 'service_setting',
		)
	);
	
	// Service Title // 
	$wp_customize->add_setting(
    	'service_title',
    	array(
	        'default'			=> __('Mind Blowing Service','itstart'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'service_title',
		array(
		    'label'   => __('Title','itstart'),
		    'section' => 'service_setting',
			'type'           => 'text',
		)  
	);
	
	// Service Subtitle // 
	$wp_customize->add_setting(
    	'service_subtitle',
    	array(
	        'default'			=> __('Our Service','itstart'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'service_subtitle',
		array(
		    'label'   => __('Subtitle','itstart'),
		    'section' => 'service_setting',
			'type'           => 'text',
		)  
	);
	// Service content Section // 
	
	$wp_customize->add_setting(
		'service_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'service_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','itstart'),
			'section' => 'service_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add service
	 */
	
		$wp_customize->add_setting( 'service_contents', 
			array(
			 'sanitize_callback' => 'itstart_repeater_sanitize',
			 'priority' => 8,
			 'default' => themes_get_service_default()
			)
		);
		
		$wp_customize->add_control( 
			new ItStart_Repeater( $wp_customize, 
				'service_contents', 
					array(
						'label'   => esc_html__('Service','itstart'),
						'section' => 'service_setting',
						'add_field_label'                   => esc_html__( 'Add New Service', 'itstart' ),
						'item_name'                         => esc_html__( 'Service', 'itstart' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
			
		//Pro feature
		class ItStart_service__section_upgrade extends WP_Customize_Control {
			public function render_content() {
				
			?>
				<a class="customizer_service_upgrade_section up-to-pro" href="#" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','itstart'); ?></a>
			<?php
				
			}
		}
		
		$wp_customize->add_setting( 'ItStart_service_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new ItStart_service__section_upgrade(
			$wp_customize,
			'ItStart_service_upgrade_to_pro',
				array(
					'section'				=> 'service_setting',
					'settings'				=> 'ItStart_service_upgrade_to_pro',
				)
			)
		);
}

add_action( 'customize_register', 'itstart_service_setting' );

// service selective refresh
function itstart_home_service_section_partials( $wp_customize ){	
	// service title
	$wp_customize->selective_refresh->add_partial( 'service_title', array(
		'selector'            => '.service-home .section-title p span',
		'settings'            => 'service_title',
		'render_callback'  	  => 'itstart_service_title_render_callback',
	) );
	
	// service subtitle
	$wp_customize->selective_refresh->add_partial( 'service_subtitle', array(
		'selector'            => '.service-home .section-title .section-heading',
		'settings'            => 'service_subtitle',
		'render_callback'     => 'itstart_service_subtitle_render_callback',
	) );
	// service content
	$wp_customize->selective_refresh->add_partial( 'service_contents', array(
		'selector'            => '.service-home .service .service-content h2'
	) );
}

add_action( 'customize_register', 'itstart_home_service_section_partials' );

// service title
function itstart_service_title_render_callback() {
	return get_theme_mod( 'service_title' );
}

// service subtitle
function itstart_service_subtitle_render_callback() {
	return get_theme_mod( 'service_subtitle' );
}