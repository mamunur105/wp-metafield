<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Controller;

use PS\INIT\Abstracts\AbsController;

/**
 * Display Metabox.
 */
class Options extends AbsController {

	/**
	 * Undocumented function.
	 *
	 * @param array $settings field and settings.
	 */
	public function __construct( $settings = array() ) {
		$this->settings = $this->set_settings( $settings );
		$this->fields   = $this->settings['fields'];
		add_action( 'admin_menu', array( $this, 'add_settings' ) );
	}
	/**
	 * Undocumented function
	 *
	 * @param [array] $settings settings field.
	 * @return array
	 */
	private function set_settings( $settings ) {
		$new_settings = array_merge(
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
		if ( isset( $new_settings['post_types'] ) ) {
			unset( $new_settings['post_types'] );
		}
		return $new_settings;
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
			$this_function = array( $this, 'create_page_section' );
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
	public function create_page_section() {
		// Set class property.
		?>
		<div class="wrap">
			<?php if ( $this->settings['page_title'] ) { ?>
				<?php printf( '<h1>%s</h1>', esc_html( $this->settings['page_title'] ) ); ?>
			<?php } ?>
			<form method="post" action="options.php">
				<?php parent::create_page_section(); ?>
				Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id vero minima illum laboriosam quam labore odit expedita eligendi eius a, adipisci similique deserunt, asperiores iusto sequi nostrum in reiciendis. Corrupti!

			</form>
		</div>
		<?php
	}

	/**
	 * Save function
	 *
	 * @param [type] $post_id post id.
	 * @param [type] $post post object.
	 * @param [type] $update update true.
	 * @return mixed
	 */
	// public function save_settings( $post_id, $post, $autoload ) {
	// if ( ! in_array( $post->post_type, $this->settings['post_types'], true ) ) {
	// return $post_id;
	// }
	// if ( ! current_user_can( 'edit_page', $post_id ) ) {
	// return $post_id;
	// }
	// if ( ! current_user_can( 'edit_post', $post_id ) ) {
	// return $post_id;
	// }
	// verify nonce.
	// if ( isset( $_POST['PS_Metaboxes_nonce'] ) ) {
	// $nonce_check = sanitize_text_field( wp_unslash( $_POST['PS_Metaboxes_nonce'] ) );
	// if ( ! wp_verify_nonce( $nonce_check, basename( __FILE__ ) ) ) {
	// return $post_id;
	// }
	// } else {
	// return $post_id;
	// }
	// check autosave.
	// if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	// return $post_id;
	// }
	// parent::save_settings( $post_id, $post, $autoload );
	// }





}
