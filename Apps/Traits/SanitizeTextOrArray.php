<?php
/**
 * SIngleton.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace Tiny\Init\Traits;

trait SanitizeTextOrArray {

	/**
	 * Recursive sanitation for text or array
	 *
	 * @param array|string $input srray or string value.
	 * @since  0.1
	 * @return mixed
	 */
	public function sanitize_text_or_array_field( $input ) {
		$input = maybe_unserialize( $input );
		return ! empty( $input ) ? array_map( 'sanitize_text_field', array_filter( $input ) ) : array();
	}

}
