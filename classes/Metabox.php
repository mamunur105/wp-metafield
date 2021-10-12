<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT;

/**
 * Display Metabox.
 */
class Metabox {

	/**
	 * Get instance;
	 *
	 * @var obaject
	 */
	public static $instance;

	/**
	 * An array inside container.
	 *
	 * @var array
	 */
	private $fields;

	/**
	 * Metabox screen
	 *
	 * @var array
	 */
	private $screen_container;

	/**
	 * Metaboxes.
	 *
	 * @param array $metaboxes is a array.
	 */
	public function __construct( $metaboxes ) {
		$container_default = array(
			'id'         => wp_generate_uuid4(),
			'title'      => 'Title',
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'classes'    => 'picosoft-metabox',
			'tab' 		 => false,
			'fields'     => array(),
		);
		$metaboxes              = wp_parse_args( $metaboxes, $container_default );
		$this->screen_container = $metaboxes;
		$this->fields           = $metaboxes['fields'];
		add_action( 'add_meta_boxes', array( $this, 'metaboxes' ) );
		add_action( 'save_post', array( $this, 'save_metadata' ), 10, 3 );
	}

	/**
	 * Metaboxes.
	 *
	 * @return void
	 */
	public function metaboxes() {
		if ( ! empty( $this->screen_container ) && is_array( $this->screen_container ) ) {
			add_meta_box(
				$this->screen_container['id'],
				$this->screen_container['title'],
				array( $this, 'show' ),
				$this->screen_container['post_types']
			);
		}
	}

	/**
	 * Display all field.
	 *
	 * @return void
	 */
	public function show() {
		if ( ! empty( $this->fields ) ) {
			$this->before_container();
			echo '<input type="hidden" name="PS_Metaboxes_nonce" value="' . esc_attr( wp_create_nonce( basename( __FILE__ ) ) ) . '" />';
			foreach ( $this->fields as $value ) {
				$get_the_field = CallTheField::init( $value );
				$get_the_field->get_fields();
			}
			$this->after_container();
		}
	}

	/**
	 * Save function
	 *
	 * @param [type] $post_id post id.
	 * @param [type] $post post object.
	 * @param [type] $update update true.
	 * @return mixed
	 */
	public function save_metadata( $post_id, $post, $update ) {
		if ( ! in_array( $post->post_type, $this->screen_container['post_types'], true ) ) {
			return $post_id;
		}
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
		// verify nonce.
		if ( isset( $_POST['PS_Metaboxes_nonce'] ) ) {
			$nonce_check = sanitize_text_field( wp_unslash( $_POST['PS_Metaboxes_nonce'] ) );
			if ( ! wp_verify_nonce( $nonce_check, basename( __FILE__ ) ) ) {
				return $post_id;
			}
		} else {
			return $post_id;
		}
		// check autosave.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		// loop through fields and save the data.
		foreach ( $this->fields as $field ) {
			$update_value = null;
			switch ( $field['type'] ) {
				case 'gallery':
				case 'number':
				case 'date':
				case 'radio':
				case 'switchbtn':
				case 'radioimage':
				case 'toggleswitch':
				case 'textarea':
				case 'colorpicker':
				case 'text':
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$update_value = sanitize_text_field( wp_unslash( $_POST[ $field['id'] ] ) );
					}
					break;
				case 'url':
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$update_value = esc_url_raw( wp_unslash( $_POST[ $field['id'] ] ) );
					}
					break;
				case 'email':
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$update_value = sanitize_email( wp_unslash( $_POST[ $field['id'] ] ) );
					}
					break;
				case 'select':
				case 'postsselect':
				case 'sidebar':
				case 'checkbox':
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$update_value = $this->sanitize_text_or_array_field( wp_unslash( $_POST[ $field['id'] ] ) );
						$update_value = maybe_serialize( $update_value );
					} else {
						$update_value = array();
					}
					break;
				case 'image':
				case 'rangeslider':
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$update_value = intval( wp_unslash( $_POST[ $field['id'] ] ) );
					}
					break;
				case 'editor':
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$update_value =  apply_filters( 'the_content', wp_unslash( $_POST[ $field['id'] ] ) );
					}
					break;
				default:
			}
			update_post_meta( $post_id, $field['id'], $update_value );
		} // end foreach
	}
	/**
	 * Before container.
	 *
	 * @return void
	 */
	public function before_container() { ?>
		<div id="<?php echo esc_attr( $this->screen_container['id'] ); ?>" class="picosoft-metabox-container <?php echo esc_attr( $this->screen_container['classes'] ); ?>">
		<?php
	}

	/**
	 * After container.
	 *
	 * @return void
	 */
	public function after_container() {
		echo '</div>';
	}

	/**
	 * Recursive sanitation for text or array
	 *
	 * @param array|string $array_or_string srray or string value.
	 * @since  0.1
	 * @return mixed
	 */
	public function sanitize_text_or_array_field( $array_or_string ) {
		if ( empty( $array_or_string ) ) {
			$array_or_string = '';
		} elseif ( is_string( $array_or_string ) ) {
			$array_or_string = sanitize_text_field( $array_or_string );
		} elseif ( is_array( $array_or_string ) ) {
			foreach ( $array_or_string as $key => &$value ) {
				if ( is_array( $value ) ) {
					$value = $this->sanitize_text_or_array_field( $value );
				} else {
					$value = sanitize_text_field( $value );
				}
			}
		}
		return $array_or_string;
	}


}
