<?php
$hs_breadcrumb					= get_theme_mod('hs_breadcrumb', '1');
if ($hs_breadcrumb == '1') {
?>
<div class="ds-section breadcrumbs" style="background-image:url(<?php echo get_theme_file_uri('/assets/images/slider.jpg') ?> );padding-top: 100px;padding-bottom: 290px;">
		 <!--breadcrumb-->
		 <div class="ds-breadcrumb">
			<div class="inner">
			  <div class="container">
				<div class="row">
				 <!-- column -->
				  <div class="col-md-12">
					<div class="bread-content">
						<h1>
							<?php
								if (is_home() || is_front_page()) :

									single_post_title();

								elseif (is_day()) :

									printf(__('Daily Archives: %s', 'itstart'), get_the_date());

								elseif (is_month()) :

									printf(__('Monthly Archives: %s', 'itstart'), (get_the_date('F Y')));

								elseif (is_year()) :

									printf(__('Yearly Archives: %s', 'itstart'), (get_the_date('Y')));

								elseif (is_page()) :
									printf(__('%s', 'itstart'), (get_the_title()));

								elseif (is_category()) :

									printf(__('Category: %s', 'itstart'), (single_cat_title('', false)));

								elseif (is_tag()) :

									printf(__('Tag: %s', 'itstart'), (single_tag_title('', false)));

								elseif (is_search()) :

									printf(__('Search For: %s', 'itstart'), (esc_html(get_search_query())));

								elseif (is_single()) :

									printf(__('%s', 'itstart'), (esc_html(get_the_title())));

								elseif (is_404()) :

									printf(__('Error 404', 'itstart'));

								elseif (is_author()) :

									printf(__('Author: %s', 'itstart'), (get_the_author('', false)));

								else :
									echo esc_html__('Default Title', 'itstart');

								endif;
							?>
						</h1>
						<ul class="d-flex">
							<?php if (function_exists('itstart_breadcrumbs')) itstart_breadcrumbs(); ?>
						</ul>
					</div>
				  </div>
				   <!--/ column -->
				</div>
			  </div>
			 <div class="ds-wave-point">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
					<path fill="#fff" fill-opacity="1" d="M0,192L48,186.7C96,181,192,171,288,154.7C384,139,480,117,576,122.7C672,128,768,160,864,186.7C960,213,1056,235,1152,229.3C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
				</svg>
			</div> 
			</div>
			<div class="animation-area">
			  <ul class="box-area">
				<li><img src="<?php echo get_theme_file_uri('/assets/images/Polygon1.png') ?>" alt="<?php echo esc_attr__('Polygon1','itstart'); ?>"></li>
				<li> <img src="<?php echo get_theme_file_uri('/assets/images/crosshape.png') ?>" alt="<?php echo esc_attr__('crosshape','itstart'); ?>"></li>
				<li> <img src="<?php echo get_theme_file_uri('/assets/images/round1.png') ?>" alt="<?php echo esc_attr__('round1','itstart'); ?>"></li>
				<li> <img src="<?php echo get_theme_file_uri('/assets/images/round2.png') ?>" alt="<?php echo esc_attr__('round2','itstart'); ?>"></li>
				<li> <img src="<?php echo get_theme_file_uri('/assets/images/round3.png') ?>" alt="<?php echo esc_attr__('round3','itstart'); ?>"></li>
			  </ul>
			</div>
		  </div>
		  <!--/breadcrumb-->
	</div>
<?php } ?>