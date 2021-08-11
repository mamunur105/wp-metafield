<?php
/**
 * The plugin bootstrap file
 *
 * @link              https://codexin.com
 * @since             1.0.0
 * @package           Cdxn_Gallery
 */

/*
 * Plugin Name: Codexin Metabox
 * Plugin URI: http://wordpress.org/
 * Description: test.
 * Author: Codexin
 * Version: 1.0
 * Author URI: #
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'cdxn_metabox_plugin' ) ) {
	add_action( 'plugins_loaded', 'cdxn_metabox_plugin' );
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function cdxn_metabox_plugin() {
		if ( ! class_exists( 'Codexin\MetaboxesClasses\MetaboxLoded' ) ) {
			if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
				require_once dirname( __FILE__ ) . '/vendor/autoload.php';
			}
		}
		add_action( 'after_setup_theme', 'cdxn_metabox_setup_them' );

	}
}
if ( ! function_exists( 'cdxn_metabox_setup_them' ) ) {
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function cdxn_metabox_setup_them() {
		\load_plugin_textdomain(
			'cxnmetabox',
			false,
			dirname( __FILE__ ) . '/languages'
		);
		if ( class_exists( 'Codexin\MetaboxesClasses\MetaboxLoded' ) ) {
			$metabox = Codexin\MetaboxesClasses\MetaboxLoded::init();
			$metabox->metaboxes();
		}
	}
}


require_once dirname( __FILE__ ) . '/sample-metabox.php';
