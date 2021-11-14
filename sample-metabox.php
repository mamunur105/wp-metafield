<?php
/**
 * Field displayed by this function.
 *
 * @package    PS Metabox
 * @subpackage PS_Metaboxes
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
		'id'         => 'picosoft_post_header_footer',
		'title'      => esc_html__( 'Container 1', 'picosoft' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'classes'    => 'picosoft-metabox-wrapper',
		'tabs'       => array(
			'tabs_one' => array(
				'label' => 'Tab One',
				'default_active' => true
			),
			'tabs_two' => array(
				'label' => 'Tab Two',
			),
		),
		'fields'     => array(
			// Gallery field is under construction.
			array(
				'id'      => 'toggleswitch_2',
				'title'   => esc_html__( 'Switch', 'picosoft' ),
				'type'    => 'toggleswitch',
				'class'   => 'testname',
				'true'    => 'TRUE',
				'false'   => 'FALSE',
				'tab'	 	=> 'tabs_one' ,
				'default' => 'false', // true or false.
				'desc'    => esc_html__( 'Checking toggleswitch Field', 'picosoft' ),
			),
			array(
				'id'        => 'editor_11',
				'title'     => esc_html__( 'Editor field', 'picosoft' ),
				'subtitle'  => esc_html__( 'Editor Subtitle', 'picosoft' ),
				'type'      => 'editor',
				'tab'	 	=> 'tabs_two' ,
				'class'     => 'testname',
				'default'   => 'Default value',
				'desc'      => esc_html__( 'Checking textarea field', 'picosoft' ),
			),
			array(
				'id'        => 'gallery_1',
				'title'     => esc_html__( 'Gallery', 'picosoft' ),
				'subtitle'  => esc_html__( 'Subtitle Gallery', 'picosoft' ),
				'type'      => 'gallery',
				'tab'	 	=> 'tabs_two' ,
				'class'     => 'testname',
				'desc'      => esc_html__( 'Checking gallery field', 'picosoft' ),
			),

			array(
				'id'    => 'image_',
				'title' => esc_html__( 'image', 'picosoft' ),
				'type'  => 'image',
				'tab'	 	=> 'tabs_two',
				'class' => 'testname',
				'desc'  => esc_html__( 'Checking image field', 'picosoft' ),
			),
			array(
				'id'    => 'sidebar_1',
				'title' => esc_html__( 'sidebar', 'picosoft' ),
				'type'  => 'sidebar',
				'tab'	 	=> 'tabs_two',
				'class' => 'testname',
				'desc'  => esc_html__( 'Checking sidebar field', 'picosoft' ),
			),
			array(
				'id'          => 'postsselect_22',
				'title'       => esc_html__( 'Postsselect Box', 'picosoft' ),
				'type'        => 'postsselect',
				'class'       => 'testname',
				'tab'	 	=> 'tabs_two',
				'multiselect' => false,
				'default'     => array( '2' ),
				'desc'        => esc_html__( 'Checking postsselect field', 'picosoft' ),
			),
			array(
				'id'      => 'radioimage_1',
				'title'   => esc_html__( 'Radioimage?', 'picosoft' ),
				'type'    => 'radioimage',
				'class'   => 'testname',
				'tab'	 	=> 'tabs_two',
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
				'desc'    => esc_html__( 'Checking radioimage field', 'picosoft' ),
			),
			array(
				'id'          => 'multiselect_11',
				'title'       => esc_html__( 'Multiselect Box', 'picosoft' ),
				'type'        => 'select',
				'class'       => 'testname',
				'tab'	 	=> 'tabs_one' ,
				'multiselect' => true,
				'default'     => array( '' ),
				'options'     => array(
					'iPhone'  => 'iPhone label text',
					'iPad'    => 'iPad label text',
					'Macbook' => 'Macbook label text',
					'iWatch'  => 'iWatch label text',
				),
				'desc'        => esc_html__( 'Checking multiselect field', 'picosoft' ),
			),

			array(
				'id'      => 'toggleswitch_1',
				'title'   => esc_html__( 'Toggleswitch', 'picosoft' ),
				'type'    => 'toggleswitch',
				'tab'	 	=> 'tabs_one' ,
				'class'   => 'testname',
				'true'    => 'YES',
				'false'   => 'NO',
				'default' => false, // true or false.
				'desc'    => esc_html__( 'Checking toggleswitch Field', 'picosoft' ),
			),
			array(
				'id'      => 'rangeslider_2',
				'title'   => esc_html__( 'Rangeslider', 'picosoft' ),
				'type'    => 'rangeslider',
				'tab'	 	=> 'tabs_one',
				'class'   => 'testname',
				'min'     => 5,
				'max'     => 1000,
				'default' => 50,
				'desc'    => esc_html__( 'Checking rangeslider Field', 'picosoft' ),
			),

			array(
				'id'      => 'rangeslider_1',
				'title'   => esc_html__( 'Rangeslider', 'picosoft' ),
				'tab'	 	=> 'tabs_one',
				'type'    => 'rangeslider',
				'class'   => 'testname',
				'default' => 500,
				'desc'    => esc_html__( 'Checking rangeslider Field', 'picosoft' ),
			),
			array(
				'id'      => 'colorpicker_1',
				'title'   => esc_html__( 'Color Picker', 'picosoft' ),
				'type'    => 'colorpicker',
				'tab'	 	=> 'tabs_one',
				'class'   => 'testname',
				'default' => '#ff0000',
				'desc'    => esc_html__( 'Checking colorpicker field', 'picosoft' ),
			),

			array(
				'id'      => 'switchbtn_1',
				'title'   => esc_html__( 'Switch?', 'picosoft' ),
				'type'    => 'switchbtn',
				'tab'	 	=> 'tabs_one',
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
				'desc'    => esc_html__( 'Checking switchbtn field', 'picosoft' ),
			),
			array(
				'id'      => 'url_1',
				'title'   => esc_html__( 'URL', 'picosoft' ),
				'type'    => 'url',
				'class'   => 'testname',
				'tab'	 	=> 'tabs_one',
				'default' => 'Default value',
				'desc'    => esc_html__( 'Checking url field', 'picosoft' ),
			),

			array(
				'id'      => 'textarea_1',
				'title'   => esc_html__( 'Textarea field', 'picosoft' ),
				'type'    => 'textarea',
				'class'   => 'testname',
				'default' => 'Default value',
				'desc'    => esc_html__( 'Checking textarea field', 'picosoft' ),
			),

			array(
				'id'      => 'select_11',
				'title'   => esc_html__( 'Select Box', 'picosoft' ),
				'type'    => 'select',
				'class'   => 'testname',
				'default' => 'iPhone',
				'options' => array(
					'iPhone'  => 'iPhone label text',
					'iPad'    => 'iPad label text',
					'Macbook' => 'Macbook label text',
					'iWatch'  => 'iWatch label text',
				),
				'desc'    => esc_html__( 'Checking select field', 'picosoft' ),
			),
			array(
				'id'      => 'checkbox_1',
				'title'   => esc_html__( 'Checkbox?', 'picosoft' ),
				'type'    => 'checkbox',
				'class'   => 'testname',
				'default' => 'iPhone',
				'options' => array(
					'iPhone'  => 'iPhone label text',
					'iPad'    => 'iPad label text',
					'Macbook' => 'Macbook label text',
					'iWatch'  => 'iWatch label text',
				),
				'desc'    => esc_html__( 'Checking checkbox Field', 'picosoft' ),
			),
			array(
				'id'      => 'radio_1',
				'title'   => esc_html__( 'Radio?', 'picosoft' ),
				'type'    => 'radio',
				'class'   => 'testname',
				'default' => 'iPhone',
				'options' => array(
					'iPhone-1'  => 'iPhone label text',
					'iPa-2'     => 'iPad label text',
					'Macbook-3' => 'Macbook label text',
					'iWatch-4'  => 'iWatch label text',
				),
				'desc'    => esc_html__( 'Checking radio field', 'picosoft' ),
			),
			array(
				'id'      => 'text_1',
				'title'   => esc_html__( 'Text field ', 'picosoft' ),
				'type'    => 'text',
				'class'   => 'testname',
				'default' => 'Default value',
				'desc'    => esc_html__( 'Checking text field', 'picosoft' ),
			),
			array(
				'id'      => 'number_1',
				'title'   => esc_html__( 'Number field', 'picosoft' ),
				'type'    => 'number',
				'class'   => 'testname',
				'default' => 'Default value',
				'desc'    => esc_html__( 'Checking number field', 'picosoft' ),
			),
			array(
				'id'      => 'date_1',
				'title'   => '<h1> Date field </h1>',
				'type'    => 'date',
				'class'   => 'testname',
				'default' => '2021-01-30', // Y-m-d.
				'desc'    => esc_html__( 'Checking date field', 'picosoft' ),
			),
			array(
				'id'      => 'email_1',
				'title'   => esc_html__( 'Email field', 'picosoft' ),
				'type'    => 'email',
				'class'   => 'testname',
				'default' => 'example@gmail.com',
				'desc'    => esc_html__( 'Checking email field', 'picosoft' ),
			),
		), // End fields.
	); // End picosoft_page_header_footer.
	return $meta_boxes;
}

add_filter( 'pssmeta_boxes', 'testing_metadata_', 99 );
