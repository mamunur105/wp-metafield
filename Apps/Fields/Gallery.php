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
class Gallery extends GetFields {
	use Singleton;
	/**
	 * Return input field.
	 *
	 * @return mixed
	 */
	public function get_field() {
		if ( $this->field && is_array( $this->field ) ) {
			$id        = sanitize_text_field( $this->field['id'] );
			$class     = sanitize_text_field( $this->field['class'] );
			$title     = sanitize_text_field( $this->field['title'] );
			$desc      = sanitize_text_field( $this->field['desc'] );
			$subtitle  = sanitize_text_field( $this->field['subtitle'] );
			$image_ids = isset( $this->field['prev_value'][ $id ] ) ? $this->field['prev_value'][ $id ] : '';
			$image_ids = explode( ',', $image_ids );
			$valid_ids = '';
			$data_attr = '';
			$condition = $this->get_conditional_rules( $this->field['condition'] );
			$attr      = '';
			if ( $condition ) {
				$attr .= htmlspecialchars( $condition );
			}

			?>
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper flex-wrap image-gallery <?php echo esc_attr( $class ); ?>" data-conditional-rules="<?php echo esc_attr( $attr ); ?>">
				<div class="label col">
					<label for="<?php echo esc_attr( $id ); ?>"> <?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="field-wrapper col flex-wrap" >
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
