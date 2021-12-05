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

}
