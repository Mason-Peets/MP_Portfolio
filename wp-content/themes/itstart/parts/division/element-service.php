<?php
$service_title 			= get_theme_mod('service_title', 'Our <span>Awesome</span> Services');
$service_subtitle		= get_theme_mod('service_subtitle', 'Our Service');
$service_contents		= get_theme_mod('service_contents', themes_get_service_default());
?>
<!--ds-section-->
    <div class="ds-section services">
    	<div class="container">
			<?php if (!empty($service_title)  || !empty($service_subtitle)) { ?>
				<div class="ds-section-heading text-center">
					<?php if (!empty($service_subtitle)) : ?>
						<h3 class="sub-title">
							<?php echo esc_html($service_subtitle); ?>
						</h3>
					<?php endif; ?>
					
					<?php if (!empty($service_title)) : ?>
						<h2 class="ititle">
							<?php echo wp_kses_post($service_title); ?>
						</h2>
					<?php endif; ?>					
				</div>
			<?php } ?>
			
    		<div class="row">
				<?php
					if (!empty($service_contents)) {
						$service_contents = json_decode($service_contents);
						$count = 1;
						foreach ($service_contents as $service_item) {
							$icon = !empty($service_item->icon_value) ? apply_filters('itstart_translate_single_string', $service_item->icon_value, 'Service section') : '';
							$subtitle = !empty($service_item->subtitle) ? apply_filters('itstart_translate_single_string', $service_item->subtitle, 'Service section') : '';
							$title = !empty($service_item->title) ? apply_filters('itstart_translate_single_string', $service_item->title, 'Service section') : '';
							$link = !empty($service_item->link) ? apply_filters('itstart_translate_single_string', $service_item->link, 'Service section') : '';
				?>
				<!-- column -->
					<div class="col-md-6 col-lg-4 ">
						<div class="ds-service wow zoomIn">
							<div class="ds-service-icon">
								<i class="fa <?php echo esc_attr($icon); ?>"></i>
							</div>
							
							<div class="ds-service-content">
								<h5 class="ds-title">
									<?php echo esc_html($title); ?>
								</h5>
								<p>
									<?php echo esc_html($subtitle); ?>
								</p>
								<div class="ds-service-button">
									<a href="<?php echo esc_url($link); ?>" class="btn btn-link"><?php echo esc_html__('Read More','itstart'); ?></a>
								</div>
							</div>
						</div>
					</div>
			<!--/ column -->
				<?php }
			} ?>	
    		</div>
    	</div>
    </div>
    <!--/ds-section-->