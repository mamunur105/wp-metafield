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
			$value    = $this->get_settings_value( $id );
			// error_log( print_r( $this->field['prev_value'] , true ), 3, __DIR__ . '/log.txt' );
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
