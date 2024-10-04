<!--===// Start: Slider =================================-->
<?php 
$slider = get_theme_mod('slider', themes_get_slider_default()); 
if (!empty($slider)) {
    $slider = json_decode($slider);
?>
<!--/hero-->
    <section class="ds-section hero">
		<!-- Swiper -->
		<div class="swiper overflow-hidden home-slider" id="ds-slider">
		<div class="swiper-wrapper">
			<?php
                $count = 0;
                foreach ($slider as $slide_item) {
                    $title = !empty($slide_item->title) ? apply_filters('itstart_translate_single_string', $slide_item->title, 'slider section') : '';
                    $text = !empty($slide_item->text) ? apply_filters('itstart_translate_single_string', $slide_item->text, 'slider section') : '';
                    $button = !empty($slide_item->text2) ? apply_filters('itstart_translate_single_string', $slide_item->text2, 'slider section') : '';
                    $link = !empty($slide_item->link) ? apply_filters('itstart_translate_single_string', $slide_item->link, 'slider section') : '';
                    $image = !empty($slide_item->image_url) ? apply_filters('itstart_translate_single_string', $slide_item->image_url, 'slider section') : '';
                    $image2 = !empty($slide_item->image_url2) ? apply_filters('itstart_translate_single_string', $slide_item->image_url2, 'slider section') : '';
                    $active_class = ($count == 0) ? 'active' : '';
            ?>
				<!-- swiper slide -->
				<div class="swiper-slide slide-overlay" <?php if(!empty($image)){ ?> style="background-image:url('<?php echo esc_url($image); ?>');" <?php } ?>>
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6">
							  <div class="hero-left">
								<h2>
									<?php echo esc_html($title); ?>
								</h2>
								<p><?php echo esc_html($text); ?></p>
								
								<?php if (!empty($link) && !empty($button)): ?>
									<a href="<?php echo esc_url($link); ?>" class="btn btn-primary"><?php echo esc_html($button); ?></a>
								<?php endif; ?>								 
							  </div>
							</div>
							<div class="col-lg-6">
								<?php if(!empty($image2)){ ?>
									<div class="hero-right">
										<img src="<?php echo esc_url($image2); ?>" class="img-fluid" alt="<?php echo esc_attr__('Image','itstart'); ?>">
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<!-- /swiper slide -->
			<?php 
                $count++;
                }
            ?>
		</div>
		<div class="swiper-button-next"><i class="fa fa-long-arrow-right"></i></div>
		<div class="swiper-button-prev"><i class="fa fa-long-arrow-left"></i></div>
	</div>
</section>
<!--/hero-->
<?php } ?>
<!--===// End: Slider -->