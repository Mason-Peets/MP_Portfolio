<?php
$funfact_contents		= get_theme_mod('funfact_contents', themes_get_funfact_default()); 
$funfact_bg_img		= get_theme_mod('funfact_bg_img', get_stylesheet_directory_uri() . '/assets/images/slider.png'); 
?>
<!--ds-section-->
    <div class="ds-section funfacts" <?php if(!empty($funfact_bg_img)){ ?>  style="background:url('<?php echo esc_url( $funfact_bg_img	); ?>');" <?php } ?>>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12">
              <div class="row text-center">
				<?php
					if (!empty($funfact_contents)) {
					$funfact_contents = json_decode($funfact_contents);
					foreach ($funfact_contents as $funfact_item) {
						$title = !empty($funfact_item->title) ? apply_filters('itstart_translate_single_string', $funfact_item->title, 'Funfact section') : '';
						$subtitle = !empty($funfact_item->subtitle) ? apply_filters('itstart_translate_single_string', $funfact_item->subtitle, 'Funfact section') : '';
						$icon = !empty($funfact_item->icon_value) ? apply_filters('itstart_translate_single_string', $funfact_item->icon_value, 'Funfact section') : '';
				?>		
					<!-- column -->
						<div class="col-lg-3 col-md-6 col-sm-6">
						  <div class="ds-funfact ">
							<div class="ds-fun-icon">
								<i class="fa <?php echo esc_attr($icon); ?>"></i>
							</div>
							<div class="ds-fun-content">
								<h5 class="ds-title"><span class="counter"><?php echo esc_html($title); ?></span>k</h5>
								<?php if (!empty($subtitle)) { ?>
									<p>
										<?php echo esc_html($subtitle); ?>
									</p>
								<?php } ?>
								
							</div>
						  </div>
						</div>
					<!--/ column -->
				<?php }
			} ?>
              </div>
            
          </div>
        </div>
      </div>
     
    </div>

    <!--/ds-section-->