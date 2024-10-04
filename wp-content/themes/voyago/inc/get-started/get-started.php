<?php
add_action( 'admin_menu', 'voyago_getting_started' );
function voyago_getting_started() {
	add_theme_page( esc_html__('Voyago Theme', 'voyago'), esc_html__('Voyago Theme', 'voyago'), 'edit_theme_options', 'voyago-guide-page', 'voyago_test_guide');
}

// Add a Custom CSS file to WP Admin Area
function voyago_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/get-started/get-started.css');
}
add_action('admin_enqueue_scripts', 'voyago_admin_theme_style');

// Guidline for about theme
function voyago_test_guide() { 
	// Custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'voyago' );
?>
<div class="wrapper-info">
	<div class="intro">
		<div class="col-left">
			<h1 class="theme-title"><?php esc_html_e( 'Voyago WordPress Theme', 'voyago' ); ?></h1>
			<p><?php esc_html_e('Version: ','voyago'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-right text-align-end">
			<a class="bg-color bg-color" href="<?php echo esc_url( VOYAGO_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to PRO', 'voyago'); ?></a>
		</div>
	</div>
	<div class="col-left">
		<div class="started">
			<hr>
			<div class="centerbold">
				<h4><?php esc_html_e('Unlock Premium Features', 'voyago'); ?></h4>
				<p><?php esc_html_e('Unlock the full potential of your website with our Pro theme upgrade.', 'voyago'); ?></p>
				<a class="bg-color" href="<?php echo esc_url( VOYAGO_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade Now', 'voyago'); ?></a>
				<hr>
				<h4><?php esc_html_e('Preview Demo', 'voyago'); ?></h4>
				<p><?php esc_html_e('See our theme in action! Take a tour of our demo site to experience firsthand the stunning design and powerful features our theme has to offer.', 'voyago'); ?></p>
				<a class="bg-color" href="<?php echo esc_url( VOYAGO_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e('Theme Demo', 'voyago'); ?></a>
				<hr>
				<h4><?php esc_html_e('Need Help?', 'voyago'); ?></h4>
				<p><?php esc_html_e('Visit our support forum for assistance with any questions or feedback you may have regarding the theme.', 'voyago'); ?></p>
				<a href="<?php echo esc_url( VOYAGO_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'voyago'); ?></a>
				<hr>
				<h4><?php esc_html_e('Are you enjoying our theme?', 'voyago'); ?></h4>
				<p><?php esc_html_e('We\'d love to hear your thoughts! Leave us a review and share your feedback.', 'voyago'); ?></p>
				<a href="<?php echo esc_url( VOYAGO_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'voyago'); ?></a>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-inner"> 
			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		</div>
	</div>
</div>
<?php } ?>