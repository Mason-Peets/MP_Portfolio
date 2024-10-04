<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package itstart_
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function itstart_widgets_init() {	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'itstart' ),
		'id' => 'itstart-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'itstart' ),
		'before_widget' => '<aside id="widget-%1$s" class="ds-widget-sidebar %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<label class="ds-widget-label">',
		'after_title' => '</label>',
	) );	
	 
	register_sidebar( array(
		'name' => __( 'Footer', 'itstart' ),
		'id' => 'itstart-footer',
		'description' => __( 'Footer Layout Widget', 'itstart' ),
		'before_widget' => ' <div id="%1$s" class="%2$s col-sm-6 col-md-6 col-lg-3"><div class="ds-widget">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4 class="ds-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'itstart_widgets_init' );
?>