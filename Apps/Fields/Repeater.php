<?php
/**
 * Field displayed by this function.
 *
 * @package    Tinyfield Metabox
 * @subpackage Tinyfield_Metaboxes
 */

namespace Tiny\Init\Fields;

use Tiny\Init\Model\CallTheField;
use Tiny\Init\Abstracts\GetFields;
use Tiny\Init\Traits\Singleton;

/**
 * Display Input.
 */
class Repeater extends GetFields {
	use Singleton;

	/**
	 * Return input field.
	 *
	 * @return mixed
	 */
	public function get_field() {
		if ( $this->field && is_array( $this->field ) ) {
			$id          = sanitize_text_field( $this->field['id'] );
			$type        = sanitize_text_field( $this->field['type'] );
			$class       = sanitize_text_field( $this->field['class'] );
			$title       = sanitize_text_field( $this->field['title'] );
			$desc        = sanitize_text_field( $this->field['desc'] );
			$subtitle    = sanitize_text_field( $this->field['subtitle'] );
			$innerfields = is_array( $this->field['fields'] ) ? $this->field['fields'] : '';

			$value = isset( $this->field['prev_value'][ $id ] ) ? $this->field['prev_value'][ $id ] : array();

			$prepare_value = $this->prepare_data( $value );

			$condition = $this->get_conditional_rules( $this->field['condition'] );
			$attr      = '';
			if ( $condition ) {
				$attr .= htmlspecialchars( $condition );
			}
			// $meta_value = $this->get_value();
			$make_id_to_var = str_replace( '-', '_', $id );
			?>

			<div id="field-<?php echo esc_attr( $id ); ?>" data-fields-id = "<?php echo esc_attr( $make_id_to_var ); ?>" class="fields-wrapper <?php echo esc_attr( $class ); ?>" data-conditional-rules="<?php echo esc_attr( $attr ); ?>" >
				<div class="label col">
					<label><?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="repeater-wrapper col d-flex flex-wrap">
					<div class="repeater">
						<div class="wrapper" width="100%">
							<div class="repater-container">

							</div>
							<div width="10%" colspan="4"><span class="add tiny-button"><?php esc_html_e( 'Add New', 'tinyfield' ); ?></span></div>
						</div>
						<?php if ( ! empty( $desc ) ) { ?>
							<p class="description"> <?php echo esc_html( $desc ); ?></p>
						<?php } ?>
					</div>
				</div>
				<script>
					let <?php echo esc_attr( $make_id_to_var ); ?> = `
						<div class="row repeater-inner">
							<?php
								// $default = $this->prepare_default_data( $innerfields );
								$this->repater_field( $id, $innerfields, false );
								$this->repater_control();
							?>
						</div>
					`;
				</script>
			</div>
			<?php
		}
	}

	/**
	 * Return input field.
	 *
	 * @return mixed
	 */
	private function repater_control() {
		?>
		<div width="10%">
			<span class="move tiny-button"><?php esc_html_e( 'Move Row', 'tinyfield' ); ?></span>
			<span class="move-up tiny-button"><?php esc_html_e( 'Move Up', 'tinyfield' ); ?></span>
			<input type="text" class="move-steps" value="1" />
			<span class="move-down tiny-button"><?php esc_html_e( 'Move Down', 'tinyfield' ); ?></span>
			<span class="remove tiny-button"><?php esc_html_e( 'Remove', 'tinyfield' ); ?></span>
		</div>
		<?php
	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $id id.
	 * @param [type] $innerfields fields.
	 * @param [type] $prev_value previous value.
	 * @return void
	 */
	private function repater_field( $id, $innerfields, $prev_value = null ) {
		?>
		<div class="field-inner" width="80%">
			<?php
			foreach ( $innerfields as $field ) {
				$field_inner_id = $field['id'];
				$field['id']    = $id . '[' . $field_inner_id . ']';
				if ( $prev_value ) {
					$field['prev_value'] = $prev_value;
				} else {
					$field['prev_value'][ $field['id'] ] = isset( $field['default'] ) ? $field['default'] : '';
				}
				$get_the_field = CallTheField::init( $field );
				$get_the_field->get_fields();
			}
			?>
		</div>

		<?php
	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $value prev value.
	 * @return array
	 */
	private function prepare_data( $value ) {
		$new_formate = array();

		return $new_formate;
	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $value prev value.
	 * @return array
	 */
	// private function prepare_default_data( $innerfields ) {
	// $new_formate = array();


	// return $new_formate;
	// }

}
