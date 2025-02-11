<?php
/**
 * itstart icon picker
 */
  if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}
	class ItStart_Icon_Picker_Control extends WP_Customize_Control {

		public $type = 'itstart-icon-picker';

		public $iconset = array();

		public function to_json() {
			if ( empty( $this->iconset ) ) {
				$this->iconset = 'fa';
			}
			$iconset               = $this->iconset;
			$this->json['iconset'] = $iconset;
			parent::to_json();
		}

		public function enqueue() {
			wp_enqueue_script( 'itstart-icon-picker-ddslick-min', get_template_directory_uri() . '/inc/customizer/custom-controls/controls/icon-picker/assets/js/jquery.ddslick.js', array( 'jquery' ) );
			wp_enqueue_script( 'itstart-icon-picker-control', get_template_directory_uri() . '/inc/customizer/custom-controls/controls/icon-picker/assets/js/icon-picker-control.js', array( 'jquery', 'itstart-icon-picker-ddslick-min' ), '', true );
			wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/fonts/font-awesome/css/font-awesome.css' );
		}

		public function render_content() {
			if ( empty( $this->choices ) ) {
				require_once ITSTART_PARENT_INC_DIR . '/customizer/custom-controls/controls/icon-picker/inc/fa-icons.php';
				$this->choices = itstart_font_awesome_list();
			}
		?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
				<select class="itstart-icon-picker-icon-control" id="<?php echo esc_attr( $this->id ); ?>">
					<?php foreach ( $this->choices as $value => $label ) : ?>
						<option value="<?php echo esc_attr( $value ); ?>" <?php echo selected( $this->value(), $value, false ); ?> data-iconsrc="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		<?php }

	}

