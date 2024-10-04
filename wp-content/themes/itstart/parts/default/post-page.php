<?php

/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ItStart
 */
$categories = get_the_category();
?>



<!-- blog -->
<div id="post-<?php the_ID(); ?>" <?php post_class('ds-blog-post hover_eff mb-4 bg-white'); ?>>
  <?php if (has_post_thumbnail()) { ?>
		<div class="ds-post-img img_lg">
		<?php the_post_thumbnail('medium');	
		
			$categories = get_the_category(); // Get the categories associated with the post
			if ($categories) { // Check if there are categories available
		?>
			<div class="ds-blog-category"> <?php the_category(',', ''); ?></div>
		<?php }	?>
		</div>
	<?php }	?>
  
  <div class="ds-post-content">
	<div class="ds-post-meta">
		<span class="ds-author">
			<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-user"></i><?php esc_html(the_author()); ?></a>
		</span>
		<span class="ds-date">
			<a href="#"><i class="fa fa-calendar"></i><?php echo esc_html(get_the_date()); ?></a>
		</span>
		<span class="comments-link">
			<a href="#"><i class="fa fa-comments"></i><?php echo get_comments_number(); ?></a>
		</span>
	</div>
	<?php the_title(sprintf('<h4 class="ds-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
	<?php the_excerpt();?>
	<div class="ds-post-button">
		<a href="<?php echo esc_url(get_permalink()) ?>" class="btn btn-link"><?php echo esc_html__('Read More', 'itstart'); ?></a>
	</div>
  </div> 
</div>
<!--/ blog -->