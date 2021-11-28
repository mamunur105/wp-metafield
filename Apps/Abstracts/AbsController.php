<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Abstracts;

use PS\INIT\Traits\SanitizeTextOrArray;
use PS\INIT\Traits\Nonce;

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
	public function before_container() { ?>
		<div id="<?php echo esc_attr( $this->settings['id'] ); ?>" class="picosoft-metabox-container <?php echo esc_attr( $this->settings['classes'] ); ?>">
		<?php
		if ( is_array( $this->settings['tabs'] ) && count( $this->settings['tabs'] ) ) {
			$tabs = $this->settings['tabs']
			?>
			<div class="picotab">
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
		<?php
	}

	/**
	 * After container.
	 *
	 * @return void
	 */
	public function after_container() {
		echo '</div>';
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
			foreach ( $this->fields as $field ) {
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
						if ( isset( $_POST[ $field['id'] ] ) ) {
							$update_value = sanitize_text_field( wp_unslash( $_POST[ $field['id'] ] ) );
						}
						break;
					case 'toggleswitch':
						if ( isset( $_POST[ $field['id'] ] ) ) {
							$update_value = sanitize_text_field( wp_unslash( $_POST[ $field['id'] ] ) );
						} else {
							$update_value = '';
						}
						break;
					case 'url':
						if ( isset( $_POST[ $field['id'] ] ) ) {
							$update_value = esc_url_raw( wp_unslash( $_POST[ $field['id'] ] ) );
						}
						break;
					case 'email':
						if ( isset( $_POST[ $field['id'] ] ) ) {
							$update_value = sanitize_email( wp_unslash( $_POST[ $field['id'] ] ) );
						}
						break;
					case 'select':
					case 'postsselect':
					case 'sidebar':
					case 'checkbox':
						if ( isset( $_POST[ $field['id'] ] ) ) {
							$update_value = $this->sanitize_text_or_array_field( wp_unslash( $_POST[ $field['id'] ] ) );
							$update_value = maybe_serialize( $update_value );
						} else {
							$update_value = array();
						}
						break;
					case 'image':
					case 'rangeslider':
						if ( isset( $_POST[ $field['id'] ] ) ) {
							$update_value = intval( wp_unslash( $_POST[ $field['id'] ] ) );
						}
						break;
					case 'editor':
						if ( isset( $_POST[ $field['id'] ] ) ) {
							$update_value = apply_filters( 'the_content', wp_unslash( $_POST[ $field['id'] ] ) );
						}
						break;
					default:
				}
				$field = sanitize_text_field( $field['id'] );
				if ( isset( $this->settings['post_types'] ) && ! empty( $this->settings['post_types'] ) ) {
					update_post_meta( $post_id, $field, $update_value );
				}
				if ( ! isset( $this->settings['post_types'] ) ) {
					update_option( $field, $update_value );
				}
			} // end foreach
		}
	}

}
