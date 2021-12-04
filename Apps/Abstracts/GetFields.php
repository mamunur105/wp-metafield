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

}
