<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Fields;

use PS\INIT\GetFields;
/**
 * Display Input.
 */
class ColorPicker extends GetFields {
	/**
	 * Get instance;
	 *
	 * @var obaject
	 */
	protected static $instance;

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
		self::$instance->field = $field;
		return self::$instance;
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
			$type     = sanitize_text_field( $this->field['type'] );
			$class    = sanitize_text_field( $this->field['class'] );
			$title    = sanitize_text_field( $this->field['title'] );
			$value    = get_post_meta( $post->ID, $id, true );
			$desc     = sanitize_text_field( $this->field['desc'] );
			$subtitle = sanitize_text_field( $this->field['subtitle'] );
			if ( ! $value && ! metadata_exists( 'post', $post->ID, $this->field['id'] ) ) {
				$value = sanitize_text_field( $this->field['default'] );
			}
			wp_enqueue_script( 'wp-color-picker-alpha' );
			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper <?php echo esc_attr( $class ); ?>">
				<div class="label col">
					<label for="<?php echo esc_attr( $id ); ?>"> <?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="field-wrapper color-picker-wrapper col">
					<input name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>" type="text" class="field-colorpicker color-picker" value="<?php echo esc_attr( $value ); ?>" data-alpha-enabled="true" data-alpha-enabled="true" />
					<?php if ( ! empty( $desc ) ) { ?>
						<p> <?php echo esc_html( $desc ); ?></p>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}

}
