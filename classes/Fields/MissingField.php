<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Fields;

use PS\INIT\GetFields;
/**
 * Display Input.
 */
class MissingField extends GetFields {
	/**
	 * Get instance;
	 *
	 * @var obaject
	 */
	protected static $instance;

	/**
	 * Create instance
	 *
	 * @param array $field is an array value.
	 * @return object
	 */
	public static function init( $field = array() ) {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		self::$instance->field = $field;
		return self::$instance;
	}

	/**
	 * Return input field.
	 *
	 * @return mixed
	 */
	public function get_field() {
		$message = __( 'Something went wrong here => ', 'psnmetabox' ) . $this->field['id'];
		$class   = 'ps-notice ps-notice-error';
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
	}

}
