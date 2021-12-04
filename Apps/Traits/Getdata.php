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
				if ( is_array( $values[ $fld['id'] ] ) ) {
					$array_root_value = isset( $values[ $fld['id'] ][0] ) ? $values[ $fld['id'] ][0] : $values[ $fld['id'] ];
				} else {
					$array_root_value = $values[ $fld['id'] ];
				}
				$main                    = maybe_unserialize( $array_root_value );
				$new_value[ $fld['id'] ] = $main;
			}
		}
		return $new_value;
	}
	/**
	 * Undocumented function
	 *
	 * @param [type] $value gield value.
	 * @return mixed
	 */
	// public function make_unserialize( $value ) {
	// $main = maybe_unserialize( $value );
	// $main = array_map('maybe_unserialize', $value );
	// if ( is_array( $main ) ) {
	// foreach ($main as $val ) {
	// $main = maybe_unserialize( $val );
	// }
	// } else {
	// $main = maybe_unserialize( $main );
	// }
	// error_log( print_r( $main, true ), 3, __DIR__ . '/log.txt' );
	// return $main;
	// }

}
