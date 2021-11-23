<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Abstracts;

/**
 * Display Metabox.
 */
abstract class GetFields {

	/**
	 * Field.
	 *
	 * @var array
	 */
	protected $field = null;

	/**
	 * Return input field.
	 *
	 * @return mixed
	 */
	abstract public function get_field();

	/**
	 * Recursive sanitation for text or array
	 *
	 * @param array|string $array_or_string srray or string value.
	 * @since  0.1
	 * @return mixed
	 */
	public function sanitize_text_or_array_field( $array_or_string ) {
		if ( empty( $array_or_string ) ) {
			$array_or_string = '';
		} elseif ( is_string( $array_or_string ) ) {
			$array_or_string = sanitize_text_field( $array_or_string );
		} elseif ( is_array( $array_or_string ) ) {
			foreach ( $array_or_string as $key => &$value ) {
				if ( is_array( $value ) ) {
					$value = $this->sanitize_text_or_array_field( $value );
				} else {
					$value = sanitize_text_field( $value );
				}
			}
		}
		return $array_or_string;
	}

}
