# metabox ( Under construction  )
Field type:
1. number
2. date
3. text
4. email
5. checkbox
6. radio
7. select
8. textarea
9. url
10. switchbtn
11. colorpicker
12. rangeslider
13. toggleswitch
14. multiselect
15. radioimage ( image select )
16. postsselect ( Postypes post list )
17. sidebar
18. image
19. Image Gallery
Next:

=> Conditional
=> Tab
=> Group And Repeatable

=> file
=> Editor
=> Link





Uses : 
```
<?php
/**
 * Field displayed by this function.
 *
 * @package    Codexin Metabox
 * @subpackage Codexin_Metabox
 */

/**
 * Undocumented function
 *
 * @param array $meta_boxes default metaboxes field.
 * @return array.
 */
function testing_metadata_( $meta_boxes ) {
	/*
		Fields default value.
		'id'
		'title'
		'subtitle'
		'type'
		'class'
		'desc'
	*/
	$meta_boxes[] = array(
		'id'         => 'codexin_page_header_footer',
		'title'      => esc_html__( 'Container 1', 'codexin' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'classes'    => 'codexin-metabox-wrapper',
		'fields'     => array(
			// Gallery field is under construction.
			array(
				'id'      => 'toggleswitch_2',
				'title'   => esc_html__( 'Switch', 'codexin' ),
				'type'    => 'toggleswitch',
				'class'   => 'testname',
				'true'    => 'TRUE',
				'false'   => 'FALSE',
				'default' => 'false', // true or false.
				'desc'    => esc_html__( 'Checking toggleswitch Field', 'codexin' ),
			),
			array(
				'id'       => 'editor_11',
				'title'    => esc_html__( 'Editor field', 'codexin' ),
				'subtitle' => esc_html__( 'Editor Subtitle', 'codexin' ),
				'type'     => 'editor',
				'condition'  => array(
					'field'   => 'toggleswitch_2',
					'value'   => true,
					'compare' => '=',
				),
				'class'    => 'testname',
				'default'  => 'Default value',
				'desc'     => esc_html__( 'Checking textarea field', 'codexin' ),
			),
			array(
				'id'       => 'gallery_1',
				'title'    => esc_html__( 'Gallery', 'codexin' ),
				'subtitle' => esc_html__( 'Subtitle Gallery', 'codexin' ),
				'type'     => 'gallery',
				'condition'  => array(
					'field'   => 'toggleswitch_2',
					'value'   => false,
					'compare' => '=',
				),
				'class'    => 'testname',
				'desc'     => esc_html__( 'Checking gallery field', 'codexin' ),
			),

			array(
				'id'    => 'image_',
				'title' => esc_html__( 'image', 'codexin' ),
				'type'  => 'image',
				'class' => 'testname',
				'desc'  => esc_html__( 'Checking image field', 'codexin' ),
			),
			array(
				'id'    => 'sidebar_1',
				'title' => esc_html__( 'sidebar', 'codexin' ),
				'type'  => 'sidebar',
				'class' => 'testname',
				'desc'  => esc_html__( 'Checking sidebar field', 'codexin' ),
			),
			array(
				'id'          => 'postsselect_22',
				'title'       => esc_html__( 'Postsselect Box', 'codexin' ),
				'type'        => 'postsselect',
				'class'       => 'testname',
				'multiselect' => false,
				'default'     => array( '2' ),
				'desc'        => esc_html__( 'Checking postsselect field', 'codexin' ),
			),
			array(
				'id'      => 'radioimage_1',
				'title'   => esc_html__( 'Radioimage?', 'codexin' ),
				'type'    => 'radioimage',
				'class'   => 'testname',
				'default' => 'iPhone',
				'options' => array(
					'radioimage_1' => array(
						'url'   => 'https://via.placeholder.com/150',
						'label' => 'Label 1',
					),
					'radioimage_2' => array(
						'url'   => 'https://via.placeholder.com/150',
						'label' => 'Label 2',
					),
				),
				'desc'    => esc_html__( 'Checking radioimage field', 'codexin' ),
			),
			array(
				'id'          => 'multiselect_11',
				'title'       => esc_html__( 'Multiselect Box', 'codexin' ),
				'type'        => 'select',
				'class'       => 'testname',
				'multiselect' => true,
				'default'     => array( '' ),
				'options'     => array(
					'iPhone'  => 'iPhone label text',
					'iPad'    => 'iPad label text',
					'Macbook' => 'Macbook label text',
					'iWatch'  => 'iWatch label text',
				),
				'desc'        => esc_html__( 'Checking multiselect field', 'codexin' ),
			),

			array(
				'id'      => 'toggleswitch_1',
				'title'   => esc_html__( 'Toggleswitch', 'codexin' ),
				'type'    => 'toggleswitch',
				'class'   => 'testname',
				'true'    => 'YES',
				'false'   => 'NO',
				'default' => false, // true or false.
				'desc'    => esc_html__( 'Checking toggleswitch Field', 'codexin' ),
			),
			array(
				'id'      => 'rangeslider_2',
				'title'   => esc_html__( 'Rangeslider', 'codexin' ),
				'type'    => 'rangeslider',
				'class'   => 'testname',
				'min'     => 5,
				'max'     => 1000,
				'default' => 50,
				'desc'    => esc_html__( 'Checking rangeslider Field', 'codexin' ),
			),

			array(
				'id'      => 'rangeslider_1',
				'title'   => esc_html__( 'Rangeslider', 'codexin' ),
				'type'    => 'rangeslider',
				'class'   => 'testname',
				'default' => 500,
				'desc'    => esc_html__( 'Checking rangeslider Field', 'codexin' ),
			),
			array(
				'id'      => 'colorpicker_1',
				'title'   => esc_html__( 'Color Picker', 'codexin' ),
				'type'    => 'colorpicker',
				'class'   => 'testname',
				'default' => '#ff0000',
				'desc'    => esc_html__( 'Checking colorpicker field', 'codexin' ),
			),

			array(
				'id'      => 'switchbtn_1',
				'title'   => esc_html__( 'Switch?', 'codexin' ),
				'type'    => 'switchbtn',
				'class'   => 'testname',
				'default' => 'iPhone',
				'options' => array(
					'RadioSwitch-1'  => 'RadioSwitch-1',
					'RadioSwitch-2'  => 'RadioSwitch-2',
					'RadioSwitch-3'  => 'RadioSwitch-3',
					'RadioSwitch-4'  => 'RadioSwitch-4',
					'RadioSwitch-5'  => 'RadioSwitch-5',
					'RadioSwitch-6'  => 'RadioSwitch-6',
					'RadioSwitch-7'  => 'RadioSwitch-7',
					'RadioSwitch-8'  => 'RadioSwitch-8',
					'RadioSwitch-9'  => 'RadioSwitch-9',
					'RadioSwitch-10' => 'RadioSwitch-10',
					'RadioSwitch-11' => 'RadioSwitch-11',
					'RadioSwitch-12' => 'RadioSwitch-12',
					'RadioSwitch-13' => 'RadioSwitch-13',
					'RadioSwitch-14' => 'RadioSwitch-14',
				),
				'desc'    => esc_html__( 'Checking switchbtn field', 'codexin' ),
			),
			array(
				'id'      => 'url_1',
				'title'   => esc_html__( 'URL', 'codexin' ),
				'type'    => 'url',
				'class'   => 'testname',
				'default' => 'Default value',
				'desc'    => esc_html__( 'Checking url field', 'codexin' ),
			),

			array(
				'id'      => 'textarea_1',
				'title'   => esc_html__( 'Textarea field', 'codexin' ),
				'type'    => 'textarea',
				'class'   => 'testname',
				'default' => 'Default value',
				'desc'    => esc_html__( 'Checking textarea field', 'codexin' ),
			),

			array(
				'id'      => 'select_11',
				'title'   => esc_html__( 'Select Box', 'codexin' ),
				'type'    => 'select',
				'class'   => 'testname',
				'default' => 'iPhone',
				'options' => array(
					'iPhone'  => 'iPhone label text',
					'iPad'    => 'iPad label text',
					'Macbook' => 'Macbook label text',
					'iWatch'  => 'iWatch label text',
				),
				'desc'    => esc_html__( 'Checking select field', 'codexin' ),
			),
			array(
				'id'      => 'checkbox_1',
				'title'   => esc_html__( 'Checkbox?', 'codexin' ),
				'type'    => 'checkbox',
				'class'   => 'testname',
				'default' => 'iPhone',
				'options' => array(
					'iPhone'  => 'iPhone label text',
					'iPad'    => 'iPad label text',
					'Macbook' => 'Macbook label text',
					'iWatch'  => 'iWatch label text',
				),
				'desc'    => esc_html__( 'Checking checkbox Field', 'codexin' ),
			),
			array(
				'id'      => 'radio_1',
				'title'   => esc_html__( 'Radio?', 'codexin' ),
				'type'    => 'radio',
				'class'   => 'testname',
				'default' => 'iPhone',
				'options' => array(
					'iPhone-1'  => 'iPhone label text',
					'iPa-2'     => 'iPad label text',
					'Macbook-3' => 'Macbook label text',
					'iWatch-4'  => 'iWatch label text',
				),
				'desc'    => esc_html__( 'Checking radio field', 'codexin' ),
			),
			array(
				'id'      => 'text_1',
				'title'   => esc_html__( 'Text field ', 'codexin' ),
				'type'    => 'text',
				'class'   => 'testname',
				'default' => 'Default value',
				'desc'    => esc_html__( 'Checking text field', 'codexin' ),
			),
			array(
				'id'      => 'number_1',
				'title'   => esc_html__( 'Number field', 'codexin' ),
				'type'    => 'number',
				'class'   => 'testname',
				'default' => 'Default value',
				'desc'    => esc_html__( 'Checking number field', 'codexin' ),
			),
			array(
				'id'      => 'date_1',
				'title'   => '<h1> Date field </h1>',
				'type'    => 'date',
				'class'   => 'testname',
				'default' => '2021-01-30', // Y-m-d.
				'desc'    => esc_html__( 'Checking date field', 'codexin' ),
			),
			array(
				'id'      => 'email_1',
				'title'   => esc_html__( 'Email field', 'codexin' ),
				'type'    => 'email',
				'class'   => 'testname',
				'default' => 'example@gmail.com',
				'desc'    => esc_html__( 'Checking email field', 'codexin' ),
			),
		), // End fields.
	); // End codexin_page_header_footer.
	$meta_boxes[] = array(
		'id'         => 'codexin_page_header_footer_2',
		'title'      => esc_html__( 'Container 2', 'codexin' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'classes'    => 'codexin-metabox-wrapper',
		'fields'     => array(
			array(
				'id'      => 'toggleswitch_3',
				'title'   => esc_html__( 'Toggleswitch', 'codexin' ),
				'type'    => 'toggleswitch',
				'class'   => 'testname',
				'true'    => 'TRUE',
				'false'   => 'FALSE',
				'default' => false, // true or false.
				'desc'    => esc_html__( 'Checking toggleswitch field', 'codexin' ),
			),
			array(
				'id'      => 'toggleswitch_4',
				'title'   => esc_html__( 'Toggleswitch', 'codexin' ),
				'type'    => 'toggleswitch',
				'class'   => 'testname',
				'true'    => 'YES',
				'false'   => 'NO',
				'default' => false, // true or false.
				'desc'    => esc_html__( 'Checking toggleswitch field', 'codexin' ),
			),
			array(
				'id'      => 'rangeslider_3',
				'title'   => esc_html__( 'Rangeslider', 'codexin' ),
				'type'    => 'rangeslider',
				'class'   => 'testname',
				'default' => 500,
				'desc'    => esc_html__( 'Checking rangeslider field', 'codexin' ),
			),
			array(
				'id'      => 'colorpicker_3',
				'title'   => esc_html__( 'Color Picker', 'codexin' ),
				'type'    => 'colorpicker',
				'class'   => 'testname',
				'default' => '#ff0000',
				'desc'    => esc_html__( 'Checking colorpicker field', 'codexin' ),
			),
		), // End fields.
	); // End codexin_page_header_footer.
	return $meta_boxes;
}

add_filter( 'cdxn_meta_boxes', 'testing_metadata_', 99 );
```
