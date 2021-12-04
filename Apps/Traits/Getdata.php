<?php
/**
 * SIngleton.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Traits;

trait Getdata {

	/**
	 * Undocumented function.
	 *
	 * @return Mixed
	 */
	public function get_value( $post_id = null ) {
		$values   = array();
		$field_id = sanitize_text_field( $this->settings['id'] );
		if ( 'post_types' === $this->settings['settings_type'] ) {
			if ( ! $post_id ) {
				global $post;
				$post_id = $post->ID;
			}
			$values = get_post_meta( $post->ID );
			$values = apply_filters( 'pico_prepare_meta_data', $values, $this->settings );
		}
		if ( 'option' === $this->settings['settings_type'] ) {
			$values = get_option( $field_id );
			$values = apply_filters( 'pico_prepare_option_data', $values, $this->settings );
		}

		return $this->data_prepare( $values );
	}

	/**
	 * Undocumented function
	 *
	 * @param [array] $values settings value.
	 * @return array
	 */
	public function data_prepare( $values ) {
		$new_value = array();
		if ( empty( $values ) ) {
			return $new_value;
		}
		foreach ( $this->settings['fields'] as $fld ) {
			if ( isset( $fld['id'] ) && isset( $values[ $fld['id'] ] ) ) {

				$new_value[ $fld['id'] ] = $values[ $fld['id'] ];
			}
		}
		return $new_value;
	}

}
