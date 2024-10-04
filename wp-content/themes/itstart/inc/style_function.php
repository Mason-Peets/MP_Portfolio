<?php
get_template_part( 'inc/customizer/control-function/functions-style' );
get_template_part( 'inc/customizer/control-function/typography-functions' );
if( ! function_exists( 'itstart_dynamic_style' ) ):
    function itstart_dynamic_style() {

		$output_css = '';
		
			
		 /**
		 *  Breadcrumb Style
		 */
		 
		$output_css   .= itstart_customizer_value( 'breadcrumb_min_height', '.breadcrumb-section', array( 'height' ), array( 236, 236, 236 ), 'px' );
		 $output_css   .=  itstart_customizer_value( 'breadcrumb_title_size', '.content-breadcrumb h1', array( 'font-size' ), array( 20, 20, 20 ), 'px' );
		  $output_css   .=  itstart_customizer_value( 'breadcrumb_content_size', '.content-breadcrumb .breadcrumb li.breadcrumb-item', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		$hs_breadcrumb					= get_theme_mod('hs_breadcrumb','1');
		$breadcrumb_align				= get_theme_mod('breadcrumb_align','center');
		$breadcrumb_min_height			= get_theme_mod('breadcrumb_min_height','236');	
		if($breadcrumb_align !== '') { 
				$output_css .=".breadcrumb-content h1.breadcrumb-heading {
					text-align: " .esc_attr($breadcrumb_align). ";
				}\n";
			}
		
		$breadcrumb_bg_img			= get_theme_mod('breadcrumb_bg_img',get_template_directory_uri() .'/assets/images/slider.jpg'); 
		$breadcrumb_back_attach		= get_theme_mod('breadcrumb_back_attach','scroll'); 
		$breadcrumb_bg_img_opacity	= get_theme_mod('breadcrumb_bg_img_opacity','0.75');
		$breadcrumb_overlay_color	= get_theme_mod('breadcrumb_overlay_color','#000000');

		if($breadcrumb_bg_img !== '' && $hs_breadcrumb == '1') { 
			$output_css .=".breadcrumb-section {
					background: url(" .esc_url($breadcrumb_bg_img). ");
					background-attachment: " .esc_attr($breadcrumb_back_attach). ";
				}\n";
		}
		
		if($breadcrumb_bg_img !== '' && $hs_breadcrumb == '1') { 
			$output_css .=".breadcrumb-section::after{
					background-color: " .esc_attr($breadcrumb_overlay_color). ";
					opacity: " .esc_attr($breadcrumb_bg_img_opacity). ";
				}\n";
		}
		
		/**
		 * Logo Width 
		 */
		$output_css   .= itstart_customizer_value( 'logo_width', '.custom-logo-link img, .mobile-logo img', array( 'max-width' ), array( 140, 140, 140 ), 'px !important' );
		$output_css   .= itstart_customizer_value( 'site_ttl_size', '.site-title', array( 'font-size' ), array( 30, 30, 30 ), 'px !important' );
		$output_css   .= itstart_customizer_value( 'site_desc_size', '.site-description', array( 'font-size' ), array( 16, 16, 16 ), 'px !important' );
		
		
		$theme_color_enable	= get_theme_mod('theme_color_enable');
		$theme_color 	= get_theme_mod('theme_color','#F6C613');
		$secondary_color1 			= get_theme_mod('secondary_color1','#11104d');
		$custom_color_type	= get_theme_mod('custom_color_type','itstart');
		if($custom_color_type == 'prebuilt') {
		$output_css .=":root {
					--primary-color:" .esc_attr($theme_color). ";
					--secondary-color:" .esc_attr($secondary_color1). ";
				}\n";
		
		}	
		
		$primary_color 		= get_theme_mod('primary_color1','#F6C613');
		$secondary_color 	= get_theme_mod('secondary_color1','#141414');		 
		 
		 if($custom_color_type == 'solid') {
			$output_css .=":root{
							--primary-color:" .esc_attr($primary_color). ";
							--secondary-color:" .esc_attr($secondary_color). ";
						}\n";			
		}

		/**
		 *  Typography Body
		 */
		 $itstart_body_font_family		 = get_theme_mod('itstart_body_font_family','');
		 $itstart_body_font_weight	 	 = get_theme_mod('itstart_body_font_weight','inherit');
		 $itstart_body_text_transform	 = get_theme_mod('itstart_body_text_transform','inherit');
		 $itstart_body_font_style	 	 = get_theme_mod('itstart_body_font_style','inherit');
		 $itstart_body_txt_decoration	 = get_theme_mod('itstart_body_txt_decoration','');
		
		 $output_css   .= itstart_customizer_value( 'itstart_body_font_size', 'body', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		 $output_css   .= itstart_customizer_value( 'itstart_body_line_height', 'body', array( 'line-height' ), array( 1.6, 1.6, 1.6 ) );
		 $output_css   .= itstart_customizer_value( 'itstart_body_ltr_space', 'body', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
		 if($itstart_body_font_family !== '') { 
			if ( $itstart_body_font_family && ( strpos( $itstart_body_font_family, ',' ) != true ) ) {
				itstart_enqueue_google_font($itstart_body_font_family);
			}	
			 $output_css .=" body{ font-family: " .esc_attr($itstart_body_font_family). ";	}\n";
		 }
		 $output_css .=" body{ 
			font-weight: " .esc_attr($itstart_body_font_weight). ";
			text-transform: " .esc_attr($itstart_body_text_transform). ";
			font-style: " .esc_attr($itstart_body_font_style). ";
			text-decoration: " .esc_attr($itstart_body_txt_decoration). ";
		} a {text-decoration: " .esc_attr($itstart_body_txt_decoration). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {
			 $itstart_heading_font_family	    = get_theme_mod('itstart_h' . $i . '_font_family','');	
			 $itstart_heading_font_weight	 	= get_theme_mod('itstart_h' . $i . '_font_weight','700');
			 $itstart_heading_text_transform 	= get_theme_mod('itstart_h' . $i . '_text_transform','inherit');
			 $itstart_heading_font_style	 	= get_theme_mod('itstart_h' . $i . '_font_style','inherit');
			 $itstart_heading_txt_decoration	= get_theme_mod('itstart_h' . $i . '_text_decoration','inherit');
			 
			 $output_css   .= itstart_customizer_value( 'itstart_h' . $i . '_font_size', 'h' . $i .'', array( 'font-size' ), array( 36, 36, 36 ), 'px' );
			 $output_css   .= itstart_customizer_value( 'itstart_h' . $i . '_line_height', 'h' . $i . '', array( 'line-height' ), array( 1.2, 1.2, 1.2 ) );
			 $output_css   .= itstart_customizer_value( 'itstart_h' . $i . '_ltr_spacing', 'h' . $i . '', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
			  if($itstart_heading_font_family !== '') {
				  if ( $itstart_heading_font_family && ( strpos( $itstart_heading_font_family, ',' ) != true ) ) {
					itstart_enqueue_google_font($itstart_heading_font_family);
				  }
			  }	
			 $output_css .=" h" . $i . "{ 
				font-family: " .esc_attr($itstart_heading_font_family). ";
				font-weight: " .esc_attr($itstart_heading_font_weight). ";
				text-transform: " .esc_attr($itstart_heading_text_transform). ";
				font-style: " .esc_attr($itstart_heading_font_style). ";
				text-decoration: " .esc_attr($itstart_heading_txt_decoration). ";
			}\n";
		 }
		

		/**
		 *  Typography Menu
		 */
		 $itstart_menu_font_family		 = get_theme_mod('itstart_menu_font_family');
		 $itstart_menu_font_weight	 	 = get_theme_mod('itstart_menu_font_weight','inherit');
		 $itstart_menu_text_transform	 	 = get_theme_mod('itstart_menu_text_transform','inherit');
		 $itstart_menu_font_style	 	 	 = get_theme_mod('itstart_menu_font_style','inherit');
		 $itstart_menu_txt_decoration	 	 = get_theme_mod('itstart_menu_txt_decoration','inherit');
		 
		 $output_css   .= itstart_customizer_value( 'itstart_menu_font_size', '.navbar-nav li a, .dropdown-menu li a', array( 'font-size' ), array( 15, 15, 15 ), 'px' );
		 $output_css   .= itstart_customizer_value( 'itstart_menu_line_height', '.navbar-nav li a, .dropdown-menu li a', array( 'line-height' ), array( 3, 3, 3 ), '!important');
		 $output_css   .= itstart_customizer_value( 'itstart_menu_ltr_space', '.navbar-nav li a, .dropdown-menu li a', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
		   if($itstart_menu_font_family !== '') { 
			if ( $itstart_menu_font_family && ( strpos( $itstart_menu_font_family, ',' ) != true ) ) {
				itstart_enqueue_google_font($itstart_menu_font_family);
			}	
			 $output_css .=" .navbar-nav li a, .dropdown-menu li a{ font-family: " .esc_attr($itstart_menu_font_family). ";	}\n";
		 }
		 $output_css .=".navbar-nav li a, .dropdown-menu li a{ 
			font-weight: " .esc_attr($itstart_menu_font_weight). ";
			text-transform: " .esc_attr($itstart_menu_text_transform). ";
			font-style: " .esc_attr($itstart_menu_font_style). ";
			text-decoration: " .esc_attr($itstart_menu_txt_decoration). ";
		}\n";
		
		
		/**
		 * Slider
		 */
		$slider_overlay_enable 				 = get_theme_mod('slider_overlay_enable','1');
		$slide_overlay_color 				 = get_theme_mod('slide_overlay_color','#000000');
		$slider_opacity						 = get_theme_mod('slider_opacity','0.6');
		if($slider_overlay_enable == '1') { 
			$output_css .=".slide-main-item::before, .slider-two::before {
				background-color: " .esc_attr($slide_overlay_color). ";
				opacity: " .esc_attr($slider_opacity). ";
			}\n";
		}
		
		
		$slider_subttl_clr			= get_theme_mod('slider_subttl_clr','#ffffff');
		$slider_title_clr			= get_theme_mod('slider_title_clr','#ffffff');		 
		if(!empty($slider_subttl_clr)) { 
			$output_css .=".slider-section .slider-content span.firstword,  .slider2-item .slider2-content span.firstword {
				color: " .esc_attr($slider_subttl_clr). ";
			}\n";
		}
		
		if(!empty($slider_title_clr)) { 
			$output_css .=".slider-section .slider-content h1, .slider2-item .slider2-content h1{
				color: " .esc_attr($slider_title_clr). ";
			}\n";
		}	
		
		
		$funfact_bg_img	= get_theme_mod('funfact_bg_img',esc_url(get_template_directory_uri() .'/assets/images/slider.jpg'));	
		
		if(!empty($funfact_bg_img)){
			$output_css .=".funfact-section{ 
				    background-image: url(" .esc_url($funfact_bg_img). ");
			}\n";			
		}
		
		$footer_bg_color	= get_theme_mod('footer_bg_color','#0d0c44');
		$footer_bg_img	= get_theme_mod('footer_bg_img',esc_url(get_template_directory_uri() .'/assets/images/slider.jpg'));
		
		
		if(!empty($footer_bg_color)){
			 $output_css .=".footer-section{ 
				    background: ".esc_attr($footer_bg_color).";
			}\n";
			
		}
		else{
			$output_css .=".footer-section{ 
				    background-image: url(" .esc_url($footer_bg_img). ");
			}\n";			
		}
		
        wp_add_inline_style( 'itstart-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'itstart_dynamic_style' );
?>