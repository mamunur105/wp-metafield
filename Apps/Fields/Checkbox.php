<?php
/**
 * Field displayed by this function.
 *
 * @package    Tinyfield Metabox
 * @subpackage Tinyfield_Metaboxes
 */

namespace Tiny\Init\Fields;

use Tiny\Init\Abstracts\GetFields;
use Tiny\Init\Traits\Singleton;

/**
 * Display Input.
 */
class Checkbox extends GetFields {
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
			$options  = array_map( 'esc_attr', $this->field['options'] );
			$value    = isset( $this->field['prev_value'][ $id ] ) ? $this->field['prev_value'][ $id ] : array();

			$condition = $this->get_conditional_rules( $this->field['condition'] );
			$attr      = '';
			if ( $condition ) {
				$attr .= htmlspecialchars( $condition );
			}

			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper <?php echo esc_attr( $class ); ?>" data-conditional-rules="<?php echo esc_attr( $attr ); ?>" >
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
						$field_id = $id . '_' . $key;
						$checked  = is_array( $value ) && in_array( $key, $value, true ) ? 'checked' : '';
						?>
							<div class="checkbox-wraper">
								<input name="<?php echo esc_attr( $id ); ?>[]" id="<?php echo esc_attr( $field_id ); ?>" type="<?php echo esc_attr( $type ); ?>" class="field" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $checked ); ?> >
								<label for="<?php echo esc_attr( $field_id ); ?>"> <?php echo esc_attr( $option ); ?></label>
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
