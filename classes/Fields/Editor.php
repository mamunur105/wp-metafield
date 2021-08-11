<?php
/**
 * Field displayed by this function.
 *
 * @package    Codexin Metabox
 * @subpackage Codexin_Metabox
 */

namespace Codexin\MetaboxesClasses\Fields;

use Codexin\MetaboxesClasses\GetFields;
/**
 * Display Input.
 */
class Editor  extends GetFields {
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
			$id       = sanitize_text_field( $this->field['id'] );
			$type     = sanitize_text_field( $this->field['type'] );
			$class    = sanitize_text_field( $this->field['class'] );
			$title    = sanitize_text_field( $this->field['title'] );
			$desc     = sanitize_text_field( $this->field['desc'] );
			$subtitle = sanitize_text_field( $this->field['subtitle'] );
			$require  = $this->field['condition'];
			$value    = get_post_meta( $post->ID, $id, true );
			if ( ! metadata_exists( 'post', $post->ID, $this->field['id'] ) ) {
				$value = sanitize_text_field( $this->field['default'] );
			}
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
			<div id="field-<?php echo esc_attr( $id ); ?>" class="fields-wrapper <?php echo esc_attr( $class ); ?>" <?php echo $data_attr; ?>>
				<div class="label col">
					<label for="<?php echo esc_attr( $id ); ?>"> <?php echo esc_html( $title ); ?> </label>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p> <?php echo esc_html( $subtitle ); ?></p>
					<?php } ?>
				</div>
				<div class="field-wrapper col">
					<?php
						$settings = array(
							'wpautop'       => true, // use wpautop?
							'media_buttons' => true, // show insert/upload button(s)
							'textarea_name' => $id, // set the textarea name to something different, square brackets [] can be used here
							'textarea_rows' => get_option( 'default_post_edit_rows', 10 ), // rows="..."
							'tabindex'      => '',
							'editor_css'    => '', // extra styles for both visual and HTML editors buttons,
							'editor_class'  => '', // add extra class(es) to the editor textarea
							'teeny'         => true, // output the minimal editor config used in Press This
							'dfw'           => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
							'tinymce'       => array(
								'toolbar1' => 'bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,wp_adv',
							), // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
							'quicktags'     => true, // load Quicktags, can be used to pass settings directly to Quicktags using an array()
						);
						wp_editor(
							$value,
							$id,
							$settings
						);
					?>
					<?php if ( ! empty( $desc ) ) { ?>
						<p> <?php echo esc_html( $desc ); ?></p>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}

}
