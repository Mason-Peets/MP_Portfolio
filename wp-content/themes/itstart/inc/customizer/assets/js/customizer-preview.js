/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	/**
     * Outputs custom css for responsive controls
     * @param  {[string]} setting customizer setting
     * @param  {[string]} css_selector
     * @param  {[array]} css_prop css property to write
     * @param  {String} ext css value extension eg: px, in
     * @return {[string]} css output
     */
    function range_live_media_load( setting, css_selector, css_prop, ext = '' ) {
        wp.customize(
            setting, function( value ) {
                'use strict';
                value.bind(
                    function( to ){
                        var values          = JSON.parse( to );
                        var desktop_value   = JSON.parse( values.desktop );
                        var tablet_value    = JSON.parse( values.tablet );
                        var mobile_value    = JSON.parse( values.mobile );

                        var class_name      = 'customizer-' + setting;
                        var css_class       = $( '.' + class_name );
                        var selector_name   = css_selector;
                        var property_name   = css_prop;

                        var desktop_css     = '';
                        var tablet_css      = '';
                        var mobile_css      = '';

                        if ( property_name.length == 1 ) {
                            var desktop_css     = property_name[0] + ': ' + desktop_value + ext + ';';
                            var tablet_css      = property_name[0] + ': ' + tablet_value + ext + ';';
                            var mobile_css      = property_name[0] + ': ' + mobile_value + ext + ';';
                        } else if ( property_name.length == 2 ) {
                            var desktop_css     = property_name[0] + ': ' + desktop_value + ext + ';';
                            var desktop_css     = desktop_css + property_name[1] + ': ' + desktop_value + ext + ';';

                            var tablet_css      = property_name[0] + ': ' + tablet_value + ext + ';';
                            var tablet_css      = tablet_css + property_name[1] + ': ' + tablet_value + ext + ';';

                            var mobile_css      = property_name[0] + ': ' + mobile_value + ext + ';';
                            var mobile_css      = mobile_css + property_name[1] + ': ' + mobile_value + ext + ';';
                        }

                        var head_append     = '<style class="' + class_name + '">@media (min-width: 320px){ ' + selector_name + ' { ' + mobile_css + ' } } @media (min-width: 720px){ ' + selector_name + ' { ' + tablet_css + ' } } @media (min-width: 960px){ ' + selector_name + ' { ' + desktop_css + ' } }</style>';

                        if ( css_class.length ) {
                            css_class.replaceWith( head_append );
                        } else {
                            $( "head" ).append( head_append );
                        }
                    }
                );
            }
        );
    }
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	$(document).ready(function ($) {
        $('input[data-input-type]').on('input change', function () {
            var val = $(this).val();
            $(this).prev('.cs-range-value').html(val);
            $(this).val(val);
        });
    })
	
	
	/**
	 * logo_width
	 */
	range_live_media_load( 'logo_width', '.custom-logo-link img', [ 'max-width' ], 'px !important' );
	
	/**
	 * site_ttl_size
	 */
	 
	range_live_media_load( 'site_ttl_size', 'h4.site-title', [ 'font-size' ], 'px !important' );
	
	/**
	 * site_desc_size
	 */
	 
	range_live_media_load( 'site_desc_size', '.site-description', [ 'font-size' ], 'px !important' );
	
	//tlh_about_text
	wp.customize(
		'tlh_about_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.author-content .heading-title h6' ).text( newval );
				}
			);
		}
	);
	
	//tlh_gallery_text
	wp.customize(
		'tlh_gallery_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.author-content .widget-title' ).text( newval );
				}
			);
		}
	);
	
	//footer_contact_address
	wp.customize(
		'footer_contact_address', function( value ) {
			value.bind(
				function( newval ) {
					$( '.footer-section .contact-area .contact-info a' ).text( newval );
				}
			);
		}
	);
	
	//footer_address_title
	wp.customize(
		'footer_address_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.footer-section .contact-area .contact-info .title' ).text( newval );
				}
			);
		}
	);
	
	//footer_email
	wp.customize(
		'footer_email', function( value ) {
			value.bind(
				function( newval ) {
					$( '.footer-section .contact-area .contact-info a' ).text( newval );
				}
			);
		}
	);
	
	//footer_email_title
	wp.customize(
		'footer_email_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.footer-section .contact-area .contact-info .title' ).text( newval );
				}
			);
		}
	);
	
	//footer_get_in_touch_title
	wp.customize(
		'footer_get_in_touch_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.footer-section .contact-area .contact-info .title' ).text( newval );
				}
			);
		}
	);
	
	//footer_get_in_touch_number
	wp.customize(
		'footer_get_in_touch_number', function( value ) {
			value.bind(
				function( newval ) {
					$( '.footer-section .contact-area .contact-info a' ).text( newval );
				}
			);
		}
	);
	
	
	//tlh_contact_address
	wp.customize(
		'tlh_contact_address', function( value ) {
			value.bind(
				function( newval ) {
					$( '.header-main .topbar .widget-header .widget-contact .contact-info.contact .contact-info a' ).text( newval );
				}
			);
		}
	);
	
	//tlh_email
	wp.customize(
		'tlh_email', function( value ) {
			value.bind(
				function( newval ) {
					$( '.header-main .topbar .widget-header .widget-contact .contact-info.email .contact-info a' ).text( newval );
				}
			);
		}
	);
	
	
	//tlh_btn_lbl
	wp.customize(
		'tlh_btn_lbl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-area .contact-info span' ).text( newval );
				}
			);
		}
	);

	//service_title
	wp.customize(
		'service_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.service-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//service_subtitle
	wp.customize(
		'service_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.service-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//service_description
	wp.customize(
		'service_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.service-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//features_title
	wp.customize(
		'features_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.features-home .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//features_desc
	wp.customize(
		'features_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.features-home .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//project_title
	wp.customize(
		'project_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.portfolio-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//project_subtitle
	wp.customize(
		'project_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.portfolio-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//project_desc
	wp.customize(
		'project_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.portfolio-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	//cta_call_title
	wp.customize(
		'cta_call_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.cta-button a span' ).text( newval );
				}
			);
		}
	);
	
	//cta_call_text
	wp.customize(
		'cta_call_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.cta-button a' ).text( newval );
				}
			);
		}
	);
	
	//cta_title
	wp.customize(
		'cta_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.cta-section-home .cta-content h2' ).text( newval );
				}
			);
		}
	);
	
	//cta_description
	wp.customize(
		'cta_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.cta-section .cta-content p' ).text( newval );
				}
			);
		}
	);
	
	//cta_btn_lbl
	wp.customize(
		'cta_btn_lbl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-cta .cta-btn a' ).text( newval );
				}
			);
		}
	);
	
	
	//pricing_title
	wp.customize(
		'pricing_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pricing-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//pricing_subtitle
	wp.customize(
		'pricing_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pricing-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//pricing_desc
	wp.customize(
		'pricing_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pricing-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//client_title
	wp.customize(
		'client_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#sponsor-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//client_subtitle
	wp.customize(
		'client_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '#sponsor-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//client_description
	wp.customize(
		'client_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#sponsor-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//team_title
	wp.customize(
		'team_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.team-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//team_subtitle
	wp.customize(
		'team_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.team-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//team_description
	wp.customize(
		'team_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.team-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//funfact_title
	wp.customize(
		'funfact_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.funfact-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//funfact_subtitle
	wp.customize(
		'funfact_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.funfact-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//funfact_description
	wp.customize(
		'funfact_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.funfact-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	//blog_title
	wp.customize(
		'blog_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#post-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//blog_subtitle
	wp.customize(
		'blog_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '#post-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//blog_description
	wp.customize(
		'blog_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#post-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//custom_title
	wp.customize(
		'custom_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#custom-section .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//custom_description
	wp.customize(
		'custom_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#custom-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_left_ttl
	wp.customize(
		'pg_about_left_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about-section .about-summery' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_title
	wp.customize(
		'pg_about_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.why-choose-section .right-about-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_subttl
	wp.customize(
		'pg_about_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.why-choose-section .right-about-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_desc
	wp.customize(
		'pg_about_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.why-choose-section .right-about-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_step_ttl
	wp.customize(
		'pg_about_step_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.work-process .section-title h5 .funfact-title' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_step_subttl
	wp.customize(
		'pg_about_step_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.work-process .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_step_desc
	wp.customize(
		'pg_about_step_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.work-process .section-title p' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_video_link
	wp.customize(
		'pg_about_video_link', function( value ) {
			value.bind(
				function( newval ) {
					$( '.why-choose-section .about-left-area .about-vedio-btn .vedio-button' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_experience_ttl
	wp.customize(
		'pg_about_experience_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.why-choose-section .about-left-badge .experience-1 p' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_experience_year
	wp.customize(
		'pg_about_experience_year', function( value ) {
			value.bind(
				function( newval ) {
					$( '.why-choose-section .about-left-badge .experience-1 h3' ).text( newval );
				}
			);
		}
	);
	
	
	//testimonial_ttl
	wp.customize(
		'testimonial_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '#testimonial-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//testimonial_subttl
	wp.customize(
		'testimonial_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '#testimonial-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//testimonial_desc
	wp.customize(
		'testimonial_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '#testimonial-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//skill_ttl
	wp.customize(
		'skill_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-skill .right-area-choose .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//skill_subttl
	wp.customize(
		'skill_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-skill .right-area-choose .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//skill_desc
	wp.customize(
		'skill_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-skill .right-area-choose .section-title p' ).text( newval );
				}
			);
		}
	);
	
	//skill_button_text
	wp.customize(
		'skill_button_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-skill .right-area-choose .main-button span' ).text( newval );
				}
			);
		}
	);
	
	//skill_ttl
	wp.customize(
		'pg_skill_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-skill .right-area-choose .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//skill_subttl
	wp.customize(
		'pg_skill_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-skill .right-area-choose .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//skill_desc
	wp.customize(
		'pg_skill_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-skill .right-area-choose .section-title p' ).text( newval );
				}
			);
		}
	);
	
	//skill_button_text
	wp.customize(
		'pg_skill_button_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-skill .right-area-choose .main-button span' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_service_ttl
	wp.customize(
		'pg_service_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.service-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//pg_service_subttl
	wp.customize(
		'pg_service_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.service-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//pg_service_desc
	wp.customize(
		'pg_service_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.service-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_faq_ttl
	wp.customize(
		'pg_faq_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.faq-page .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	//pg_faq_subttl
	wp.customize(
		'pg_faq_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.faq-page .section-title span.sub-title' ).text( newval );
				}
			);
		}
	);
	
	//pg_faq_desc
	wp.customize(
		'pg_faq_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.faq-page .section-title p' ).text( newval );
				}
			);
		}
	);
	
	//pg_pricing_ttl
	wp.customize(
		'pg_pricing_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pricing-page .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//pg_pricing_subttl
	wp.customize(
		'pg_pricing_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pricing-page .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//pg_pricing_desc
	wp.customize(
		'pg_pricing_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pricing-page .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_gallery_ttl
	wp.customize(
		'pg_gallery_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.gallery-page .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_gallery_desc
	wp.customize(
		'pg_gallery_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.gallery-page .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_project_ttl
	wp.customize(
		'pg_project_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pricing-section .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//pg_project_subttl
	wp.customize(
		'pg_project_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pricing-section .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//pg_project_desc
	wp.customize(
		'pg_project_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pricing-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_blog_ttl
	wp.customize(
		'pg_blog_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-blog .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_blog_desc
	wp.customize(
		'pg_blog_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.page-blog .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//pg_ct_info_ttl
	wp.customize(
		'pg_ct_info_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-page .section-title h5' ).text( newval );
				}
			);
		}
	);
	
	//pg_ct_info_subttl
	wp.customize(
		'pg_ct_info_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-page .section-title div h2' ).text( newval );
				}
			);
		}
	);
	
	//pg_ct_info_desc
	wp.customize(
		'pg_ct_info_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-page .section-title p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_ct_office_ttl
	wp.customize(
		'pg_ct_office_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contactoffice-section .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_ct_office_desc
	wp.customize(
		'pg_ct_office_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contactoffice-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_ct_form_ttl
	wp.customize(
		'pg_ct_form_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-inquiry .send-your-enquiry .company-adress-btn span' ).text( newval );
				}
			);
		}
	);
	
	//pg_ct_form_desc
	wp.customize(
		'pg_ct_form_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contactform-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	/**
	 * Container Width
	 */
	wp.customize( 'itstart_site_cntnr_width', function( value ) {
		
		value.bind( function( itstart_site_cntnr_width ) {
			var class_name      = 'itstart_site_cntnr_width'; // Used as id in gfont link
			var css_class       = $( '.' + class_name );			
			
			if (itstart_site_cntnr_width >= 768 && itstart_site_cntnr_width < 2000){
				var head_append     = '<style class="' + class_name + '">.container{ max-width: ' + itstart_site_cntnr_width + 'px;}</style>';
			}

			if ( css_class.length ) {
				css_class.replaceWith( head_append );
			} else {
				$( 'head' ).append( head_append );
			}
			
		});
		
	} );
	
	/**
	 * Breadcrumb Typography
	 */
	range_live_media_load( 'breadcrumb_title_size', '.content-breadcrumb h1', [ 'font-size' ], 'px' );
	range_live_media_load( 'breadcrumb_content_size', '.content-breadcrumb .breadcrumb li.breadcrumb-item', [ 'font-size' ], 'px' );
	
	range_live_media_load( 'breadcrumb_min_height', '.breadcrumb-section', [ 'height' ], 'px' );
	range_live_media_load( 'breadcrumb_bg_img_opacity', '.breadcrumb-section::after', [ 'opacity' ] );
	
	
	/**
	 * sidebar_wid_ttl_size
	 */
	range_live_media_load( 'sidebar_wid_ttl_size', '.sidebar .widget .widget-title', [ 'font-size' ], 'px' );
	
	/**
	 * Body font family
	 */
	wp.customize( 'itstart_body_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'body' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * Body font size
	 */
	
	range_live_media_load( 'itstart_body_font_size', 'body', [ 'font-size' ], 'px' );
	
	/**
	 * Body Letter Spacing
	 */
	
	range_live_media_load( 'itstart_body_ltr_space', 'body', [ 'letter-spacing' ], 'px' );
	
	/**
	 * Body font weight
	 */
	wp.customize( 'itstart_body_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'body' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * Body font style
	 */
	wp.customize( 'itstart_body_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'body' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * Body Text Decoration
	 */
	wp.customize( 'itstart_body_txt_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'body, a' ).css( 'text-decoration', decoration );
		} );
	} );
	/**
	 * Body text tranform
	 */
	wp.customize( 'itstart_body_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'body' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * itstart_body_line_height
	 */
	range_live_media_load( 'itstart_body_line_height', 'body', [ 'line-height' ] );
	
	/**
	 * H1 font family
	 */
	wp.customize( 'itstart_h1_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h1' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H1 font size
	 */
	range_live_media_load( 'itstart_h1_font_size', 'h1', [ 'font-size' ], 'px' );
	
	/**
	 * H1 font style
	 */
	wp.customize( 'itstart_h1_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h1' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H1 Text Decoration
	 */
	wp.customize( 'itstart_h1_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h1' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H1 font weight
	 */
	wp.customize( 'itstart_h1_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h1' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H1 text tranform
	 */
	wp.customize( 'itstart_h1_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h1' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H1 line height
	 */
	range_live_media_load( 'itstart_h1_line_height', 'h1', [ 'line-height' ] );
	
	/**
	 * H1 Letter Spacing
	 */
	 
	range_live_media_load( 'itstart_h1_ltr_spacing', 'h1', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H2 font family
	 */
	wp.customize( 'itstart_h2_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h2' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H2 font size
	 */
	range_live_media_load( 'itstart_h2_font_size', 'h2', [ 'font-size' ], 'px' );
	
	/**
	 * H2 font style
	 */
	wp.customize( 'itstart_h2_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h2' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H2 Text Decoration
	 */
	wp.customize( 'itstart_h2_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h2' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H2 font weight
	 */
	wp.customize( 'itstart_h2_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h2' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H2 text tranform
	 */
	wp.customize( 'itstart_h2_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h2' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H2 line height
	 */
	range_live_media_load( 'itstart_h2_line_height', 'h2', [ 'line-height' ]);
	
	/**
	 * H2 Letter Spacing
	 */
	
	range_live_media_load( 'itstart_h2_ltr_spacing', 'h2', [ 'letter-spacing' ], 'px' );
	/**
	 * H3 font family
	 */
	wp.customize( 'itstart_h3_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h3' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H3 font size
	 */
	range_live_media_load( 'itstart_h3_font_size', 'h3', [ 'font-size' ], 'px' );
	
	/**
	 * H3 font style
	 */
	wp.customize( 'itstart_h3_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h3' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H3 Text Decoration
	 */
	wp.customize( 'itstart_h3_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h3' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H3 font weight
	 */
	wp.customize( 'itstart_h3_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h3' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H3 text tranform
	 */
	wp.customize( 'itstart_h3_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h3' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H3 line height
	 */
	range_live_media_load( 'itstart_h3_line_height', 'h3', [ 'line-height' ]);
	
	/**
	 * H3 Letter Spacing
	 */
	
	range_live_media_load( 'itstart_h3_ltr_spacing', 'h3', [ 'letter-spacing' ], 'px' );
	
	
	/**
	 * H4 font family
	 */
	wp.customize( 'itstart_h4_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h4' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H4 font size
	 */
	range_live_media_load( 'itstart_h4_font_size', 'h4', [ 'font-size' ], 'px' );
	
	/**
	 * H4 font style
	 */
	wp.customize( 'itstart_h4_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h4' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H4 Text Decoration
	 */
	wp.customize( 'itstart_h4_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h4' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H4 font weight
	 */
	wp.customize( 'itstart_h4_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h4' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H4 text tranform
	 */
	wp.customize( 'itstart_h4_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h4' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H4 line height
	 */
	range_live_media_load( 'itstart_h4_line_height', 'h4', [ 'line-height' ]);
	
	/**
	 * H4 Letter Spacing
	 */
	
		range_live_media_load( 'itstart_h4_ltr_spacing', 'h4', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H5 font family
	 */
	wp.customize( 'itstart_h5_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h5' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H5 font size
	 */
	range_live_media_load( 'itstart_h5_font_size', 'h5', [ 'font-size' ], 'px' );
	
	/**
	 * H5 font style
	 */
	wp.customize( 'itstart_h5_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h5' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H5 Text Decoration
	 */
	wp.customize( 'itstart_h5_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h5' ).css( 'text-decoration', decoration );
		} );
	} );
	
	
	/**
	 * H5 font weight
	 */
	wp.customize( 'itstart_h5_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h5' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H5 text tranform
	 */
	wp.customize( 'itstart_h5_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h5' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H5 line height
	 */
	range_live_media_load( 'itstart_h5_line_height', 'h5', [ 'line-height' ]);
	
	/**
	 * H5 Letter Spacing
	 */
	
	range_live_media_load( 'itstart_h5_ltr_spacing', 'h5', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H6 font family
	 */
	wp.customize( 'itstart_h6_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h6' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H6 font size
	 */
	range_live_media_load( 'itstart_h6_font_size', 'h6', [ 'font-size' ], 'px' );
	
	/**
	 * H6 font style
	 */
	wp.customize( 'itstart_h6_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h6' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H6 Text Decoration
	 */
	wp.customize( 'itstart_h6_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h6' ).css( 'text-decoration', decoration );
		} );
	} );
	
	
	/**
	 * H6 font weight
	 */
	wp.customize( 'itstart_h6_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h6' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H6 text tranform
	 */
	wp.customize( 'itstart_h6_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h6' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H6 line height
	 */
	range_live_media_load( 'itstart_h6_line_height', 'h6', [ 'line-height' ]);
	
	/**
	 * H6 Letter Spacing
	 */
	
	range_live_media_load( 'itstart_h6_ltr_spacing', 'h6', [ 'letter-spacing' ], 'px' );
	
	
	
	
	
	/**
	 * Menu font size
	 */
	
	range_live_media_load( 'itstart_menu_font_size', '.navbar-nav li a, .dropdown-menu li a', [ 'font-size' ], 'px' );
	
	/**
	 * Menu Letter Spacing
	 */
	
	range_live_media_load( 'itstart_menu_ltr_space', '.navbar-nav li a, .dropdown-menu li a', [ 'letter-spacing' ], 'px' );
	
	/**
	 * Menu font weight
	 */
	wp.customize( 'itstart_menu_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( '.navbar-nav li a, .dropdown-menu li a' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * Menu font style
	 */
	wp.customize( 'itstart_menu_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( '.navbar-nav li a, .dropdown-menu li a' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * Menu Text Decoration
	 */
	wp.customize( 'itstart_menu_txt_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( '.navbar-nav li a, .dropdown-menu li a' ).css( 'text-decoration', decoration );
		} );
	} );
	/**
	 * Menu text tranform
	 */
	wp.customize( 'itstart_menu_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( '.navbar-nav li a, .dropdown-menu li a' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * itstart_menu_line_height
	 */
	range_live_media_load( 'itstart_menu_line_height', '.navbar-nav li a, .dropdown-menu li a', [ 'line-height' ] );
	
} )( jQuery );