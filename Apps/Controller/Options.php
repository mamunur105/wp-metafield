<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Controller;

use PS\INIT\Abstracts\AbsController;
use PS\INIT\Model\CallTheField;
use PS\INIT\Traits\Getdata;
/**
 * Display Metabox.
 */
class Options extends AbsController {
	use Getdata;
	/**
	 * Undocumented function.
	 *
	 * @param array $settings field and settings.
	 */
	public function __construct( $settings = array() ) {
		$this->settings = $this->set_settings( $settings );
		$this->fields   = $this->settings['fields'];
		add_action( 'admin_menu', array( $this, 'add_settings' ) );
		add_action( 'admin_menu', array( $this, 'save_settings_data' ) );
	}
	/**
	 * Undocumented function
	 *
	 * @param [array] $settings settings field.
	 * @return array
	 */
	private function set_settings( $settings ) {
		if ( isset( $settings['settings_type'] ) ) {
			unset( $settings['settings_type'] );
		}
		if ( isset( $settings['prev_value'] ) ) {
			unset( $settings['prev_value'] );
		}
		$default = array(
			'settings_type' => 'option',
			'menu_title'    => esc_html__( 'Option Title', 'picosoft' ),
			'page_title'    => esc_html__( 'Page Title', 'picosoft' ),
			'classes'       => 'picosoft-option-wrapper',
			'id'            => 'pico-option',
			'position'      => 6,
			'capability'    => 'manage_options',
			'menu_icon'     => '',
			'parent_slug'   => '',
			'tabs'          => array(),
			'tabs_type'     => 'horizontal-tab', // vertical-tab.
			'fields'        => array(),
		);
		if ( isset( $settings['post_types'] ) ) {
			unset( $settings['post_types'] );
		}
		return array_merge( $default, $settings );
	}

	/**
	 * Add options page
	 */
	public function add_settings() {
		if ( is_array( $this->settings ) ) {
			$parent_slug   = sanitize_text_field( $this->settings['parent_slug'] );
			$menu_title    = sanitize_text_field( $this->settings['menu_title'] );
			$capability    = sanitize_text_field( $this->settings['capability'] );
			$id            = sanitize_text_field( $this->settings['id'] );
			$menu_icon     = sanitize_text_field( $this->settings['menu_icon'] );
			$position      = absint( $this->settings['position'] );
			$this_function = array( $this, 'from_field' );
			if ( ! empty( $parent_slug ) ) {
				add_submenu_page( $parent_slug, $menu_title, $menu_title, $capability, $id, $this_function );
			} else {
				add_menu_page( $menu_title, $menu_title, $capability, $id, $this_function, $menu_icon, $position );
			}
		}
	}

	/**
	 * Options page callback
	 */
	public function from_field() {
		// Set class property.
		?>
		<div class="wrap ps-option" style="background-color: #fff;">
			<?php if ( $this->settings['page_title'] ) { ?>
				<?php printf( '<h1>%s</h1>', esc_html( $this->settings['page_title'] ) ); ?>
			<?php } ?>
			<form method="post" action="">
				<input type="hidden" name="pico_option_settings" value="pico_option_settings" />
				<?php
				$option_value = $this->get_value();
				$this->before_container();
				parent::from_field();
				foreach ( $this->fields as $field ) {
					// $field['settings_field_type'] = 'options_settings';
					$field['prev_value'] = $option_value;
					$get_the_field          = CallTheField::init( $field );
					$get_the_field->get_fields();
				}
				$this->after_container();
				echo '<div class="button-wrapper">';
					submit_button();
				echo '</div>';
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Save function
	 *
	 * @return mixed
	 */
	public function save_settings_data() {
		if ( isset( $_POST['pico_option_settings'] ) ) {
			$varify = sanitize_text_field( wp_unslash( $_POST['pico_option_settings'] ) );
			if ( 'pico_option_settings' === $varify ) {
				parent::save_settings( null, null, null );
			}
		}
	}

}
