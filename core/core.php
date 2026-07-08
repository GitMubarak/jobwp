<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Trait: Core
 * 
 * Build and sanitize settings from raw request data.
 *
 * Expects raw $_POST data.
 * Each field is unslashed and sanitized according to its type.
 *
 * @param array $fields Field definitions.
 * @param array $post   Raw $_POST data.
 * @return array
 */
trait Jobwp_Core
{
	protected function jobwp_build_set_settings_options( $fields, $post ) {

    	$set_data = [];
		
		$sanitizers = [

			'text'      => 'sanitize_text_field',
			'textarea'  => 'sanitize_textarea_field',
			'editor'    => 'wp_kses_post',
			'url'       => 'esc_url_raw',
			'email'     => 'sanitize_email',
			'number'	=> 'intval',
			'string'    => 'sanitize_text_field',
		];

		foreach ( $fields as $value ) {
			
			if ( 'boolean' === $value['type'] ) {

				$set_data[$value['name']] = ! empty( $post[$value['name']] ) ? $post[$value['name']] : $value['default'];
			}

			if ( 'multipe_checkbox' === $value['type'] ) {
	
				$set_data[$value['name']] = isset( $post[$value['name']] ) && is_array( $post[$value['name']] ) ? $this->array_sanitize( $post[$value['name']] ) : $value['default'];
			}

			if ( isset( $sanitizers[ $value['type'] ] ) ) {

				$callback = $sanitizers[ $value['type'] ];

				$set_data[ $value['name'] ] = isset( $post[ $value['name'] ] ) ? call_user_func( $callback, wp_unslash( $post[ $value['name'] ] ) ) : $value['default'];
			}
    	}
		
		return $set_data;
	}

  	public function array_sanitize( $input ) {

		$new_input = array();
	
		foreach ( $input as $key => $val ) {
			
			$new_input[ $key ] = ( isset( $input[ $key ] ) ) ? sanitize_text_field( wp_unslash( $val ) ) : '';
		}
	
		return $new_input;
	}

	protected function jobwp_build_get_settings_options( $fields, $settings ) {
		
		$get_data = [];

		foreach ( $fields as $value ) {
	
			$get_data[$value['name']] = isset( $settings[$value['name']] ) ? $settings[$value['name']] : $value['default'];
		}

		return $get_data;
	}
}