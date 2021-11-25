<?php
/**
 * The plugin bootstrap file
 *
 * @link              https://picosoft.com
 * @since             1.0.0
 * @package           ps_Gallery
 */

/*
 * Plugin Name: Picofield
 * Plugin URI: http://wordpress.org/
 * Description: test.
 * Author: Picosoft
 * Version: 1.0
 * Author URI: #
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'pssmetabox_plugin' ) ) {
	add_action( 'plugins_loaded', 'pssmetabox_plugin' );
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function pssmetabox_plugin() {

		define( 'PSSMB_PLUGIN_DIR', __DIR__ );
		if ( ! class_exists( 'PS\INIT\MetaboxLoded' ) ) {
			if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
				require_once dirname( __FILE__ ) . '/vendor/autoload.php';
			}
		}
		add_action( 'after_setup_theme', 'pssmetabox_setup_them' );

	}
}
if ( ! function_exists( 'pssmetabox_setup_them' ) ) {
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function pssmetabox_setup_them() {
		\load_plugin_textdomain(
			'psnmetabox',
			false,
			dirname( __FILE__ ) . '/languages'
		);
		if ( class_exists( 'PS\INIT\Loaded' ) ) {
			PS\INIT\Loaded::init();
		}
	}
}


require_once dirname( __FILE__ ) . '/sample-metabox.php';
