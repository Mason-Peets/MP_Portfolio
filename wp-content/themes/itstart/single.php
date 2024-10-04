<?php

/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ItStart
 */

get_header();
$itstart_blog_single_layout 			= get_theme_mod('blog_single_layout', 'itstart_rsb');
$pg_blog_ttl 		= get_theme_mod('pg_blog_ttl', 'Mind Blowing Blog');
$pg_blog_subttl 	= get_theme_mod('pg_blog_subttl', 'Our Blog');
$enable_author_box 	= get_theme_mod('enable_author_box', '1');
$col_class = ($itstart_blog_single_layout == 'itstart_fullwidth') ? 'col-lg-10' : 'col-lg-8';
itstart_breadcrumbs_style();
?>

<!--===// Start: Our Blog
    =================================-->
<div class="ds-section blogs ">
	<div class="container">
		<div class="row">
			<?php if ($itstart_blog_single_layout == 'itstart_lsb') : get_sidebar(); endif; ?>

			<div class="col-md-6 col-lg-8">
				<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
				?>
						<!-- blog -->
						<div class="ds-blog-post mb-4 bg-white">
							<?php if (has_post_thumbnail()) { ?>
								<div class="ds-post-img img_lg">
									<?php the_post_thumbnail('large'); ?>
									<div class="ds-blog-category"> 
										<?php the_category(',', ''); ?>
									</div>
								</div>
								<?php } ?>
							
							<div class="ds-post-content">
								<div class="ds-post-meta">
									<span class="ds-author">
										<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><i class="fa fa-user"></i><?php esc_html(the_author()); ?></a>
									</span>
									<span class="ds-date">
										<a href="#"><i class="fa fa-calendar"></i><?php echo esc_html(get_the_date()); ?></a>
									</span>
									<span class="comments-link">
										<a href="#"><i class="fa fa-comments"></i><?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php the_title(sprintf('<h4 class="ds-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
								<?php the_content();?>
							
							</div> 
						</div>
				<?php
					endwhile;
				endif;
				?>
				<?php
				if ($enable_author_box == 1) {
					get_template_part('parts/default/post-author', 'meta');
				}
				?>

				
				<?php comments_template('', true); // show comments  ?>
			</div>
			<?php if ($itstart_blog_single_layout == 'itstart_rsb') : get_sidebar(); endif; ?>
		</div>
	</div>
</div>
<!-- End: Our Blog
    =================================-->
<?php get_footer(); ?>