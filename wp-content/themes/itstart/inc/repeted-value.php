<?php

/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package itstart
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function itstart_body_classes($classes)
{
	// Adds a class of group-blog to blogs with more than 1 published author.
	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Get wide_boxed theme mod with a default value of 'boxed'.
	$wide_boxed = get_theme_mod('wide_boxed', 'wide');

	$classes[] = esc_attr($wide_boxed);

	// Get header type theme mod with a default value of 'header-1'.
	$itstart_header_type = get_theme_mod('itstart_header_type', 'header-1');
	$classes[] = esc_attr($itstart_header_type);

	// Return modified classes.
	return $classes;
}
add_filter('body_class', 'itstart_body_classes');

if (!function_exists('wp_body_open')) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
}

if (!function_exists('themes_str_replace_assoc')) {

	/**
	 * themes_str_replace_assoc
	 * @param  array $replace
	 * @param  array $subject
	 * @return array
	 */
	function themes_str_replace_assoc(array $replace, $subject)
	{
		return str_replace(array_keys($replace), array_values($replace), $subject);
	}
}

// Comments Counts
if (!function_exists('theme_comment_count')) :
	function theme_comment_count()
	{
		$itstart_comments_count 	= get_comments_number();
		if (0 === intval($itstart_comments_count)) {
			echo esc_html__('0 Comment', 'itstart');
		} else {
			/* translators: %s Comment number */
			echo sprintf(_n('%s Comment', '%s Comments', $itstart_comments_count, 'itstart'), number_format_i18n($itstart_comments_count));
		}
	}
endif;

/**
 * Display Sidebars
 */
if (!function_exists('themes_get_sidebars')) {
	/**
	 * Get Sidebar
	 *
	 * @since 1.0
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function themes_get_sidebars($sidebar_id)
	{
		if (is_active_sidebar($sidebar_id)) {
			dynamic_sidebar($sidebar_id);
		} elseif (current_user_can('edit_theme_options')) {
?>
			<div class="widget">
				<p class='no-widget-text'>
					<a href='<?php echo esc_url(admin_url('widgets.php')); ?>'>
						<?php esc_html_e('Add Widget', 'itstart'); ?>
					</a>
				</p>
			</div>
		<?php
		}
	}
}

/**
 * Get registered sidebar name by sidebar ID.
 *
 * @since  1.0.0
 * @param  string $sidebar_id Sidebar ID.
 * @return string Sidebar name.
 */
function themes_get_sidebar_name_by_id($sidebar_id = '')
{

	if (!$sidebar_id) {
		return;
	}

	global $wp_registered_sidebars;
	$sidebar_name = '';

	if (isset($wp_registered_sidebars[$sidebar_id])) {
		$sidebar_name = $wp_registered_sidebars[$sidebar_id]['name'];
	}

	return $sidebar_name;
}


// ItStart Navigation
if (!function_exists('themes_primary_menu')) :
	function themes_primary_menu()
	{
		wp_nav_menu(
			array(
				'theme_location' => 'primary_menu',
				'container'  => '',
				'menu_class' => 'sm sm-clean',
				'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
				'walker' => new WP_Bootstrap_Navwalker()
			)
		);
	}
endif;
add_action('themes_primary_menu', 'themes_primary_menu');


// ItStart Logo
if (!function_exists('themes_logo')) :
	function themes_logo()
	{
		if (has_custom_logo()) {
			the_custom_logo();
		}
		$theme_title = get_bloginfo('name');
		if ($theme_title) :
		?>

			<a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
				<h4 class="site-title m-0">
					<?php
					echo esc_html(get_bloginfo('name'));
					?>
				</h4>
			</a>
		<?php
		endif;

		$itstart_description = get_bloginfo('description');
		if ($itstart_description) : ?>
			<p class="site-description"><?php echo esc_html($itstart_description); ?></p>
		<?php endif;
	}
endif;
add_action('themes_logo', 'themes_logo');

/**
 * ItStart Above Header Social
 */
if (!function_exists('themes_social')) {
	function themes_social()
	{
		$hide_show_social_icon 		= get_theme_mod('hide_show_social_icon', '1');
		$social_icons 				= get_theme_mod('social_icons', themes_get_social_icon_default());

		if ($hide_show_social_icon == '1') { ?>

			<ul class="ds-social justify-content-start">
					<?php
					$social_icons = json_decode($social_icons);
					if ($social_icons != '') {
						foreach ($social_icons as $social_item) {
							$social_icon = !empty($social_item->icon_value) ? apply_filters('itstart_translate_single_string', $social_item->icon_value, 'Header section') : '';
							$social_link = !empty($social_item->link) ? apply_filters('itstart_translate_single_string', $social_item->link, 'Header section') : '';
					?>
							<li>
								<a href="<?php echo esc_url($social_link); ?>" class="icon-soci"><i class="fa <?php echo esc_attr($social_icon); ?>"></i>
								</a>
							</li>
					<?php }
					} ?>
				</ul>
<?php }
	}
}
add_action('themes_social', 'themes_social');

// Preloader
if ( ! function_exists( 'itstart_preloader' ) ) :
function itstart_preloader() {
	$hs_preloader 	= get_theme_mod( 'hs_preloader'); 
	if($hs_preloader == '1') { 
	?>
	<!-- per-loader  -->
	<div id="preloader">
		<div id="loader"></div>
	</div>
	<!-- per-loader  -->
	<?php }
	} 
endif;
add_action( 'itstart_preloader', 'itstart_preloader' );

/*
 *
 * Social Icon
 */
function themes_get_social_icon_default()
{
	return apply_filters(
		'themes_get_social_icon_default',
		json_encode(
			array(
				array(
					'icon_value'	  =>  esc_html__('fa-facebook', 'itstart'),
					'link'	  =>  esc_html__('#', 'itstart'),
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'icon_value'	  =>  esc_html__('fa-google-plus', 'itstart'),
					'link'	  =>  esc_html__('#', 'itstart'),
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'icon_value'	  =>  esc_html__('fa-twitter', 'itstart'),
					'link'	  =>  esc_html__('#', 'itstart'),
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'icon_value'	  =>  esc_html__('fa-linkedin', 'itstart'),
					'link'	  =>  esc_html__('#', 'itstart'),
					'id'              => 'customizer_repeater_header_social_004',
				),
				array(
					'icon_value'	  =>  esc_html__('fa-behance', 'itstart'),
					'link'	  =>  esc_html__('#', 'itstart'),
					'id'              => 'customizer_repeater_header_social_005',
				)
			)
		)
	);
}

/*
 *
 * Slider Default
 */
function themes_get_slider_default()
{
	return apply_filters(
		'themes_get_slider_default',
		json_encode(
			array(
				array(
					'image_url'       	=> esc_url(get_template_directory_uri() . '/assets/images/slider.jpg'),
					'image_url2'       	=> esc_url(get_template_directory_uri() . '/assets/images/slider-left.jpg'),
					'title'           	=> esc_html__('Grow Your Business With Us', 'itstart'),
					'text'         		=> esc_html__('Devising new strategies for your companys success.', 'itstart'),
					'text2'	  			=>  esc_html__('Get Started', 'itstart'),
					'link'	  			=>  esc_html__('#', 'itstart'),
					'id'              	=> 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => esc_url(get_template_directory_uri() . '/assets/images/slider.jpg'),
					'image_url2'       	=> esc_url(get_template_directory_uri() . '/assets/images/slider-left.jpg'),
					'title'           	=> esc_html__('Grow Your Business With Us', 'itstart'),
					'text'         		=> esc_html__('Devising new strategies for your companys success.', 'itstart'),
					'text2'	  			=>  esc_html__('Get Started', 'itstart'),
					'link'	  			=>  esc_html__('#', 'itstart'),
					'id'              => 'customizer_repeater_slider_002',
				),
				array(
					'image_url'      	=> esc_url(get_template_directory_uri() . '/assets/images/slider.jpg'),
					'image_url2'       	=> esc_url(get_template_directory_uri() . '/assets/images/slider-left.jpg'),
					'title'           	=> esc_html__('Grow Your Business With Us', 'itstart'),
					'text'         		=> esc_html__('Devising new strategies for your companys success.', 'itstart'),
					'text2'	  			=>  esc_html__('Get Started', 'itstart'),
					'link'	  			=>  esc_html__('#', 'itstart'),
					'id'              => 'customizer_repeater_slider_003',
				),
			)
		)
	);
}


/*
 *
 * Service Default
 */
function themes_get_service_default()
{
	return apply_filters(
		'themes_get_service_default',
		json_encode(
			array(
				array(
					'icon_value'   => 'fa-paper-plane',
					'title'        => esc_html__('Web Marketing', 'itstart'),
					'subtitle'    	=>esc_html__('Unlocking the Power of the Internet for Your Business', 'itstart'),
					'link'        => '#',
					'id'           => 'customizer_repeater_service_001',
				),
				array(
					'icon_value'   => 'fa-shield',
					'title'        => esc_html__('Risk Managment', 'itstart'),
					'subtitle'    	=>esc_html__('Enhancing Business Resilience Through Proactive Risk Management', 'itstart'),
					'link'        => '#',
					'id'           => 'customizer_repeater_service_002',
				),
				array(
					'icon_value'   => 'fa-cloud',
					'title'        => esc_html__('Cloud Computing', 'itstart'),
					'subtitle'    	=>esc_html__('Harnessing the Power of the Cloud', 'itstart'),
					'link'        => '#',
					'id'           => 'customizer_repeater_service_003',
				)
			)
		)
	);
}

/*
 *
 * Funfact Default
 */
function themes_get_funfact_default()
{
	return apply_filters(
		'themes_get_funfact_default',
		json_encode(
			array(
				array(
					'icon_value'    => 'fa-users',
					'title'         => esc_html__('30', 'itstart'),
					'subtitle'      => esc_html__('Project Complete', 'itstart'),
					'id'            => 'customizer_repeater_funfact_001',
				),
				array(
					'icon_value'    => 'fa-hand',			
					'title'         => esc_html__('50', 'itstart'),
					'subtitle'      => esc_html__('Cup Of Coffee', 'itstart'),
					'id'            => 'customizer_repeater_funfact_002',
				),
				array(
					'icon_value'    => 'fa-trophy',
					'title'        	=> esc_html__('40', 'itstart'),
					'subtitle'      => esc_html__('Active Client', 'itstart'),
					'id'            => 'customizer_repeater_funfact_003',
				),
				array(
					'icon_value'    => 'fa-bar-chart',
					'title'        	=> esc_html__('100', 'itstart'),
					'subtitle'      => esc_html__('Happy Client', 'itstart'),
					'id'            => 'customizer_repeater_funfact_004',
				),

			)
		)
	);
}

/*
 *
 * Feature Default
 */
function themes_get_feature_default()
{
	return apply_filters(
		'themes_get_feature_default',
		json_encode(
			array(
				array(
					'icon_value'   => 'fa-users',
					'title'        => esc_html__('Team Builder', 'itstart'),
					'subtitle'        => esc_html__('Scans our talent network to create the optimal team for your project', 'itstart'),
					'id'           => 'customizer_repeater_feature_001',
				),
				array(
					'icon_value'   => 'fa-code',
					'title'        => esc_html__('Supervisor', 'itstart'),
					'subtitle'        => esc_html__('Scans our talent network to create the optimal team for your project', 'itstart'),
					'id'           => 'customizer_repeater_feature_002',
				),
				array(
					'icon_value'   => 'fa-laptop',
					'title'        => esc_html__('SEO Consultancy', 'itstart'),
					'subtitle'        => esc_html__('Scans our talent network to create the optimal team for your project', 'itstart'),
					'id'           => 'customizer_repeater_feature_003',
				)
			)
		)
	);
}
