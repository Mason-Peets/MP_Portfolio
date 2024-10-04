<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ItStart
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-item-inner wow fadeInUp'); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-image">
			<div class="featured-image">
				<a href="javascript:void(0);">
					<?php the_post_thumbnail(); ?>
				</a>
				<div class="post-date-badge">
					<span class="posted-on-page post-date-page">
						<a href="#"> <span class="post-date-badge-1"><span><?php echo esc_html(get_the_date('j')); ?></span></span> <span class="post-badge-2"><span><?php echo esc_html(get_the_date('M, Y')); ?></span></span></a>
					</span>
				</div>
			</div>
		</figure>
	<?php } ?>
	<?php get_template_part('parts/default/post','sticky'); ?>
	<div class="post-content-page">
		<div class="post-meta up">
			<span class="author-name">
				<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i> <?php esc_html(the_author()); ?></a>
			</span>
			<span class="comments-link">
				<a href="<?php echo esc_url(get_comments_link( $post->ID )); ?>"><i class="fa fa-commenting-o"></i> <?php echo esc_html(get_comments_number($post->ID)); ?> <?php esc_html_e('Comment','itstart'); ?></a>
			</span>
		</div>
		<?php    
			the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			the_excerpt();
		?>
		<a href="<?php echo esc_url(get_permalink()) ?>" target="_blank" class="more-link"><?php echo esc_html__('Read More','itstart'); ?> </a>
	</div>
</article>