<?php
function itstart_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'itstart'),
		) 
	);
	
	/*=========================================
	ItStart Site Identity
	=========================================*/

	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','itstart'),
			'panel'  		=> 'header_section',
		)
    );

	// Logo Width // 
	if ( class_exists( 'ItStart_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'itstart_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new ItStart_Customizer_Range_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'itstart' ),
				'section'  => 'title_tagline',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
					),
			) ) 
		);
	}
	
	// Typography
	$wp_customize->add_setting(
		'logo_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'logo_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','itstart'),
			'section' => 'title_tagline',
			'priority' => 100,
		)
	);
	
	// Site Title Font Size// 
	if ( class_exists( 'ItStart_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'site_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'itstart_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new ItStart_Customizer_Range_Control( $wp_customize, 'site_ttl_size', 
			array(
				'label'      => __( 'Site Title Font Size', 'itstart' ),
				'section'  => 'title_tagline',
				'priority' => 101,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                ),
			) ) 
		);

	// Site Description Font Size// 	
		$wp_customize->add_setting(
			'site_desc_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'itstart_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new ItStart_Customizer_Range_Control( $wp_customize, 'site_desc_size', 
			array(
				'label'      => __( 'Site Description Font Size', 'itstart' ),
				'section'  => 'title_tagline',
				'priority' => 102,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                ),
			) ) 
		);
	}
	
	
	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','itstart'),
			'panel'  		=> 'header_section',
		)
    );
	
	/*=========================================
	Email
	=========================================*/
	$wp_customize->add_setting(
		'hdr_top_email'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
			'priority' => 16,
		)
	);

	$wp_customize->add_control(
	'hdr_top_email',
		array(
			'type' => 'hidden',
			'label' => __('Email','itstart'),
			'section' => 'above_header',
			
		)
	);

	$wp_customize->add_setting( 
		'hide_show_email_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_checkbox',
			'priority' => 17,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_email_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'itstart' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_email_icon',
    	array(
	        'default' => 'fa-envelope',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new ItStart_Icon_Picker_Control($wp_customize, 
		'tlh_email_icon',
		array(
		    'label'   		=> __('Icon','itstart'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);
	
	// Mobile Number // 
	$wp_customize->add_setting(
    	'tlh_email',
    	array(
	        'default'			=> __('email@example.com','itstart'),
			'sanitize_callback' => 'itstart_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 18,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email',
		array(
		    'label'   		=> __('Email Address','itstart'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	/*=========================================
	Address
	=========================================*/
	$wp_customize->add_setting(
		'hdr_top_address'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
			'priority' => 16,
		)
	);

	$wp_customize->add_control(
	'hdr_top_address',
		array(
			'type' => 'hidden',
			'label' => __('Address','itstart'),
			'section' => 'above_header',
			
		)
	);

	$wp_customize->add_setting( 
		'hide_show_cntct_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_checkbox',
			'priority' => 17,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cntct_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'itstart' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_contct_icon',
    	array(
	        'default' => 'fa-map-marker-alt',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new ItStart_Icon_Picker_Control($wp_customize, 
		'tlh_contct_icon',
		array(
		    'label'   		=> __('Icon','itstart'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);
	
	// Address // 
	$wp_customize->add_setting(
    	'tlh_contact_address',
    	array(
	        'default'			=> __('25 N Grant Street, Laxington','itstart'),
			'sanitize_callback' => 'itstart_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 18,
		)
	);	

	$wp_customize->add_control( 
		'tlh_contact_address',
		array(
		    'label'   		=> __('Address','itstart'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Button Label // 
	$wp_customize->add_setting(
    	'tlh_btn_lbl',
    	array(
	        'default'			=> __('Buy Now','itstart'),
			'sanitize_callback' => 'itstart_sanitize_text',
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 5,
		)
	);	

	$wp_customize->add_control( 
		'tlh_btn_lbl',
		array(
		    'label'   		=> __('Button Label','itstart'),
		    'section' 		=> 'above_header',
			'type'		 	=>	'text'
		)  
	);
	
	// Button Link // 
	$wp_customize->add_setting(
    	'tlh_btn_link',
    	array(
	        'default'			=> '#',
			'sanitize_callback' => 'itstart_sanitize_text',
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 5,
		)
	);	

	$wp_customize->add_control( 
		'tlh_btn_link',
		array(
		    'label'   		=> __('Button Link','itstart'),
		    'section' 		=> 'above_header',
			'type'		 	=>	'text'
		)  
	);
	
	
	$wp_customize->add_setting(
		'hdr_social_icon'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
			'priority' => 16,
		)
	);

	$wp_customize->add_control(
	'hdr_social_icon',
		array(
			'type' => 'hidden',
			'label' => __('Social Icon','itstart'),
			'section' => 'above_header',
			
		)
	);
	
	$wp_customize->add_setting( 
		'hide_show_social_icon' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_checkbox',
			'priority' => 17,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_social_icon', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'itstart' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	/**
	 * Customizer Repeater
	 */
	$wp_customize->add_setting( 'social_icons', 
		array(
			'sanitize_callback' => 'itstart_repeater_sanitize',
			'priority' => 18,
			'default' => themes_get_social_icon_default()
		)
	);
	
	$wp_customize->add_control( 
	new ItStart_Repeater( $wp_customize, 
		'social_icons', 
			array(
				'label'   => esc_html__('Icons','itstart'),
				'section' => 'above_header',
				'customizer_repeater_icon_control' => true,
				'customizer_repeater_link_control' => true,
			) 
		) 
	);
	
	
	//Pro feature
		class ItStart_social_icons__section_upgrade extends WP_Customize_Control {
			public function render_content() {
				
			?>
				<a class="customizer_social_icons_upgrade_section up-to-pro" href="https://aarnathemes.com/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','itstart'); ?></a>
			<?php
				
			}
		}
		
		$wp_customize->add_setting( 'ItStart_social_icons_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new ItStart_social_icons__section_upgrade(
			$wp_customize,
			'ItStart_social_icons_upgrade_to_pro',
				array(
					'section'				=> 'above_header',
					'settings'				=> 'ItStart_social_icons_upgrade_to_pro',
				)
			)
		);
	

	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Navigation','itstart'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Search
	$wp_customize->add_setting(
		'hdr_nav_search'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_search',
		array(
			'type' => 'hidden',
			'label' => __('Search','itstart'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'itstart' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','itstart'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','itstart'),
			'section' => 'sticky_header_set',
		)
	);

	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'itstart' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'itstart_header_settings' );

// Header selective refresh
function itstart_header_partials( $wp_customize ){
	
	// hide_show_nav_btn
	$wp_customize->selective_refresh->add_partial(
		'hide_show_nav_btn', array(
			'selector' => '.navigator',
			'container_inclusive' => true,
			'render_callback' => 'header_navigation',
			'fallback_refresh' => true,
		)
	);
	
	// tlh_email_icon
	$wp_customize->selective_refresh->add_partial( 'tlh_email_icon', array(
		'selector'            => '.header-main .topbar .widget-header .widget-contact .contact-info.email .contact-icon i',
		'settings'            => 'tlh_email_icon',
		'render_callback'  => 'itstart_tlh_email_icon_render_callback',
	) );
	
	// tlh_email
	$wp_customize->selective_refresh->add_partial( 'tlh_email', array(
		'selector'            => '.header-main .topbar .widget-header .widget-contact .contact-info.email .contact-info a',
		'settings'            => 'tlh_email',
		'render_callback'  => 'itstart_tlh_email_render_callback',
	) );
	
	
	// tlh_contct_icon
	$wp_customize->selective_refresh->add_partial( 'tlh_contct_icon', array(
		'selector'            => '.header-main .topbar .widget-header .widget-contact .contact-info.contact .contact-icon i',
		'settings'            => 'tlh_contct_icon',
		'render_callback'  => 'itstart_tlh_contct_icon_render_callback',
	) );
	
	// tlh_contact_address
	$wp_customize->selective_refresh->add_partial( 'tlh_contact_address', array(
		'selector'            => '.header-main .topbar .widget-header .widget-contact .contact-info.contact .contact-info a',
		'settings'            => 'tlh_contact_address',
		'render_callback'  => 'itstart_tlh_contact_address_render_callback',
	) );
	
	// tlh_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'tlh_btn_lbl', array(
		'selector'            => '.menubar_bg .right-menu ul li a.btn_main',
		'settings'            => 'tlh_btn_lbl',
		'render_callback'  => 'itstart_tlh_btn_lbl_render_callback',
	) );
	
	// social_icons
	$wp_customize->selective_refresh->add_partial( 'social_icons', array(
		'selector'            => '.header-main .topbar .widget-header .widget-social i',
		'settings'            => 'social_icons',
		'render_callback'  => 'themes_social_icons_render_callback',
	) );
	}

add_action( 'customize_register', 'itstart_header_partials' );


// tlh_email_icon
function itstart_tlh_email_icon_render_callback() {
	return get_theme_mod( 'tlh_email_icon' );
}

// tlh_email
function itstart_tlh_email_render_callback() {
	return get_theme_mod( 'tlh_email' );
}

// tlh_contct_icon
function itstart_tlh_tlh_contct_icon_render_callback() {
	return get_theme_mod( 'tlh_contct_icon' );
}

// tlh_contact_address
function itstart_tlh_contact_address_render_callback() {
	return get_theme_mod( 'tlh_contact_address' );
}

// tlh_btn_lbl
function itstart_tlh_btn_lbl_render_callback() {
	return get_theme_mod( 'tlh_btn_lbl' );
}