<?php
/**
 * Field displayed by this function.
 *
 * @package    Tinyfield Metabox
 * @subpackage Tinyfield_Metaboxes
 */

namespace Tiny\Init\Abstracts;

use Tiny\Init\Traits\SanitizeTextOrArray;

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
	 * @param string $condition parent.
	 * @return string
	 */
	public function get_conditional_rules( $condition = array() ) {
		$container = isset( $condition['parent'] ) && ! empty( $condition['parent'] ) ? $condition['parent'] : '.fields-wrapper';
		$action    = isset( $condition['action'] ) && ! empty( $condition['action'] ) ? $condition['action'] : 'show';
		$logic     = isset( $condition['logic'] ) && ! empty( $condition['logic'] ) ? $condition['logic'] : 'or';
		$rules     = isset( $condition['rules'] ) && ! empty( $condition['rules'] ) ? $condition['rules'] : array();
		if ( empty( $rules ) ) {
			return false;
		}
		return json_encode(
			array(
				'container' => $container,
				'action'    => $action,
				'logic'     => $logic,
				'rules'     => $rules,
			)
		);
	}





}
