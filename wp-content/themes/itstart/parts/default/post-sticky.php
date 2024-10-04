<?php
$sticky_type= get_theme_mod('itstart_pro_sticky_type','circle');
$sticky_content= get_theme_mod('sticky_content','<i class="fa fa-thumb-tack"></i>');
if ( is_sticky() ) { ?>
	<?php 	if($sticky_type == 'circle') : ?>
		<span class="bg-sticky rounded-circle"><?php echo wp_kses_post($sticky_content); ?></span>
	<?php else : ?>	
		<span class="bg-sticky"><?php echo wp_kses_post($sticky_content); ?></span>
	<?php endif; ?>	
<?php } ?>