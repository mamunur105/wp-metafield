<?php
/**
 * Field displayed by this function.
 *
 * @package    Codexin Metabox
 * @subpackage Codexin_Metabox
 */

namespace Codexin\MetaboxesClasses\Fields;

use Codexin\MetaboxesClasses\GetFields;
/**
 * Display Input.
 */
class Checkbox extends GetFields {
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
			$desc     = sanitize_text_field( $this->field['desc'] );
			$subtitle = sanitize_text_field( $this->field['subtitle'] );
			$options  = array_map( 'esc_attr', $this->field['options'] );
			$value    = get_post_meta( $post->ID, $id, true );
			if ( ! $value && ! metadata_exists( 'post', $post->ID, $this->field['id'] ) ) {
				$value = $this->field['default'];
			}
			$value = maybe_unserialize( $value );
			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper <?php echo esc_attr( $class ); ?>">
				<div class="label col">
					<label><?php echo esc_html( $title ); ?> </label>
				<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="checkboxes-wrapper col d-flex flex-wrap">
				<?php
				if ( ! empty( $options ) ) {
					foreach ( $options as $key => $option ) {
						$checked = is_array( $value ) && in_array( $key, $value, true ) ? 'checked' : '';
						?>
							<div class="checkbox-wraper">
								<input name="<?php echo esc_attr( $id ); ?>[]" id="<?php echo esc_attr( $key ); ?>" type="<?php echo esc_attr( $type ); ?>" class="field" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $checked ); ?> >
								<label for="<?php echo esc_attr( $key ); ?>"> <?php echo esc_attr( $option ); ?></label>
							</div>
							<?php
					}
				}
				if ( ! empty( $desc ) ) {
					?>
					<div class="metabox-description">
						<p> <?php echo esc_html( $desc ); ?></p>
					</div>
				<?php } ?>
				</div>
			</div>
				<?php
		}
	}

}
