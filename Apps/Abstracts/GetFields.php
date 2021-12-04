<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Abstracts;

use PS\INIT\Traits\SanitizeTextOrArray;

/**
 * Display Metabox.
 */
abstract class GetFields {
	use SanitizeTextOrArray;
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
	 * Undocumented function
	 *
	 * @return mixed
	 */
	// public function get_settings_value( $id ) {
	// 	$value = null;
	// 	if ( $id ) {
	// 		$get_values = maybe_unserialize( $this->field['prev_value'] );
	// 		$value      = maybe_unserialize( $get_values[ $id ][0] );
	// 	}
	// 	if ( is_serialized( $value ) ) {
	// 		$value = maybe_unserialize( $value );
	// 	}
	// 	// error_log( print_r( maybe_unserialize( $value ), true ), 3, __DIR__ . '/log.txt' );
	// 	return $value;
	// }




}
