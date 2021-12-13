<?php
/**
 * Field displayed by this function.
 *
 * @package    Tinyfield Metabox
 * @subpackage Tinyfield_Metaboxes
 */

namespace Tiny\Init\Abstracts;

use Tiny\Init\Traits\SanitizeTextOrArray;
use Tiny\Init\Traits\Nonce;

/**
 * Display Metabox.
 */
abstract class AbsController {
	use SanitizeTextOrArray;
	use Nonce;
	/**
	 * An array inside container.
	 *
	 * @var array
	 */
	protected $fields;
	/**
	 * Undocumented variable.
	 *
	 * @var array
	 */
	protected $settings = array();
	/**
	 * Settings page Or section.
	 *
	 * @return mixed
	 */
	abstract public function add_settings();

	/**
	 * Display all field.
	 *
	 * @return mixed
	 */
	public function from_field() {
		$this->create_nonce();
	}

	/**
	 * Before container.
	 *
	 * @return void
	 */
	public function before_container() {
		$this->settings['classes'] = $this->settings['classes'] . ' ' . $this->settings['tabs_type'];
		?>
		<div id="<?php echo esc_attr( $this->settings['id'] ); ?>" class="tinyfield-settings-container <?php echo esc_attr( $this->settings['classes'] ); ?>">
		<?php
		if ( is_array( $this->settings['tabs'] ) && count( $this->settings['tabs'] ) ) {
			$tabs = $this->settings['tabs']
			?>
			<div class="tinytab">
				<div class="top-gap"><?php echo esc_html_e( 'MENU', 'tinyfield' ); ?></div>
				<?php
				foreach ( $tabs as $key => $tab ) {
					$active = isset( $tab['default_active'] ) && $tab['default_active'] ? 'active' : '';
					?>
					<button class="tablinks <?php echo esc_attr( $active ); ?>" data-tab="<?php echo esc_attr( $key ); ?>">
						<?php echo isset( $tab['label'] ) ? esc_html( $tab['label'] ) : ''; ?>
					</button>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="wrapper-settings">
			<?php
			if ( is_array( $this->settings['tabs'] ) && count( $this->settings['tabs'] ) ) {
				$tabs = $this->settings['tabs']
				?>
				<div class="top-gap"></div>
				<?php
			}
	}

	/**
	 * After container.
	 *
	 * @return void
	 */
	public function after_container() {
		echo '</div></div>';
	}

	/**
	 * Save settings data.
	 *
	 * @param [type] $post_id first value $post_id for metameta .
	 * @param [type] $post secound value post Object.
	 * @param [type] $update_value third meta_value.
	 * @return mixed
	 */
	protected function save_settings( $post_id, $post, $update_value ) {
		// loop through fields and save the data.
		if ( $this->varify_nonce() ) {
			$settings = array();
			foreach ( $this->fields as $field ) {
				if ( isset( $_POST[ $field['id'] ] ) ) {
					switch ( $field['type'] ) {
						case 'gallery':
						case 'number':
						case 'date':
						case 'radio':
						case 'switchbtn':
						case 'radioimage':
						case 'textarea':
						case 'colorpicker':
						case 'text':
							$update_value = sanitize_text_field( wp_unslash( $_POST[ $field['id'] ] ) );
							break;
						case 'toggleswitch':
							$update_value = sanitize_text_field( wp_unslash( $_POST[ $field['id'] ] ) );
							break;
						case 'url':
							$update_value = esc_url_raw( wp_unslash( $_POST[ $field['id'] ] ) );
							break;
						case 'email':
							$update_value = sanitize_email( wp_unslash( $_POST[ $field['id'] ] ) );
							break;
						case 'select':
						case 'postsselect':
						case 'sidebar':
						case 'checkbox':
							$update_value = $this->sanitize_text_or_array_field( wp_unslash( $_POST[ $field['id'] ] ) );
							// $update_value = maybe_serialize( $update_value );
							break;
						case 'image':
						case 'rangeslider':
							$update_value = intval( wp_unslash( $_POST[ $field['id'] ] ) );
							break;
						case 'editor':
								$update_value = apply_filters( 'the_content', wp_unslash( $_POST[ $field['id'] ] ) );
							break;
						default:
					}
				} else {
					$update_value = '';
				}
				$field_id              = sanitize_text_field( $field['id'] );
				$settings[ $field_id ] = $update_value;
				if ( 'post_types' === $this->settings['settings_type'] ) {
					update_post_meta( $post_id, $field_id, $update_value );
				}
			} // end foreach
			if ( 'option' === $this->settings['settings_type'] ) {
				$settings_json = wp_json_encode( $settings );
				// TODO: Remove this line after checking.
				update_option( $this->settings['id'], $settings_json );
			}
			do_action( 'tinyfield_update_settings', $settings, $post_id, $post, $update_value );
		}
	}

}
