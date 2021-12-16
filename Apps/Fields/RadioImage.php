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
class RadioImage extends GetFields {
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
			'options' => array(),
			'column'  => 5,
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
	public function get_field() {
		if ( $this->field && is_array( $this->field ) ) {
			$id       = sanitize_text_field( $this->field['id'] );
			$class    = sanitize_text_field( $this->field['class'] );
			$title    = sanitize_text_field( $this->field['title'] );
			$column   = intval( $this->field['column'] );
			$options  = $this->field['options'];
			$column   = intval( $this->field['column'] );
			$desc     = sanitize_text_field( $this->field['desc'] );
			$subtitle = sanitize_text_field( $this->field['subtitle'] );
			$value       = isset( $this->field['prev_value'][ $id ] ) ? $this->field['prev_value'][ $id ] : array();

			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper radio-image flex-wrap <?php echo esc_attr( $class ); ?>" data-col="<?php esc_attr( $column ); ?>">
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
								$width = 100 / $column;
								foreach ( $options as $key => $btn ) {
									$checked = $key === $value ? 'checked' : '';
									$field_id = $id . '_' . $key;
									?>
									<div class="switchbtn-wraper" style="max-width:<?php echo esc_attr( $width ); ?>%;width:<?php echo esc_attr( $width ); ?>%" >
										<input name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $field_id ); ?>" type="radio" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $checked ); ?> >
										<label for="<?php echo esc_attr( $field_id ); ?>" class="checkmark" > <img src=" <?php echo isset( $btn['url'] ) ? esc_url( $btn['url'] ) : 'https://via.placeholder.com/200'; ?>" alt="">
										<div class="label-text">
											<?php echo isset( $btn['label'] ) ? esc_html( $btn['label'] ) : ''; ?>
										</div>
									</label>
									</div>
									<?php
								}
							}
							?>
					</div>
					<div class="metabox-description">
						<?php if ( ! empty( $desc ) ) { ?>
							<p> <?php echo esc_html( $desc ); ?></p>
						<?php } ?>
					</div>
				</div>
				
			</div>
			<?php
		}
	}
}
