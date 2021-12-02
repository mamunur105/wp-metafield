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
class ToggleSwitch extends GetFields {
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
			'true'    => 'true',
			'false'   => 'false',
			'default' => true,
		);
		$field                 = wp_parse_args( $field, $defaults );
		self::$instance->field = $field;
		return self::$instance;
	}

	public function get_settings_value( $id ) {
		$get_values = maybe_unserialize( $this->field['prev_value'] );
		$value      = maybe_unserialize( $get_values[ $id ][0] );
		return $value;
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
			$desc     = sanitize_text_field( $this->field['desc'] );
			$subtitle = sanitize_text_field( $this->field['subtitle'] );
			$value    = $this->get_settings_value( $id );
			if ( 'yes' !== $value ) {
				$value = false;
			}
			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper flex-wrap <?php echo esc_attr( $class ); ?>">
				<div class="label col">
					<label><?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="field-wrapper col d-flex flex-wrap">
					<div class="toggle-button">
						<label class="switch" style="--true:'<?php echo esc_attr( $this->field['true'] ); ?>'; --false:'<?php echo esc_attr( $this->field['false'] ); ?>';">
							<input name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>" type="checkbox"  <?php echo $value ? esc_attr( 'checked' ) : ''; ?> value="yes" >
							<span class="slider round" ></span>
						</label>
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
