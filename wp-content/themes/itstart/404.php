<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ItStart
 */

get_header();
$pg_404_ttl			= get_theme_mod('pg_404_ttl', '4<span>0</span>4');
$pg_404_subtitle	= get_theme_mod('pg_404_subtitle', 'Ooops, Page Not Found');
$pg_404_desc	= get_theme_mod('pg_404_desc', 'We’re sorry but we can’t seem to find the page you requested. This might be because you have typed the web address incorrectly. ');
$pg_404_btn_lbl		= get_theme_mod('pg_404_btn_lbl', 'Back To Home');
$pg_404_btn_url		= get_theme_mod('pg_404_btn_url',home_url());
itstart_breadcrumbs_style();
?>



<!--ds-section blog-->
<section class="ds-section error-404 ">
	<div class="container">
		<div class="row">
			<!-- column -->
			<div class="col-lg-6 offset-lg-3 text-center">
				<div class="error-page">
					<div class="error-title">
						<?php if (!empty($pg_404_ttl)) : ?>
							<h1>
								<?php echo wp_kses_post($pg_404_ttl); ?>
							</h1>
						<?php endif; ?>
					</div>
					<div class="error-content">
						<?php if (!empty($pg_404_subtitle)) : ?>
							<h2 class="ds-title">
								<?php echo wp_kses_post($pg_404_subtitle); ?>
							</h2>
						<?php endif; ?>
						
						<?php if (!empty($pg_404_desc)) : ?>
							<p>
								<?php echo wp_kses_post($pg_404_desc); ?>
							</p>
						<?php endif; ?>
						
						<?php if (!empty($pg_404_btn_lbl)) : ?>
							<a class="btn btn-slide btn-black" href="<?php echo esc_url($pg_404_btn_url); ?>"><?php echo esc_html($pg_404_btn_lbl); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<!--/ column -->
		</div>
	</div>
</section>
<!--/ds-section-->
<?php get_footer(); ?>