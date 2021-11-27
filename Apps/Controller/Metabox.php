<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Controller;

use PS\INIT\Abstracts\AbsController;
use PS\INIT\Model\CallTheField;
/**
 * Display Metabox.
 */
class Metabox extends AbsController {

	/**
	 * Metaboxes.
	 *
	 * @param array $metaboxes is a array.
	 */
	public function __construct( $metaboxes ) {
		$this->settings = $this->set_settings( $metaboxes );
		$this->fields   = $this->settings['fields'];
		add_action( 'add_meta_boxes', array( $this, 'add_settings' ) );
		add_action( 'save_post', array( $this, 'save_settings' ), 10, 3 );
	}

	/**
	 * Undocumented function
	 *
	 * @param [array] $settings settings field.
	 * @return array
	 */
	private function set_settings( $settings ) {
		$default = array(
			'id'         => wp_generate_uuid4(),
			'title'      => 'Title',
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'classes'    => 'picosoft-metabox',
			'tabs'       => true,
			'fields'     => array(),
		);
		if ( isset( $settings['post_types'] ) && empty( $settings['post_types'] ) ) {
			$settings['post_types'] = array( 'post' );
		}
		return array_merge( $default, $settings );
	}

	/**
	 * Metaboxes.
	 *
	 * @return void
	 */
	public function add_settings() {
		if ( ! empty( $this->settings ) && is_array( $this->settings ) ) {
			add_meta_box(
				$this->settings['id'],
				$this->settings['title'],
				array( $this, 'from_field' ),
				$this->settings['post_types']
			);
		}
	}

	/**
	 * Display all field.
	 *
	 * @return void
	 */
	public function from_field() {
		if ( ! empty( $this->fields ) ) {
			$this->before_container();
			parent::from_field();
			foreach ( $this->fields as $field ) {
				$field['settings_type'] = 'metabox_settings';
				$get_the_field          = CallTheField::init( $field );
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
	public function save_settings( $post_id, $post, $updated ) {
		if ( ! in_array( $post->post_type, $this->settings['post_types'], true ) ) {
			return $post_id;
		}
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
		// check autosave.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		error_log(print_r('Ok',true),3,__DIR__."/log.txt");
		parent::save_settings( $post_id, $post, $updated );
	}


}
