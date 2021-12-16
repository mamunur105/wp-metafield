<?php
/**
 * Field displayed by this function.
 *
 * @package    Tinyfield Metabox
 * @subpackage Tinyfield_Metaboxes
 */

namespace Tiny\Init;

use Tiny\Init\Traits\Singleton;
use Tiny\Init\Controller\Post_Metabox;
use Tiny\Init\Controller\Options;

/**
 * Display Metabox.
 */
class Loaded {
	use Singleton;
	/**
	 * Metaboxes.
	 */
	private function __construct() {
		if ( ! defined( 'TINYFIELD_VERSION' ) ) {
			define( 'TINYFIELD_VERSION', '1.0.0.2' );
		}
		if ( ! defined( 'TINYFIELD_PLUGIN_NAME' ) ) {
			define( 'TINYFIELD_PLUGIN_NAME', 'tinyfield' );
		}
		if ( ! defined( 'TINYFIELD_URL' ) ) {
			define( 'TINYFIELD_URL', $this->get_url_info_from_file( TINYFIELD_PLUGIN_DIR . '/Apps' )['url'] );
		}
		if ( ! defined( 'TINYFIELD_ASSETS' ) ) {
			define( 'TINYFIELD_ASSETS', TINYFIELD_URL . 'assets' );
		}
		$this->suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		$this->settings();
	}

	/**
	 * Metaboxes.
	 *
	 * @return void
	 */
	public function settings() {
		$meta_boxes = apply_filters( 'tinyfield_post_meta_boxes', array(), 10, 1 );
		if ( is_array( $meta_boxes ) && count( $meta_boxes ) ) {
			foreach ( $meta_boxes as $meta_box ) {
				new Post_Metabox( $meta_box );
			}
		}
		$tiny_setting = apply_filters( 'tinyfield_setting', array(), 10, 1 );
		if ( is_array( $tiny_setting ) && count( $tiny_setting ) ) {
			foreach ( $tiny_setting as $setting ) {
				new Options( $setting );
			}
		}
		do_action( 'tinyfield_add_new_option_settings' );
	}
	/**
	 * Scripts.
	 *
	 * @return void
	 */
	public function admin_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Loader as all of the hooks are defined in that particular
		 * class.
		 *
		 * The Loader will then create the relationship between the defined
		 * hooks and the functions defined in this class.
		 */
		\wp_register_style(
			'tinyfield',
			TINYFIELD_ASSETS . '/scripts/admin.css',
			array(),
			TINYFIELD_VERSION,
			'all'
		);
		\wp_register_style(
			'select2',
			TINYFIELD_ASSETS . '/vendor/select2.min.css',
			array(),
			TINYFIELD_VERSION,
			'all'
		);
		\wp_register_script(
			'select2',
			TINYFIELD_ASSETS . '/vendor/select2.min.js',
			array( 'jquery' ),
			TINYFIELD_VERSION,
			true
		);
		\wp_register_script(
			'wp-color-picker-alpha',
			TINYFIELD_ASSETS . '/vendor/wp-color-picker-alpha.min.js',
			array( 'jquery', 'wp-color-picker' ),
			TINYFIELD_VERSION,
			true
		);
		\wp_register_script(
			'range-slider',
			TINYFIELD_ASSETS . '/vendor/range-slider.js',
			array(),
			TINYFIELD_VERSION,
			true
		);
		// \wp_enqueue_script(
		// 	'conditional-fields',
		// 	TINYFIELD_ASSETS . '/vendor/mf-conditional-fields.js',
		// 	array( 'jquery' ),
		// 	TINYFIELD_VERSION,
		// 	true
		// );
		\wp_enqueue_script(
			'tinyfieldgallery',
			TINYFIELD_ASSETS . '/scripts/admin.js',
			array( 'jquery' ),
			TINYFIELD_VERSION,
			true
		);
		wp_localize_script(
			'tinyfieldgallery',
			'admin_script',
			array(
				'adminurl' => admin_url( '/' ), // WordPress AJAX.
			)
		);
		wp_enqueue_media();
		wp_enqueue_style( 'tinyfield' );
	}
	/**
	 * File location to url.
	 *
	 * @param  string $file file path to convert.
	 * @return string Converted URL.
	 *  array
	 *    $url string Converted URL.
	 *    $location string location of dir (mu-plugins, plugins, theme)
	 */
	public function get_url_info_from_file( $file ) {
		$file     = wp_normalize_path( $file );
		$test_dir = pathinfo( $file );
		if ( ! $test_dir ) {
			return false;
		}
		$test_dir = trailingslashit( $test_dir['dirname'] );
		// Test if we are in the mu-plugins dir.
		if ( 0 === strpos( $test_dir, wp_normalize_path( WPMU_PLUGIN_DIR ) ) ) {
			return array(
				'url'      => trailingslashit( plugins_url( '', $file ) ),
				'location' => 'mu-plugins',
			);
		}
		// Test if we are in the plugins dir.
		if ( 0 === strpos( $test_dir, wp_normalize_path( WP_PLUGIN_DIR ) ) ) {
			return array(
				'url'      => trailingslashit( plugins_url( '', $file ) ),
				'location' => 'plugins',
			);
		}
		// Now let's test if we are in the theme dir.
		$theme_root = wp_normalize_path( get_theme_root() );
		if ( 0 === strpos( $file, $theme_root ) ) {
			// Ok, then use get_theme_root_uri.
			$url = set_url_scheme(
				trailingslashit(
					str_replace(
						untrailingslashit( $theme_root ),
						untrailingslashit( get_theme_root_uri() ),
						$test_dir
					)
				)
			);
			return array(
				'url'      => $url,
				'location' => 'theme',
			);
		}
	}
}

