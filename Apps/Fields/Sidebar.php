<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Fields;

use PS\INIT\Abstracts\GetFields;
use PS\INIT\Traits\Singleton;
/**
 * Display Input.
 */
class Sidebar extends GetFields {
	use Singleton;
	/**
	 * Create instance
	 *
	 * @param array $field is an array value.
	 * @return object
	 */
	public static function init( $field ) {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		$defaults              = array(
			'default' => array(),
		);
		$field                 = wp_parse_args( $field, $defaults );
		self::$instance->field = $field;
		return self::$instance;
	}

		/**
		 * Return input field.
		 *
		 * @return mixed
		 */
	public function get_sidebar() {
		$options = array();
		if ( $this->field && is_array( $this->field ) ) {
			$sidebar_list = $GLOBALS['wp_registered_sidebars'];
			foreach ( $sidebar_list as $sidebar ) {
				$options[ $sidebar['id'] ] = $sidebar['name'];
			}
		}
		return $options;
	}
	/**
	 * Return input field.
	 *
	 * @return mixed
	 */
	public function get_field() {
		if ( $this->field && is_array( $this->field ) ) {
			global $post;
			$id       = sanitize_text_field( $this->field['id'] );
			$class    = sanitize_text_field( $this->field['class'] );
			$title    = sanitize_text_field( $this->field['title'] );
			$desc     = sanitize_text_field( $this->field['desc'] );
			$subtitle = sanitize_text_field( $this->field['subtitle'] );
			$options  = $this->get_sidebar();
			$value    = get_post_meta( $post->ID, $id, true );
			if ( ! $value && ! metadata_exists( 'post', $post->ID, $this->field['id'] ) ) {
				$value = $this->field['default'];
			}
			$value = maybe_unserialize( $value );
			wp_enqueue_style( 'select2' );
			wp_enqueue_script( 'select2' );
			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper <?php echo esc_attr( $class ); ?>">
				<div class="label col">
					<label for="<?php echo esc_attr( $id ); ?>" > <?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<?php
				if ( ! empty( $options ) ) {
					?>
					<div class="selectbox-wraper" data-multiselect="false">
						<select name="<?php echo esc_attr( $id ); ?>[]" id="<?php echo esc_attr( $id ); ?>" multiple>
						<option value="" > <?php esc_html_e( '--Select one--', 'psnmetabox' ); ?> </option>
						<?php
						foreach ( $options as $key => $option ) {
							$selected = is_array( $value ) && in_array( $key, $value, false ) ? 'selected' : '';
							?>
							<option value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $selected ); ?>> <?php echo esc_attr( $option ); ?> </option>
								<?php
						}
						?>
						</select>
						<?php if ( ! empty( $desc ) ) { ?>
							<p> <?php echo esc_html( $desc ); ?></p>
						<?php } ?>
					</div>
					<?php
				}
				?>
			</div>
			<?php
		}
	}

}
