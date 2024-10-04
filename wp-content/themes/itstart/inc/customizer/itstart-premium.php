<?php
function itstart_premium_setting( $wp_customize ) {
/*=========================================
	Premium Theme Details Page
	=========================================*/
	/*=========================================
	Page Layout Settings Section
	=========================================*/
	$wp_customize->add_section(
        'upgrade_premium',
        array(
            'title' 		=> __('Upgrade to Pro','itstart'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	Add Buttons
	=========================================*/
	
	class ItStart_WP_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'upgrade_premium';

	   function render_content() {
		?>
			<div class="premium_info">
				<ul>
					<!--<li><a class="documentation" href="#" target="_blank"><i class="dashicons dashicons-visibility"></i><?php _e( 'View Documentation','itstart' ); ?> </a></li>-->
					
					<li><a class="support" href="mailto:chaudharychetantech@gmail.com" target="_blank"><?php _e( 'Get Support','itstart' ); ?> </a></li>
					
					<!--<li><a class="free-pro" href="##pt-freevspro" target="_blank"><i class="dashicons dashicons-visibility"></i><?php _e( 'Free Vs Pro','itstart' ); ?> </a></li>-->
					
					<li><a class="upgrade-to-pro" href="https://aarnathemes.com/" target="_blank"><?php _e( 'Upgrade to Pro','itstart' ); ?> </a></li>
					
					<!--<li><a class="show-love" href="https://wordpress.org/support/theme/itstart/reviews/#new-post" target="_blank"><i class="dashicons dashicons-smiley"></i><?php _e( 'Show Some Love','itstart' ); ?> </a></li>-->
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting(
		'premium_info_buttons',
		array(
		   'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'itstart_sanitize_text',
		)	
	);
	
	$wp_customize->add_control( new ItStart_WP_Button_Customize_Control( $wp_customize, 'premium_info_buttons', array(
		'section' => 'upgrade_premium',
    ))
);
}
add_action( 'customize_register', 'itstart_premium_setting' );