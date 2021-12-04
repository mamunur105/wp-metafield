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
class Input extends GetFields {
	use Singleton;
	/**
	 * Return input field.
	 *
	 * @return mixed
	 */
	public function get_field() {
		if ( $this->field && is_array( $this->field ) ) {
			$id       = sanitize_text_field( $this->field['id'] );
			$type     = sanitize_text_field( $this->field['type'] );
			$class    = sanitize_text_field( $this->field['class'] );
			$title    = sanitize_text_field( $this->field['title'] );
			$desc     = sanitize_text_field( $this->field['desc'] );
			$subtitle = sanitize_text_field( $this->field['subtitle'] );
			$value    = isset( $this->field['prev_value'][ $id ] ) ? $this->field['prev_value'][ $id ] : '';

			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper <?php echo esc_attr( $class ); ?>">
				<div class="label col">
					<label for="<?php echo esc_attr( $id ); ?>"> <?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="field-wrapper col">
					<input name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>" type="<?php echo esc_attr( $type ); ?>" class="field" value="<?php echo esc_attr( $value ); ?>">
					<?php if ( ! empty( $desc ) ) { ?>
						<p> <?php echo esc_html( $desc ); ?></p>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}

}
