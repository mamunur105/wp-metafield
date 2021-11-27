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
	 * Undocumented variable.
	 *
	 * @var array
	 */
	private $section_settings = '';
	/**
	 * Undocumented variable.
	 *
	 * @var array
	 */
	private $option_group = 'pico_option_group';
	/**
	 * Undocumented variable.
	 *
	 * @var array
	 */
	private $setting_section_id = 'setting_section_id';
	/**
	 * Undocumented function.
	 *
	 * @param array $settings field and settings.
	 */
	public function __construct( $settings = array() ) {
		$this->settings = $this->default_dettings( $settings );
		// $option_page              = $this->settings['id'];
		// $this->options            = get_option( $option_page );
		// $this->section_settings   = $option_page . '-setting-admin';
		// $this->setting_section_id = $option_page . '-section-id';
		// $this->option_group       = $option_page . '-setting-admin';
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
	}
	/**
	 * Undocumented function
	 *
	 * @param [array] $settings settings field.
	 * @return array
	 */
	private function default_dettings( $settings ) {
		return array_merge(
			array(
				'menu_title'  => esc_html__( 'Option Title', 'picosoft' ),
				'page_title'  => esc_html__( 'Page Title', 'picosoft' ),
				'classes'     => 'picosoft-option-wrapper',
				'id'          => 'pico-option',
				'position'    => 6,
				'capability'  => 'manage_options',
				'menu_icon'   => '',
				'parent_slug' => '',
				'tabs'        => array(),
				'fields'      => array(),
			),
			$settings
		);
	}

	/**
	 * Add options page
	 */
	public function add_plugin_page() {
		if ( is_array( $this->settings ) ) {
			if ( ! empty( $this->settings['parent_slug'] ) ) {
				add_submenu_page(
					$this->settings['parent_slug'],
					$this->settings['menu_title'],
					$this->settings['menu_title'],
					$this->settings['capability'],
					$this->settings['id'],
					array( $this, 'create_admin_page' ),
				);
			} else {
				add_menu_page(
					$this->settings['menu_title'],
					$this->settings['menu_title'],
					$this->settings['capability'],
					$this->settings['id'],
					array( $this, 'create_admin_page' ),
					$this->settings['menu_icon'],
					$this->settings['position'],
				);
			}
		}
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		// Set class property.
		?>
		<div class="wrap">
			<?php if ( $this->settings['page_title'] ) { ?>
				<?php printf( '<h1>%s</h1>', esc_html( $this->settings['page_title'] ) ); ?>
			<?php } ?>
			<form method="post" action="options.php">

				Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id vero minima illum laboriosam quam labore odit expedita eligendi eius a, adipisci similique deserunt, asperiores iusto sequi nostrum in reiciendis. Corrupti!
				
			</form>
		</div>
		<?php
	}



}
