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
	 * @return Mixed
	 */
	public function get_settings_value() {
		$value = '';
		if ( 'metabox_settings' === $this->field['settings_type'] ) {
			global $post;
			$value = get_post_meta( $post->ID, $this->field['id'], true );
			if ( ! $value && ! metadata_exists( $post->post_type, $post->ID, $this->field['id'] ) ) {
				$value = $this->field['default'];
			}
		}
		if ( 'options_settings' === $this->field['settings_type'] ) {
			$value = get_option( $this->field['id'] );
		}
		return $value;
	}

}
