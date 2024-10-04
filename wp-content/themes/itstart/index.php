<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package itstart
 */

get_header();
$itstart_blog_pg_layout 			= get_theme_mod('blog_page_layout', 'itstart_rsb');
$pg_blog_ttl 		= get_theme_mod('pg_blog_ttl', 'The document that outlines what the Investors will get for what they put in ');
$pg_blog_subttl 	= get_theme_mod('pg_blog_subttl', 'Outstanding Blog');
$col_class = ($itstart_blog_pg_layout == 'itstart_fullwidth' || !is_active_sidebar( 'itstart-sidebar-primary' )) 
    ? 'col-md-10 col-lg-10 mx-auto'  // Full-width with no sidebar active
    : 'col-md-8 col-lg-8';  // Default column width if the sidebar is active

itstart_breadcrumbs_style();
?>
<!--===// Start: Our Blog
    =================================-->

<!-- End: Our Blog
    =================================-->
<!-- blog section -->
<div class="ds-section blogs"> 
	<div class="container">
		<div class="row">
			<?php if ($itstart_blog_pg_layout == 'itstart_lsb') : get_sidebar(); endif; ?>
			<div class="<?php echo esc_attr($col_class); ?>">
				<div class="row">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post();
						?>
							<div class="row">
								<?php get_template_part('parts/default/post', 'page'); ?>
							</div>
						<?php endwhile; ?>
						<!-- Pagination -->


						<!-- Pagination -->

					<?php else : ?>
						<?php get_template_part('parts/default/post', 'none'); ?>
					<?php endif; ?>
				</div>
				<div class="row">
					<div class="col-12 text-center mt-5">
						<div class="sp-post-pagination">
							<div class="nav">
								<?php
								// Previous/next page navigation.
								the_posts_pagination(array(
									'prev_text'          => ' <i class="fa fa-chevron-left"></i>',
									'next_text'          => '<i class="fa fa-chevron-right"></i>',
								)); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if ($itstart_blog_pg_layout == 'itstart_rsb') : get_sidebar();
			endif; ?>
		</div>
	</div>
</div>
<!-- end -->
<?php get_footer(); ?>