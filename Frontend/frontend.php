<?php
use Tiny\Init\Frontend;
/**
 * @return tinyfield
 */
function tinyfield() {
	return Frontend::init();
}
/**
 * Undocumented function
 *
 * @param [type] $field_id field id for get value.
 * @param [type] $option_id option id.
 * @return mixed
 */
function get_tiny_options( $option_id ) {
	return tinyfield()->get_tiny_options( $option_id );
}

/**
 * Undocumented function
 *
 * @param [type] $field_id field id for get value.
 * @param [type] $option_id option id.
 * @return mixed
 */
function get_tiny_option( $field_id, $option_id ) {
	return tinyfield()->get_tiny_option( $field_id, $option_id );
}

/**
 * Undocumented function
 *
 * @param [type] $post_id Meta post id.
 * @return mixed
 */
function get_tiny_post_meta( $post_id = null ) {
	return tinyfield()->get_tiny_post_meta( $post_id );
}

/**
 * Undocumented function
 *
 * @param [type] $post_id Meta post id.
 * @return mixed
 */
function get_tiny_post_meta_by_id( $field_id, $post_id = null ) {
	return tinyfield()->get_tiny_post_meta_by_id( $field_id, $post_id );
}
