<?php
/**
 * The plugin bootstrap file
 *
 * @link              https://tinyfield.com
 * @since             1.0.0
 * @package           ps_Gallery
 */

/*
 * Plugin Name: Tinyfield Option and metabox
 * Plugin URI: http://wordpress.org/
 * Description: test.
 * Author: tinysolution
 * Version: 1.0.0.3
 * Author URI: #
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'tinyfield_plugin' ) ) {
	add_action( 'plugins_loaded', 'tinyfield_plugin' );
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function tinyfield_plugin() {

		define( 'TINYFIELD_PLUGIN_DIR', __DIR__ );
		if ( ! class_exists( 'Tiny\Init\MetaboxLoded' ) ) {
			if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
				require_once dirname( __FILE__ ) . '/vendor/autoload.php';
			}
		}
		add_action( 'after_setup_theme', 'tinyfield_setup_them' );

	}
}
if ( ! function_exists( 'tinyfield_setup_them' ) ) {
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function tinyfield_setup_them() {
		\load_plugin_textdomain(
			'tinyfield',
			false,
			dirname( __FILE__ ) . '/languages'
		);
		if ( class_exists( 'Tiny\Init\Loaded' ) ) {
			Tiny\Init\Loaded::init();
		}
	}
}


require_once dirname( __FILE__ ) . '/sample-metabox.php';
