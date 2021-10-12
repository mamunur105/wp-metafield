<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Fields;

use PS\INIT\GetFields;
/**
 * Display Input.
 */
class Gallery extends GetFields {

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
			$id        = sanitize_text_field( $this->field['id'] );
			$type      = sanitize_text_field( $this->field['type'] );
			$class     = sanitize_text_field( $this->field['class'] );
			$title     = sanitize_text_field( $this->field['title'] );
			$desc      = sanitize_text_field( $this->field['desc'] );
			$subtitle  = sanitize_text_field( $this->field['subtitle'] );
			$require   = $this->field['condition'];
			$image_ids = get_post_meta( $post->ID, $id, true );
			$image_ids = explode( ',', $image_ids );
			$valid_ids = '';
			$data_attr = '';

			if ( ! empty( $require['field'] ) && ! empty( $require['value'] ) && ! empty( $require['compare'] ) ) {
				$require_id      = $require['field'];
				$require_value   = $require['value'];
				$require_compare = $require['compare'];
				$data_attr      .= ' data-required-field=field-' . $require_id;
				$data_attr      .= ' data-required-value=' . $require_value;
				$data_attr      .= ' data-required-compare=' . $require_compare;
				$class          .= ' conditional-field';

			}
			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper flex-wrap image-gallery <?php echo esc_attr( $class ); ?>" <?php echo $data_attr; ?>>
				<div class="label">
					<label for="<?php echo esc_attr( $id ); ?>"> <?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="field-wrapper flex-wrap" >
					<div class="upload-button-wrapper">
						<button class="upload-btn btn button-primary"><?php echo esc_html__( 'Upload', 'psnmetabox' ); ?></button>
					</div>
					<ul class="preview-list d-flex flex-wrap" >
					<?php
					foreach ( $image_ids as $image_id ) {
						$edit_image = admin_url( 'post.php?post=' . $image_id . '&action=edit' );
						$image_url  = wp_get_attachment_image_url( $image_id, 'full' );
						if ( $image_url ) {
							$valid_ids .= $image_id . ',';
							?>
							<li class="preview-wrap" data-id='<?php echo esc_attr( $image_id ); ?>' >
								<div class="preview-image" style="background-image: url(<?php echo esc_url( $image_url ); ?>);"></div>
								<button class="metabox-image-remove"><span class="dashicons dashicons-no-alt"></span></button>
								<a href="<?php echo esc_url( $edit_image ); ?>" class="metabox-image-edit" target="_blank" > <span class="dashicons dashicons-edit-large"></span> </a>
							</li>
							<?php
						}
					}
					?>
					</ul>
					<input name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>" type="hidden" class="field image_input_field" value="<?php echo esc_attr( rtrim( $valid_ids, ',' ) ); ?>">
					<?php if ( ! empty( $desc ) ) { ?>
						<p> <?php echo esc_html( $desc ); ?></p>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}

}
