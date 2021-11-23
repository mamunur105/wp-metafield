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
class RadioImage extends GetFields {
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
		$defaults              = array(
			'options' => array(),
			'column'  => 3,
			'options' => array(),
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
			global $post;
			$id       = sanitize_text_field( $this->field['id'] );
			$type     = sanitize_text_field( $this->field['type'] );
			$class    = sanitize_text_field( $this->field['class'] );
			$title    = sanitize_text_field( $this->field['title'] );
			$column   = intval( $this->field['column'] );
			$options  = $this->field['options'];
			$column   = intval( $this->field['column'] );
			$desc     = sanitize_text_field( $this->field['desc'] );
			$subtitle = sanitize_text_field( $this->field['subtitle'] );
			$value    = get_post_meta( $post->ID, $id, true );
			if ( ! $value && ! metadata_exists( 'post', $post->ID, $this->field['id'] ) ) {
				$value = sanitize_text_field( $this->field['default'] );
			}
			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper radio-image flex-wrap <?php echo esc_attr( $class ); ?>" data-col="<?php esc_attr( $column ); ?>">
				<div class="label">
					<label><?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="field-wrapper d-flex flex-wrap">
						<?php
						if ( ! empty( $options ) ) {
							$width = 100 / $column;
							foreach ( $options as $key => $btn ) {
								$checked = $key === $value ? 'checked' : '';
								?>
								<div class="switchbtn-wraper" style="max-width:<?php echo esc_attr( $width ); ?>%;width:<?php echo esc_attr( $width ); ?>%" >
									<input name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $key ); ?>" type="radio" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $checked ); ?> >
									<label for="<?php echo esc_attr( $key ); ?>" class="checkmark" > <img src=" <?php echo isset( $btn['url'] ) ? esc_url( $btn['url'] ) : 'https://via.placeholder.com/200'; ?>" alt="">
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
			<?php
		}
	}
}
