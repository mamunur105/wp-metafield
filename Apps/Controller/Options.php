<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Controller;

/**
 * Display Metabox.
 */
class Options {
	/**
	 * Undocumented variable.
	 *
	 * @var array
	 */
	private $options;

	/**
	 * Undocumented variable.
	 *
	 * @var array
	 */
	private $settings = array();

	/**
	 * Undocumented function.
	 *
	 * @param array $settings field and settings.
	 */
	public function __construct( $settings = array() ) {
		$this->settings = $settings;
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );

	}

	/**
	 * Add options page
	 */
	public function add_plugin_page() {
		if( is_array( $this->settings ) ){
			add_menu_page(
				__( 'Custom Menu', 'picosoft' ),
				__( 'Custom Menu', 'picosoft' ),
				'manage_options',
				'custompage',
				array( $this, 'create_admin_page' ),
				'',
				6
			);
			add_submenu_page(
				'custompage',
				__( 'Shortcode', 'textdomain' ),
				__( 'Shortcode', 'textdomain' ),
				'manage_options',
				'books-shortcode',
				array( $this, 'create_admin_page' ),
			);
		}
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		// Set class property.
		$this->options = get_option( 'my_option_name' );
		?>
		<div class="wrap">
			<h1>My Settings</h1>
			<form method="post" action="options.php">
			<?php
				// This prints out all hidden setting fields.
				settings_fields( 'my_option_group' );
				do_settings_sections( 'my-setting-admin' );
				submit_button();
			?>
			</form>
		</div>
		<?php
	}

	/**
	 * Register and add settings
	 */
	public function page_init() {
		register_setting(
			'my_option_group', // Option group.
			'my_option_name', // Option name.
			array( $this, 'sanitize' ) // Sanitize.
		);

		add_settings_section(
			'setting_section_id', // ID.
			'My Custom Settings', // Title.
			array( $this, 'print_section_info' ), // Callback.
			'my-setting-admin' // Page.
		);

		add_settings_field(
			'id_number', // ID.
			'ID Number', // Title.
			array( $this, 'id_number_callback' ), // Callback.
			'my-setting-admin', // Page.
			'setting_section_id' // Section.
		);

		add_settings_field(
			'title',
			'Title',
			array( $this, 'title_callback' ),
			'my-setting-admin',
			'setting_section_id'
		);
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 */
	public function sanitize( $input ) {
		$new_input = array();
		if ( isset( $input['id_number'] ) ) {
			$new_input['id_number'] = absint( $input['id_number'] );
		}

		if ( isset( $input['title'] ) ) {
			$new_input['title'] = sanitize_text_field( $input['title'] );
		}

		return $new_input;
	}

	/**
	 * Print the Section text
	 */
	public function print_section_info() {
		print 'Enter your settings below:';
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function id_number_callback() {
		printf(
			'<input type="text" id="id_number" name="my_option_name[id_number]" value="%s" />',
			isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number'] ) : ''
		);
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function title_callback() {
		printf(
			'<input type="text" id="title" name="my_option_name[title]" value="%s" />',
			isset( $this->options['title'] ) ? esc_attr( $this->options['title'] ) : ''
		);
	}
}
