<!--===// Start: Preloader =================================-->
<?php
$hide_show_social_icon = get_theme_mod('hide_show_social_icon', '1');
$hide_show_email_details = get_theme_mod('hide_show_email_details', '1');
$hide_show_cntct_details = get_theme_mod('hide_show_cntct_details', '1');
$hide_show_search = get_theme_mod('hide_show_search', '1');
$tlh_email = get_theme_mod('tlh_email', ' email@example.com ');
$tlh_email_icon = get_theme_mod('tlh_email_icon', 'fa-envelope');
$tlh_contct_icon = get_theme_mod('tlh_contct_icon', ' fa-map-marker');
$tlh_contact_address = get_theme_mod('tlh_contact_address', ' New York City Road254');
$tlh_btn_lbl = get_theme_mod('tlh_btn_lbl', 'Buy Now');
$tlh_btn_link = get_theme_mod('tlh_btn_link', '#');

do_action('itstart_preloader');
?>
<!--===// End: Preloader =================================-->

<!--header-->
	<header class="header-default">
		<div class="header-top">
		   <div class="container">
			  <div class="row">
				<!-- column -->
				<div class="col-lg-6">
					<div class="social-date">
						<?php if ($hide_show_email_details == '1') : ?>
							<div class="head_widget">
							   <i class="fa <?php echo esc_attr($tlh_email_icon); ?>"></i>
							   <div class="media-body">
								   <h5 class="mt-0"><?php echo esc_html($tlh_email); ?></h5>
							   </div>
						   </div>
						<?php endif; ?>	
						   
						<?php if ($hide_show_cntct_details == '1') : ?>
						   <div class="head_widget">
								<i class="fa <?php echo esc_attr($tlh_contct_icon); ?>"></i>
							   <div class="media-body">
								  <h5 class="mt-0"><?php echo esc_html($tlh_contact_address); ?></h5>
							   </div>
							</div>
						<?php endif; ?>	
					</div>
				</div>
				<!--/ column -->
				<!-- column -->
				<div class="col-lg-6">
					<ul class="ds-social info-right">
						<?php if ($hide_show_social_icon == '1') : ?>
							<?php do_action('themes_social'); ?>
						<?php endif; ?>					   
					</ul>
				</div>
				<!--/ column -->
			  </div>
		   </div>
		</div>
		<!-- Header Top -->
		<div class="header-middle">
		   <div class="container">
			  <div class="main">
				 <div class="logo">
					<?php do_action('themes_logo'); ?>
				 </div>
				 <div class="header-menu">
					<button  class="menu-btn btn btn-primary">
					   <i class="fa fa-bars"></i>
					</button>
					<nav id="main-nav" class="nav-wp">
						<div class="nav-inner">
							<div class="logo-nav">
								<?php do_action('themes_logo'); ?>
									
								<a href="javascript:void(0);" class="close-nav"><i class="fa fa-times"></i></a>
							</div>
							
							<?php do_action('themes_primary_menu'); ?>
						   
							<!-- right-bar -->
							<div class="right-bar">
							<?php if ($hide_show_search == '1') : ?>
								<div class="search-bar">
									<a href="#" aria-label="<?php echo esc_attr__('search', 'itstart'); ?>"  class="search" id="quik-search-btn">
									  <i class="fa fa-search"></i>
									</a>								
									<div class="ds-quik-search">
										<form method="get" action="#" aria-label="<?php echo esc_attr__('Search', 'itstart'); ?>">
											<input name="s" type="seacrh" class="form-control" placeholder="Enter Your Keyword ...">
											<span id="quik-search-remove"><i class="fa fa-close"></i></span>
										</form>
									</div>
								</div>
							<?php endif; ?>							  
							
							<?php if (!empty($tlh_btn_lbl)) :  ?>
								<div class="search-button">
								  <a href="<?php echo esc_url($tlh_btn_link); ?>" class="btn btn-primary"><?php echo esc_html($tlh_btn_lbl); ?></a>
								</li>
							  <?php endif; ?>								
							</div>
							
							<?php if ($hide_show_social_icon == '1') : ?>
								<?php do_action('themes_social'); ?>
							<?php endif; ?>								
							<!-- /right-bar -->
						</div>
					</nav>					
				 </div>
			  </div>
		   </div>
		</div>
    </header>
    <!--/header-->