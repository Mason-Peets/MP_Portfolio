<?php
$footer_copyright     = get_theme_mod('footer_copyright', 'Copyright &copy; [current_year] | Powered by [theme_author]');
$theme_copyright_allowed_tags = array(
  '[current_year]' => date_i18n('Y', current_time('timestamp')),
  '[site_title]'   => get_bloginfo('name'),
  '[theme_author]' => sprintf(__('<a href="#">ITStart</a>', 'itstart')),
);
?>
<!--ds-Footer-->
  <footer class="ds-section footer">
    <div class="ds-inner">
      <div class="top">
        <div class="container">
          <div class="row">
			<?php if (is_active_sidebar('itstart-footer')) :         
				dynamic_sidebar('itstart-footer');       
				endif;
			?>           
          </div>
        </div>
      </div>
      <div class="bottom">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 text-center">
				<span>
					<?php
						echo apply_filters('theme_footer_copyright', wp_kses_post(themes_str_replace_assoc($theme_copyright_allowed_tags, $footer_copyright)));
					?>
				</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ds-Footer-->
<!-- ScrollUp -->
<?php
$hs_scroller   = get_theme_mod('hs_scroller', '1');
if ($hs_scroller == '1') :
?>
  <!-- scroll-top -->
  <!-- top-scroll  -->
  	<a href="#" class ="ds-scroll"  id="backToTop">
		<span id="progress-value"></span>
		<i class="fa fa-arrow-up"></i> 
	</a>
	<!--/ top-scroll  -->
<?php endif; ?>

<?php
wp_footer(); ?>
</body>

</html>