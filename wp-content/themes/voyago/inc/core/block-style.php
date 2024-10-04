<?php

/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package voyago
 * @since 1.0.0
 */

if (function_exists('register_block_style')) {
    /**
     * Register block styles.
     *
     * @since 0.1
     *
     * @return void
     */
    function voyago_register_block_styles() {
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-opacity',
                'label' => __('Hover: Opacity', 'voyago')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-white-fill',
                'label' => __('Hover: White Fill', 'voyago')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-primary-fill',
                'label' => __('Hover: Primary Fill', 'voyago')
            )
        );
    }
    add_action('init', 'voyago_register_block_styles');
}
