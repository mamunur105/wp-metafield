<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
 */

namespace PS\INIT\Model;

use PS\INIT\Fields\MissingField;
use PS\INIT\Fields\Input;
use PS\INIT\Fields\Checkbox;
use PS\INIT\Fields\Radio;
use PS\INIT\Fields\Textarea;
use PS\INIT\Fields\SwitchBtn;
use PS\INIT\Fields\ColorPicker;
use PS\INIT\Fields\RangeSlider;
use PS\INIT\Fields\ToggleSwitch;
use PS\INIT\Fields\MultiSelect;
use PS\INIT\Fields\RadioImage;
use PS\INIT\Fields\PostsSelect;
use PS\INIT\Fields\Sidebar;
use PS\INIT\Fields\Image;
use PS\INIT\Fields\Gallery;
use PS\INIT\Fields\Editor;

/**
 * Display Field.
 */
class CallTheField {
	/**
	 * Get instance;
	 *
	 * @var [type]
	 */
	private static $instance = null;

	/**
	 * Field.
	 *
	 * @var [type]
	 */
	private $field = null;

	/**
	 * Field.
	 *
	 * @var [type]
	 */
	private $settings = null;

	/**
	 * Get instance;
	 *
	 * @var [type]
	 */
	private function __construct(){}

	/**
	 * This is the static method that controls the access to the CallTheField
	 * instance. On the first run, it creates a CallTheField object and places it
	 * into the static field. On subsequent runs, it returns the client existing
	 * object stored in the static field.
	 *
	 * This implementation lets you subclass the CallTheField class while keeping
	 * just one instance of each subclass around.
	 *
	 * @param array $field is an array.
	 * @return object
	 */
	public static function init( $field, $settings = null ) {
		$defaults = array(
			'id'        => '',
			'title'     => '',
			'subtitle'  => '',
			'type'      => 'text',
			'class'     => 'd-flex',
			'desc'      => '',
			'condition' => array(
				'field'   => '',
				'value'   => '',
				'compare' => '',
			),
		);
		$field    = wp_parse_args( $field, $defaults );
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		self::$instance->field    = $field;
		self::$instance->settings = $settings;
		return self::$instance;
	}

	/**
	 * Field function.
	 *
	 * @return void
	 */
	public function get_fields() {
		$this->field['prev_value'] = $this->get_value();
		$input                     = MissingField::init( $this->field );
		$field_type                = $this->field['type'];
		if (
			is_array( $this->field )
			&& isset( $this->field['id'] )
			&& ! empty( $this->field['id'] )
			&& isset( $this->field['title'] )
			&& ! empty( $this->field['title'] )
		) {
			if ( isset( $this->field['tab'] ) ) {
				$this->field['class'] = isset( $this->field['class'] ) ? $this->field['class'] . ' tab-contents ' . $this->field['tab'] : $this->field['tab'];
			}
			switch ( $field_type ) {
				case 'number':
				case 'date':
				case 'email':
				case 'url':
				case 'text':
					$input = Input::init( $this->field );
					break;
				case 'textarea':
					$input = Textarea::init( $this->field );
					break;
				case 'checkbox':
					$input = Checkbox::init( $this->field );
					break;
				case 'radio':
					$input = Radio::init( $this->field );
					break;
				case 'select':
					$input = MultiSelect::init( $this->field );
					break;
				case 'switchbtn':
					$input = SwitchBtn::init( $this->field );
					break;
				case 'toggleswitch':
					$input = ToggleSwitch::init( $this->field );
					break;
				case 'colorpicker':
					$input = ColorPicker::init( $this->field );
					break;
				case 'rangeslider':
					$input = RangeSlider::init( $this->field );
					break;
				case 'radioimage':
					$input = RadioImage::init( $this->field );
					break;
				case 'postsselect':
					$input = PostsSelect::init( $this->field );
					break;
				case 'sidebar':
					$input = Sidebar::init( $this->field );
					break;
				case 'image':
					$input = Image::init( $this->field );
					break;
				case 'gallery':
					$input = Gallery::init( $this->field );
					break;
				case 'editor':
					$input = Editor::init( $this->field );
					break;
				default:
					break;
			}
		}
		$input->get_field();
	}
	/**
	 * Undocumented function.
	 *
	 * @return Mixed
	 */
	public function get_value() {
		$value    = 'Hello';
		$field_id = sanitize_text_field( $this->settings['id'] );
		if ( 'post_types' === $this->settings['settings_type'] ) {
			global $post;
			$value = get_post_meta( $post->ID );
		}
		return $value;
	}

}
