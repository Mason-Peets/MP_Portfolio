<?php
function itstart_repeater_register( $wp_customize ) {

	require_once ITSTART_PARENT_INC_DIR . '/customizer/customizer-repeater/class/customizer-repeater-control.php';
	
}
add_action( 'customize_register', 'itstart_repeater_register' );

function itstart_repeater_sanitize($input){
	$input_decoded = json_decode($input,true);

	if(!empty($input_decoded)) {
		foreach ($input_decoded as $boxk => $box ){
			foreach ($box as $key => $value){

					switch ( $key ) {
						case 'icon_value':
							$input_decoded[$boxk][$key] = sanitize_key( $value );
							break;
						
						case 'link':
							$input_decoded[$boxk][$key] = esc_url_raw( $value );
							break;

						default:
							$input_decoded[$boxk][$key] = wp_kses_post( force_balance_tags( $value ) );
					}

			}
		}
		return json_encode($input_decoded);
	}
	return $input;
}
