<?php

/**
 * voyago: Block Patterns
 *
 * @since voyago 1.0.0
 */

/**
 * Registers pattern categories for voyago
 *
 * @since voyago 1.0.0
 *
 * @return void
 */
function voyago_register_pattern_category()
{
	$block_pattern_categories = array(
		'voyago' => array('label' => __('Voyago', 'voyago')),
	);

	$block_pattern_categories = apply_filters('voyago_block_pattern_categories', $block_pattern_categories);

	foreach ($block_pattern_categories as $name => $properties) {
		if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
			register_block_pattern_category($name, $properties);
		}
	}
}
add_action('init', 'voyago_register_pattern_category', 9);
