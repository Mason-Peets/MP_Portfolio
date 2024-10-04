<?php
 /**
 * Enqueue scripts and styles.
 */
function itstart_scripts() {

	// Styles	
	wp_enqueue_style('itstart-itstart-bootstrap',get_template_directory_uri().'/assets/css/bootstrap.css');
	wp_enqueue_style('itstart-sm-blue',get_template_directory_uri().'/assets/css/sm-blue.css');
	wp_enqueue_style('itstart-font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.css');
	wp_enqueue_style('itstart-sm-clean',get_template_directory_uri().'/assets/css/sm-clean.css');	
	wp_enqueue_style('itstart-sm-core-css',get_template_directory_uri().'/assets/css/sm-core-css.css');	
	wp_enqueue_style('itstart-swiper-bundle-min',get_template_directory_uri().'/assets/css/swiper-bundle-min.css');	
	wp_enqueue_style('itstart-editor-style-min',get_template_directory_uri().'/assets/css/editor-style.css');
	wp_enqueue_style( 'itstart-style', get_stylesheet_uri() );
	wp_enqueue_style('itstart-stylecss',get_template_directory_uri().'/assets/css/style.css');	
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('itstart-magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array('jquery'), false, true);
	wp_enqueue_script('itstart-jquery-smartmenus-min', get_template_directory_uri() . '/assets/js/jquery-smartmenus-min.js', array('jquery'), false, true);
	wp_enqueue_script('itstart-swiper-bundle-min', get_template_directory_uri() . '/assets/js/swiper-bundle-min.js', array('jquery'), false, true);
	wp_enqueue_script('itstart-waypoints', get_template_directory_uri() . '/assets/js/waypoints.js', array('jquery'), false, true);
	wp_enqueue_script('itstart-swiper-bundle-min', get_template_directory_uri() . '/assets/js/swiper-bundle.js', array('jquery'), false, true);	
	wp_enqueue_script('itstart-jquery-counterup', get_template_directory_uri() . '/assets/js/jquery-counterup.js', array('jquery'), false, true);
	wp_enqueue_script('itstart-wow-min', get_template_directory_uri() . '/assets/js/wow-min.js', array('jquery'), false, true);
	wp_enqueue_script('itstart-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'itstart_scripts' );

//Admin Enqueue for Admin
function itstart_admin_scripts(){
	wp_enqueue_style('itstart-admin-style', get_template_directory_uri() . '/inc/customizer/assets/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'itstart_admin_scripts' );
?>