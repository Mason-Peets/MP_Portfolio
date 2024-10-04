<?php
if ( ! function_exists( 'itstart_setup' ) ) :
function itstart_setup() {

/**
 * Define Constants
 */
define( 'ITSTART_THEME_VERSION', '1.0' );

// Root path/URI.
define( 'ITSTART_PARENT_DIR', get_template_directory() );
define( 'ITSTART_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'ITSTART_PARENT_INC_DIR', ITSTART_PARENT_DIR . '/inc');
define( 'ITSTART_PARENT_INC_URI', ITSTART_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'itstart' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'itstart' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	
	add_theme_support('custom-logo');
	
	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
		add_theme_support( 'align-wide' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', itstart_google_font() ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'itstart_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'itstart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function itstart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'itstart_content_width', 1170 );
}
add_action( 'after_setup_theme', 'itstart_content_width', 0 );

// widget
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * All Styles & Scripts.
 */
require_once get_template_directory() . '/inc/widget.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';


/**
 * Called Breadcrumb
 */
require_once get_template_directory() . '/inc/breadcrumb.php';

/**
 * Sidebar.
 */
require_once get_template_directory() . '/inc/sidebar.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/extra-function.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/repeted-value.php';

/**
 * Customizer additions.
 */
 require_once get_template_directory() . '/inc/customizer-files.php';
 require_once get_template_directory() . '/inc/style_function.php';





/**
 * Customizer additions.
 */
 require get_template_directory() . '/inc/customizer/customizer-repeater/functions.php';
 
/*wp block-styles*/
add_theme_support( 'wp-block-styles' );


/* register block-styles*/
function itstart_register_block_styles() {
    // Register a itstart style for the paragraph block
    register_block_style(
        'core/paragraph', // Block name
        array(
            'name'         => 'itstart-style', // Unique style name
            'label'        => esc_html__('ItStart Style', 'itstart' ), // Style label
            'inline_style' => '.wp-block-paragraph.itstart-style { color: red; }', // CSS for the style
        )
    );

    // Register itstart custom style for the paragraph block
    register_block_style(
        'core/paragraph', // Block name
        array(
            'name'         => 'itstart-custom-style', // Unique style name
            'label'        => esc_html__('ItStart Custom Style', 'itstart' ), // Style label
            'inline_style' => '.wp-block-paragraph.itstart-custom-style { font-size: 20px; }', // CSS for the style
        )
    );

    // You can register styles for other blocks in a similar manner
}
add_action( 'init', 'itstart_register_block_styles' );


// Add support for responsive embeds
add_theme_support( 'responsive-embeds' );

/**
 * Custom Comment List
 */
if( ! function_exists( 'itstart_comments' ) ):
function itstart_comments($comment, $args, $depth) {
    ?>
	<li <?php comment_class('ds-comment'); ?> id="li-comment-<?php comment_ID() ?>">
		<article  class="ds-comment-body">
			<div class="ds-comment-author"> 
				<?php echo get_avatar($comment,$size='100',$default='https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y' , 'avatar photo ds_img avatar-32 '); ?>				
			</div>
				
			<div class="ds-comment-content">
				<h4 class="ds-title-sm"><?php echo get_comment_author() ?></h4>
				<p>
					<?php comment_text() ?>
				</p>
			</div>
			
		</article>
		</li>
<?php
        }
endif;


add_filter('the_content', 'itstart_add_link_underline');
add_filter('the_excerpt', 'itstart_add_link_underline');

function itstart_add_link_underline($content) {
    return str_replace('<a', '<a style="text-decoration: underline;"', $content);
}