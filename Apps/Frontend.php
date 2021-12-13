<?php
/**
 * Field displayed by this function.
 *
 * @package    Tinyfield Metabox
 * @subpackage Tinyfield_Metaboxes
 */

namespace Tiny\Init;

use Tiny\Init\Traits\Singleton;
use Tiny\Init\Controller\Post_Metabox;
use Tiny\Init\Controller\Options;
use Tiny\Init\Traits\Getdata;

/**
 * Display Metabox.
 */
class Frontend {
	use Singleton;
	/**
	 * Undocumented function
	 *
	 * @param string $option_id Option group id.
	 * @return mixed
	 */
	public function get_tiny_options( $option_id = '' ) {
		if ( ! $option_id ) {
			return false;
		}
		$values = get_option( $option_id );
		$values = json_decode( $values, true );
		$values = $this->option_data_prepare( $values, $option_id );
		return $values;
	}
	/**
	 * Undocumented function
	 *
	 * @param string $field_id Option field is.
	 * @param string $option_id Option group id.
	 * @return mixed
	 */
	public function get_tiny_option( $field_id = '', $option_id = '' ) {
		if ( ! $option_id ) {
			return false;
		}
		if ( ! $field_id ) {
			return false;
		}
		$values = $this->get_tiny_options( $option_id );
		return $values[ $field_id ];
	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $post_id post id.
	 * @return mixed
	 */
	public function get_tiny_post_meta( $post_id = null ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}
		$values = get_post_meta( $post_id );
		$values = $this->meta_data_prepare( $values );
		return $values;
	}
	/**
	 * Undocumented function
	 *
	 * @param [type] $field_id meta field id.
	 * @param [type] $post_id post id.
	 * @return mixed
	 */
	public function get_tiny_post_meta_by_id( $field_id, $post_id = null ) {
		if ( ! $field_id ) {
			return false;
		}
		$values = $this->get_tiny_post_meta( $post_id );
		return $values[ $field_id ];
	}

	/**
	 * Undocumented function
	 *
	 * @param [array] $values settings value.
	 * @param [array] $option_id settings id.
	 * @return array
	 */
	public function option_data_prepare( $values = array(), $option_id ) {
		$new_value    = array();
		$tiny_setting = apply_filters( 'tinyfield_setting', array(), 10, 1 );
		if ( is_array( $tiny_setting ) && count( $tiny_setting ) ) {
			foreach ( $tiny_setting as $setting ) {
				if ( isset( $setting['id'] ) && isset( $setting['fields'] ) && $option_id === $setting['id'] ) {
					foreach ( $setting['fields'] as $fld ) {
						if ( isset( $values[ $fld['id'] ] ) ) {
							$new_value[ $fld['id'] ] = maybe_unserialize( $values[ $fld['id'] ] );
						} elseif ( isset( $fld['default'] ) ) {
							$new_value[ $fld['id'] ] = $fld['default'];
						}
					}
				}
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
	public function meta_data_prepare( $values ) {
		$new_value  = array();
		$meta_boxes = apply_filters( 'tinyfield_post_meta_boxes', array(), 10, 1 );
		if ( is_array( $meta_boxes ) && count( $meta_boxes ) ) {
			foreach ( $meta_boxes as $meta ) {
				if ( isset( $meta['id'] ) && isset( $meta['fields'] ) ) {
					foreach ( $meta['fields'] as $fld ) {
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
				}
			}
		}

		return $new_value;
	}




}
