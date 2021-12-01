<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT;

use PS\INIT\Traits\Singleton;
use PS\INIT\Controller\Post_Metabox;
use PS\INIT\Controller\Options;

/**
 * Display Metabox.
 */
class Loaded {
	use Singleton;
	/**
	 * Metaboxes.
	 */
	private function __construct() {
		if ( ! defined( 'PSSMB_VERSION' ) ) {
			define( 'PSSMB_VERSION', '1.0.0.1' );
		}
		if ( ! defined( 'PSSMB_PLUGIN_NAME' ) ) {
			define( 'PSSMB_PLUGIN_NAME', 'pssmetaboxes' );
		}
		if ( ! defined( 'PSSMB_URL' ) ) {
			define( 'PSSMB_URL', $this->get_url_info_from_file( PSSMB_PLUGIN_DIR . '/Apps' )['url'] );
		}
		if ( ! defined( 'PSSMB_ASSETS' ) ) {
			define( 'PSSMB_ASSETS', PSSMB_URL . 'assets' );
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
		$meta_boxes = apply_filters( 'pico_meta_boxes', array(), 10, 1 );
		if ( is_array( $meta_boxes ) && count( $meta_boxes ) ) {
			foreach ( $meta_boxes as $meta_box ) {
				new Post_Metabox( $meta_box );
			}
		}
		$pico_setting = apply_filters( 'pico_setting', array(), 10, 1 );
		if ( is_array( $pico_setting ) && count( $pico_setting ) ) {
			foreach ( $pico_setting as $setting ) {
				new Options( $setting );
			}
		}
		// $tex_meta = apply_filters( 'pico_tex_meta_boxes', array(), 10, 1 );
		// if ( is_array( $tex_meta ) && count( $tex_meta ) ) {
		// foreach ( $tex_meta as $tex ) {
		// new Tax_Metabox( $tex );
		// }
		// }
		do_action( 'pico_add_new_option_settings' );
	}
	/**
	 * ALl options data.
	 *
	 * @return array
	 */
	public function get_option() {
		return wp_load_alloptions();
	}

	/**
	 * ALl options data.
	 *
	 * @return array
	 */
	public function get_meta( $type = 'post', $post_id ) {
		$post_id = absint( $post_id );
		if ( $post_id ) {
			return false;
		}
		return get_metadata( $type, $post_id );
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
			'pssmetabox',
			PSSMB_ASSETS . '/scripts/admin.css',
			array(),
			PSSMB_VERSION,
			'all'
		);
		\wp_register_style(
			'select2',
			PSSMB_ASSETS . '/vendor/select2.min.css',
			array(),
			PSSMB_VERSION,
			'all'
		);
		\wp_register_script(
			'select2',
			PSSMB_ASSETS . '/vendor/select2.min.js',
			array( 'jquery' ),
			PSSMB_VERSION,
			true
		);
		\wp_register_script(
			'wp-color-picker-alpha',
			PSSMB_ASSETS . '/vendor/wp-color-picker-alpha.min.js',
			array( 'jquery', 'wp-color-picker' ),
			PSSMB_VERSION,
			true
		);
		\wp_register_script(
			'range-slider',
			PSSMB_ASSETS . '/vendor/range-slider.js',
			array(),
			PSSMB_VERSION,
			true
		);
		\wp_enqueue_script(
			'pssgallery-admin',
			PSSMB_ASSETS . '/scripts/admin.js',
			array( 'jquery' ),
			PSSMB_VERSION,
			true
		);
		wp_localize_script(
			'pssgallery-admin',
			'admin_script',
			array(
				'adminurl' => admin_url( '/' ), // WordPress AJAX.
			)
		);
		wp_enqueue_style( 'pssmetabox' );
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
