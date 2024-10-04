<?php  
$feature_title 			= get_theme_mod('feature_title','Mind Blowing Feature');
$feature_subtitle		= get_theme_mod('feature_subtitle','Our Feature');
$feature_contents		= get_theme_mod('feature_contents',themes_get_feature_default()); ?>	
	
	 <!--ds-section-->
    <div class="ds-section features" >
		<div class="container" >
			<div class="row align-items-center">
				<?php
					if ( ! empty( $feature_contents ) ) {
					$feature_contents = json_decode( $feature_contents );
					foreach ( $feature_contents as $feature_item ) {
					$title = ! empty( $feature_item->title ) ? apply_filters( 'itstart_translate_single_string', $feature_item->title, 'Feature section' ) : '';
					$subtitle = ! empty( $feature_item->subtitle ) ? apply_filters( 'itstart_translate_single_string', $feature_item->subtitle, 'Feature section' ) : '';
					$link = ! empty( $feature_item->link ) ? apply_filters( 'itstart_translate_single_string', $feature_item->link, 'Feature section' ) : '';	
					$icon = ! empty( $feature_item->icon_value ) ? apply_filters( 'itstart_translate_single_string', $feature_item->icon_value, 'Feature section' ) : '';
				?>
					<!-- column -->
					<div class="col-md-6 col-lg-4">
					  <div class="ds-feature hover_eff">
							<div class="ds-feature-body">
								<h5 class="ds-title mt-0"><?php echo esc_html($title); ?></h5>
								<p><?php echo esc_html($subtitle); ?></p>
							</div>
							<div class="ds-feature-icon">
								<i class="fa <?php echo esc_attr($icon); ?>"></i>
							</div>
						</div>
					</div>
					<!--/ column -->
				<?php } } ?>
		  </div>
		</div>
	</div>
    <!--/ds-section-->