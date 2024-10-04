<?php
/**
Template Name: Fullwidth Page
**/

get_header();
itstart_breadcrumbs_style();
?>
<section class="blog-section">
	<div class="container">
		<div class="row">
			<?php 		
				the_post(); the_content(); 
				
				if( $post->comment_status == 'open' ) { 
					 comments_template( '', true ); // show comments 
				}
			?>
		</div>
	</div>
</section> 
<?php get_footer(); ?>

