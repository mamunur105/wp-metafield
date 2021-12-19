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
			wp_enqueue_script( 'repeatable-fields' );
			$id          = sanitize_text_field( $this->field['id'] );
			$type        = sanitize_text_field( $this->field['type'] );
			$class       = sanitize_text_field( $this->field['class'] );
			$title       = sanitize_text_field( $this->field['title'] );
			$desc        = sanitize_text_field( $this->field['desc'] );
			$subtitle    = sanitize_text_field( $this->field['subtitle'] );
			$innerfields = is_array( $this->field['fields'] ) ? $this->field['fields'] : '';
			$options     = array_map( 'esc_attr', $this->field['options'] );
			$value       = isset( $this->field['prev_value'][ $id ] ) ? $this->field['prev_value'][ $id ] : array();

			$condition = $this->get_conditional_rules( $this->field['condition'] );
			$attr      = '';
			if ( $condition ) {
				$attr .= htmlspecialchars( $condition );
			}
			// $meta_value = $this->get_value();

			?>

			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper <?php echo esc_attr( $class ); ?>" data-conditional-rules="<?php echo esc_attr( $attr ); ?>" >
				<div class="label col">
					<label><?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="repeater-wrapper col d-flex flex-wrap">
					<div class="repeater">
						<div class="wrapper" width="100%">
							<div class="container">
								<div class="template row repeater-inner">
									<div width="80%">
										<div class="repeater-inner--">
											<?php
											foreach ( $innerfields as $field ) {
												// $field['prev_value'] = $meta_value;
												$field['id']   = $id . '_' . $field['id'];
												$get_the_field = CallTheField::init( $field );
												$get_the_field->get_fields();
											}
											?>
										</div>
									</div>
									<div width="10%">
										<span class="move">Move Row</span>
										<span class="move-up">Move Up</span>
										<input type="text" class="move-steps" value="1" />
										<span class="move-down">Move Down</span>
									</div>
									<div width="10%"><span class="remove">Remove</span></div>
								</div>
								<div class="row repeater-inner">
									<div class="field-inner" width="80%">
										<?php
										foreach ( $innerfields as $field ) {
											// $field['prev_value'] = $meta_value;
											$field['id']   = $id . '_' . $field['id'];
											$get_the_field = CallTheField::init( $field );
											$get_the_field->get_fields();
										}
										?>
									</div>
									<div width="10%">
										<span class="move">Move Row</span>
										<span class="move-up">Move Up</span>
										<input type="text" class="move-steps" value="1" />
										<span class="move-down">Move Down</span>
										<span class="remove">Remove</span>
									</div>
								</div>
							</div>
							<div width="10%" colspan="4"><span class="add">Add</span></div>
						</div>
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
