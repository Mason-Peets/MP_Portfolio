<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ItStart
 */

get_header();
$itstart_archive_pg_layout = get_theme_mod('archive_pg_layout', 'itstart_rsb'); 

$col_class = ($itstart_archive_pg_layout == 'itstart_fullwidth')?'col-lg-10 mx-auto':'col-lg-8';
itstart_breadcrumbs_style();
?>
<section class="ds-section">
	<div class="container">
		<div class="row">
			<?php if($itstart_archive_pg_layout == 'itstart_lsb'): get_sidebar(); endif; ?>	
			 <div class="<?php echo esc_attr($col_class); ?>">
			
				<?php if( have_posts() ): ?>
				<div class="row">
					<?php while( have_posts() ) : the_post(); ?>
						<div class="col-lg-6">
							<?php get_template_part('parts/default/post','page'); ?>
						</div>		
					<?php	endwhile; 
					the_posts_navigation();
					?>
				</div>	
				<?php else: ?>
				
					<?php get_template_part('parts/default/post','none'); ?>
					
				<?php endif; ?>
			</div>
			<?php if($itstart_archive_pg_layout == 'itstart_rsb'): get_sidebar(); endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
