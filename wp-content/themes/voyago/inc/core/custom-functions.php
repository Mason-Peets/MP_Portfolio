<?php
/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function voyago_register_block_animations_styles(){
	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-up-fade-in',
			'label' => esc_html__('Slide Up Fade In Animation', 'voyago'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-down-fade-in',
			'label' => esc_html__('Slide Down Fade In Animation', 'voyago'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-left-fade-in',
			'label' => esc_html__('Slide Left Fade In Animation', 'voyago'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-right-fade-in',
			'label' => esc_html__('Slide Right Fade In Animation', 'voyago'),
		)
	);

	register_block_style(
		'core/post-template',
		array(
			'name'  => 'hover-animation',
			'label' => esc_html__('Hover Animation', 'voyago'),
		)
	);

	register_block_style(
		'core/image',
		array(
			'name'  => 'clipIn',
			'label' => esc_html__('ClipIn Animation', 'voyago'),
		)
	);
}
add_action( 'init', 'voyago_register_block_animations_styles' );

/**
 * Include conditional assets
 * 
 * @since 1.0.0
 */
function voyago_theme_conditional_assets( $html, $block ){
	$block_style = '';

	if (!is_admin()) { //prevent loading conditional assets in admin
		//We use checking by class name until WordPress will have proper inline style registration for block styles
		if (isset($block['blockName'])) {
			if (!empty($block['attrs']['className'])) {
				if ($block['blockName'] == 'core/post-excerpt') {
					if (str_contains($block['attrs']['className'], 'is-style-show-two-lines') !== false) {
						$block_style .= '.is-style-show-two-lines>p{display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;  overflow: hidden; margin:0} .wp-block-post-excerpt.is-style-show-two-lines .wp-block-post-excerpt__more-text{ margin-top: 24px;}';
					} else if (str_contains($block['attrs']['className'], 'is-style-show-three-lines') !== false) {
						$block_style .= '.is-style-show-three-lines>p{display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;  overflow: hidden; margin:0} .wp-block-post-excerpt.is-style-show-three-lines .wp-block-post-excerpt__more-text{ margin-top: 24px;}';
					}
				}
			}
		}

		if ($block_style) {
			$html =  $html . '<style scoped>' . $block_style . '</style>';
		}
	}
	return $html;
}
add_filter( 'render_block', 'voyago_theme_conditional_assets', 10, 2 );

/**
 * Enqueue the block styles
 *
 * @since 1.0.0
 */
function voyago_register_editor_styles(){

	wp_enqueue_style(
		'voyago-block-style',
		get_theme_file_uri( 'assets/css/style' . '.css' ),
		array(),
		VOYAGO_VERSION
	);

	wp_enqueue_script(
		'voyago-custom-scripts',
		get_theme_file_uri( 'assets/js/custom-animations' . '.js' ),
		array(),
		VOYAGO_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'voyago_register_editor_styles' );