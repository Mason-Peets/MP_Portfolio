<?php
/**
 * ItStart Theme Customizer.
 *
 * @package ItStart
 */

 if ( ! class_exists( 'ItStart_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class ItStart_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'itstart_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts',      array( $this, 'itstart_controls_scripts' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'itstart_customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'itstart_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'itstart_customizer_settings' ) );
			
		}
		
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function itstart_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';

			/**
			 * Register controls
			 */
			$wp_customize->register_control_type( 'ItStart_Control_Sortable' );
			$wp_customize->register_control_type( 'ItStart_Customizer_Range_Control' );
			
			/**
			 * Helper files
			 */
			require ITSTART_PARENT_INC_DIR . '/customizer/customizer-controls.php';
			require ITSTART_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		/**
		 * Customizer Controls
		 *
		 * @since 1.0.0
		 * @return void
		 */
		function itstart_controls_scripts() {
				$js_prefix  = '.js';
				$css_prefix = '.css';
				
			// Customizer Core.
			wp_enqueue_script( 'itstart-customizer-controls-toggle-js', ITSTART_PARENT_INC_URI . '/customizer/assets/js/customizer-toggle-control' . $js_prefix, array(), ITSTART_THEME_VERSION, true );
			// Customizer Controls.
			wp_enqueue_script( 'itstart-customizer-controls-js', ITSTART_PARENT_INC_URI . '/customizer/assets/js/customizer-control' . $js_prefix, array( 'itstart-customizer-controls-toggle-js' ), ITSTART_THEME_VERSION, true );
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function itstart_customize_preview_js() {
			wp_enqueue_script( 'itstart-customizer', ITSTART_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}
		
		function itstart_customizer_script() {
			 wp_enqueue_script( 'itstart-customizer-section', ITSTART_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}

		// Include customizer customizer settings.
			
		function itstart_customizer_settings() {
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-header.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-slider.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-funfact.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-service.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-feature.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-blog.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-footer.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-page-templates.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-general.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/customizer-options/itstart-sidebar.php';
				require ITSTART_PARENT_INC_DIR . '/customizer/itstart-premium.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
ItStart_Customizer::get_instance();