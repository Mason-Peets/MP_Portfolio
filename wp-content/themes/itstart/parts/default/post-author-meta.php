<?php

/**
 * Template part for displaying author Meta
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ItStart
 */
$itstart_author_description = get_the_author_meta('description');
$itstart_author_id          = get_the_author_meta('ID');
$itstart_current_user_id    = is_user_logged_in() ? wp_get_current_user()->ID : false;
?>

<div class="bs-info-author-block p-5 mb-5"> 
	<a class="ds-author-pic" href="#">
		<?php echo get_avatar(get_the_author_meta('ID'), 200, '', '', array('class' => 'ds_img')); ?>
	</a>
	<div class="ds-author-body">
	  <h4 class="media-heading"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php esc_html(the_author()); ?></a></h4>
	  <p>
		<?php
			if ('' === $itstart_author_description) {
				if ($itstart_current_user_id && $itstart_author_id === $itstart_current_user_id) {

					// Translators: %1$s: <a> tag. %2$s: </a>.
					printf(wp_kses_post(__('You haven&rsquo;t entered your Biographical Information yet. %1$sEdit your Profile%2$s now.', 'itstart')), '<a href="' . esc_url(get_edit_user_link($itstart_current_user_id)) . '">', '</a>');
				}
			} else {
				echo wp_kses_post($itstart_author_description);
			}
		?>
	  </p>
	</div>
</div>