<?php
/**
 * Field displayed by this function.
 *
 * @package    Tinyfield Metabox
 * @subpackage Tinyfield_Metaboxes
 */

namespace Tiny\Init\Fields;

use Tiny\Init\Abstracts\GetFields;
use Tiny\Init\Traits\Singleton;
/**
 * Display Input.
 */
class MissingField extends GetFields {
	use Singleton;
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
