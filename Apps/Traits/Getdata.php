<?php
/**
 * SIngleton.
 *
 * @package    Tinyfield Metabox
 * @subpackage Tinyfield_Metaboxes
 */

namespace Tiny\Init\Traits;

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
			$values = get_post_meta( $post_id );
			$values = apply_filters( 'tiny_prepare_meta_data', $values, $this->settings );
			$values = $this->meta_data_prepare( $values );
		}
		if ( 'option' === $this->settings['settings_type'] ) {
			$values = get_option( $field_id );
			$values = apply_filters( 'tiny_prepare_option_data', $values, $this->settings );
			$values = $this->option_data_prepare( $values );
		}

		return $values;
	}

	/**
	 * Undocumented function
	 *
	 * @param [array] $values settings value.
	 * @return array
	 */
	public function meta_data_prepare( $values ) {
		$new_value = array();
		if ( empty( $values ) ) {
			return $new_value;
		}
		foreach ( $this->settings['fields'] as $fld ) {
			if ( isset( $fld['id'] ) && isset( $values[ $fld['id'] ] ) ) {
				if ( isset( $values[ $fld['id'] ][0] ) ) {
					$value = maybe_unserialize( $values[ $fld['id'] ][0] );
				} else {
					$value = maybe_unserialize( $values[ $fld['id'] ] );
				}
				$new_value[ $fld['id'] ] = $value;
			} elseif ( isset( $fld['default'] ) ) {
				$new_value[ $fld['id'] ] = $fld['default'];
			}
		}
		return $new_value;
	}


	/**
	 * Undocumented function
	 *
	 * @param [array] $values settings value.
	 * @return array
	 */
	public function option_data_prepare( $values = array() ) {
		$new_value = array();
		error_log( print_r( $values, true ), 3, __DIR__ . '/log.txt' );
		foreach ( $this->settings['fields'] as $fld ) {
			if ( isset( $fld['id'] ) ) {
				if ( isset( $values[ $fld['id'] ] ) ) {
					$new_value[ $fld['id'] ] = maybe_unserialize( $values[ $fld['id'] ] );
				} elseif ( isset( $fld['default'] ) ) {
					$new_value[ $fld['id'] ] = $fld['default'];
				}
			}
		}
		return $new_value;
	}

}
