  <!--===// Start: Our articules
    =================================-->
	<?php
		$blog_title			= get_theme_mod('blog_title', 'Our <span>Latest</span> News');
		$blog_subtitle		= get_theme_mod('blog_subtitle', 'Our Blog');
		$blog_display_num	= get_theme_mod('blog_display_num', '3');
	?>
	<!--ds-section blog-->
    <div class="ds-section blogs bg-light"> 
    	<div class="container">
			<?php if (!empty($blog_title)  || !empty($blog_subtitle)) { ?>
				<div class="ds-section-heading text-center">
					<?php if (!empty($blog_subtitle)) : ?>
						<h3 class="sub-title">
							<?php echo esc_html($blog_subtitle); ?>
						</h3>
					<?php endif; ?>

					<?php if (!empty($blog_title)) : ?>
						<h2 class="ititle">						
								<?php echo wp_kses_post($blog_title); ?>						
						</h2>
					<?php endif; ?>
				</div>
			<?php } ?>
			
    		<div class="row">
				<?php
					$itstart_blog_args = array('post_type' => 'post', 'posts_per_page' => $blog_display_num, 'post__not_in' => get_option("sticky_posts"));
					$itstart_wp_query = new WP_Query($itstart_blog_args);
					if ($itstart_wp_query) {
						while ($itstart_wp_query->have_posts()) : $itstart_wp_query->the_post();
				?>
					<!-- column -->
					<div class="col-md-6 col-lg-4">
						<div class="ds-blog-post hover_eff mb-4 bg-white wow fadeInLeft">
							<?php if (has_post_thumbnail()) { ?>
								<div class="ds-post-img img_eff">
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
					</div>
					<!--/ column -->
				<?php
					endwhile;
				}
				wp_reset_postdata();
				?>
    		</div>
    	</div>
    </div>
    <!--/ds-section-->