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
class Image extends GetFields {
	use Singleton;
	/**
	 * Return input field.
	 *
	 * @return mixed
	 */
	public function get_field() {
		if ( $this->field && is_array( $this->field ) ) {
			$id         = sanitize_text_field( $this->field['id'] );
			$class      = sanitize_text_field( $this->field['class'] );
			$title      = sanitize_text_field( $this->field['title'] );
			$desc       = sanitize_text_field( $this->field['desc'] );
			$subtitle   = sanitize_text_field( $this->field['subtitle'] );
			$value    = isset( $this->field['prev_value'][ $id ] ) ? $this->field['prev_value'][ $id ] : null;
			$image_id   = intval( $value );
			$image_url  = $image_id ? wp_get_attachment_image_url( $image_id, 'full' ) : 'https://via.placeholder.com/700x200';
			$edit_image = admin_url( 'post.php?post=' . $image_id . '&action=edit' );
			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper image-upload <?php echo esc_attr( $class ); ?>">
				<div class="label col">
					<label for="<?php echo esc_attr( $id ); ?>"> <?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="field-wrapper col" data-image-id='<?php echo esc_attr( $image_id ); ?>'>
					<div class="upload-button-wrapper">
						<button class="upload-btn btn button-primary"><?php echo esc_html__( 'Upload', 'psnmetabox' ); ?></button>
					</div>
					<div class="preview-wrap <?php echo $image_id ? '' : 'button-hide'; ?> " >
						<div class="preview-image" style="background-image:url(<?php echo esc_url( $image_url ); ?>)"></div>
						<button class="metabox-image-remove"><span class="dashicons dashicons-no-alt"></span></button>
						<a href="<?php echo esc_url( $edit_image ); ?>" class="metabox-image-edit" target="_blank" > <span class="dashicons dashicons-edit-large"></span> </a> 
					</div>
					<input name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>" type="hidden" class="field image_input_field" value="<?php echo esc_attr( $image_id ); ?>">
					<?php if ( ! empty( $desc ) ) { ?>
						<p> <?php echo esc_html( $desc ); ?></p>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}

}
