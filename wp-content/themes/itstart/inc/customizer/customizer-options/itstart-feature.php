<?php
function itstart_feature_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Feature  Section
	=========================================*/
	$wp_customize->add_section(
		'feature_setting', array(
			'title' => esc_html__( 'Feature Section', 'itstart' ),
			'priority' => 9,
			'panel' => 'itstart_homepage_sections',
		)
	);
	
	
	// Feature content Section // 
	
	$wp_customize->add_setting(
		'feature_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'feature_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','itstart'),
			'section' => 'feature_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add feature
	 */
	
		$wp_customize->add_setting( 'feature_contents', 
			array(
			 'sanitize_callback' => 'itstart_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => themes_get_feature_default()
			)
		);
		
		$wp_customize->add_control( 
			new ItStart_Repeater( $wp_customize, 
				'feature_contents', 
					array(
						'label'   => esc_html__('Feature','itstart'),
						'section' => 'feature_setting',
						'add_field_label'                   => esc_html__( 'Add New Feature', 'itstart' ),
						'item_name'                         => esc_html__( 'Feature', 'itstart' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true
					) 
				) 
			);
			
			
		//Pro feature
		class ItStart_feature__section_upgrade extends WP_Customize_Control {
			public function render_content() {
				
			?>
				<a class="customizer_feature_upgrade_section up-to-pro" href="https://aarnathemes.com/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','itstart'); ?></a>
			<?php
				
			}
		}
		
		$wp_customize->add_setting( 'ItStart_feature_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new ItStart_feature__section_upgrade(
			$wp_customize,
			'ItStart_feature_upgrade_to_pro',
				array(
					'section'				=> 'feature_setting',
					'settings'				=> 'ItStart_feature_upgrade_to_pro',
				)
			)
		);
}

add_action( 'customize_register', 'itstart_feature_setting' );

// feature selective refresh
function itstart_home_feature_section_partials( $wp_customize ){		
	// feature content
	$wp_customize->selective_refresh->add_partial( 'feature_contents', array(
		'selector'            => '.home-feature .feature-item_inner .feature-item .feature-content h2'
	
	) );
	
	}

add_action( 'customize_register', 'itstart_home_feature_section_partials' );