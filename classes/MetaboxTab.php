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
class MetaboxTab extends Metabox{


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

	



}
