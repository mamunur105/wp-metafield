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
	 * ALl options data.
	 *
	 * @return array
	 */
	public function get_tiny_option( $field_id = '', $option_id = '' ) {
		if ( ! $option_id ) {
			return;
		}
		if ( ! $field_id ) {
			return;
		}
		$values = get_option( $option_id );
		$values = $this->option_data_prepare( $values, $option_id );
		return $values[ $field_id ];
	}

	/**
	 * Undocumented function
	 *
	 * @param [array] $values settings value.
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
}

/**
 * @return tinyfield
 */
function tinyfield() {
	return Frontend::init();
}

echo tinyfield()->get_tiny_option( 'toggleswitch_field_3', 'tinyfield_post_header_footer' );


