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
class SwitchBtn extends GetFields {
	use Singleton;
	/**
	 * Return input field.
	 *
	 * @return mixed
	 */
	public function get_field() {
		if ( $this->field && is_array( $this->field ) ) {
			$id       = sanitize_text_field( $this->field['id'] );
			$class    = sanitize_text_field( $this->field['class'] );
			$title    = sanitize_text_field( $this->field['title'] );
			$options  = array_map( 'esc_attr', $this->field['options'] );
			$value    = isset( $this->field['prev_value'][ $id ] ) ? $this->field['prev_value'][ $id ] : '';
			$desc     = sanitize_text_field( $this->field['desc'] );
			$subtitle = sanitize_text_field( $this->field['subtitle'] );
			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper flex-wrap <?php echo esc_attr( $class ); ?>">
				<div class="label col">
					<label><?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="field-wrapper col">
					<div class="d-flex flex-wrap">
						<?php
						if ( ! empty( $options ) ) {
							foreach ( $options as $key => $option ) {
								$checked = $key === $value ? 'checked' : '';
								?>
								<div class="switchbtn-wraper">
									<input name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $key ); ?>" type="radio" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $checked ); ?> >
									<label for="<?php echo esc_attr( $key ); ?>" class="checkmark" > <?php echo esc_attr( $option ); ?></label>
								</div>
								<?php
							}
						}
						?>
					</div>
					<?php if ( ! empty( $desc ) ) { ?>
						<p> <?php echo esc_html( $desc ); ?></p>
					<?php } ?>
				</div>

			</div>
			<?php
		}
	}
}
