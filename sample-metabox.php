<?php
/**
 * Field displayed by this function.
 *
 * @package    Tinyfield Metabox
 * @subpackage Tinyfield_Metaboxes
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
		'id'         => 'tinyfield_post_header_footer',
		'title'      => esc_html__( 'Container 1', 'tinyfield' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'classes'    => 'tinyfield-metabox-wrapper',
		'tabs'       => array(
			'tabs_one'   => array(
				'label'          => 'Tab One',
				'default_active' => true,
			),
			'tabs_two'   => array(
				'label' => 'Tab Two',
			),
			'tabs_three' => array(
				'label' => 'Tab Three',
			),
		),
		'tabs_type'  => 'vertical-tab',
		'fields'     => array(
			// array(
			// 	'id'      => 'toggleswitch_field_3',
			// 	'title'   => esc_html__( 'Toggle Switch 3', 'tinyfield' ),
			// 	'type'    => 'toggleswitch',
			// 	'class'   => 'testname',
			// 	'true'    => 'TRUE',
			// 	'false'   => 'FALSE',
			// 	'tab'     => 'tabs_one',
			// 	'default' => 'yes', // yes or ''.
			// 	'desc'    => esc_html__( 'Checking toggleswitch Field', 'tinyfield' ),
			// ),

			
			// Gallery field is under construction.
			array(
				'id'     => 'repeater_field',
				'title'  => esc_html__( 'Repeater Field', 'tinyfield' ),
				'tab'    => 'tabs_one',
				'type'   => 'repeater',
				'class'  => 'testname',
				'desc'   => esc_html__( 'Checking Repeater Field', 'tinyfield' ),
				'fields' => array(
					// array(
					// 	'id'      => 'rangeslider_field_2',
					// 	'title'   => esc_html__( 'Range Slider', 'tinyfield' ),
					// 	'type'    => 'rangeslider',
					// 	'tab'     => 'tabs_one',
					// 	'class'   => 'testname',
					// 	'min'     => 5,
					// 	'max'     => 1000,
					// 	'default' => 500,
					// 	'desc'    => esc_html__( 'Checking rangeslider Field', 'tinyfield' ),
					// ),

					/*
					array(
						'id'      => 'toggleswitch_field_3',
						'title'   => esc_html__( 'Toggle Switch 3', 'tinyfield' ),
						'type'    => 'toggleswitch',
						'class'   => 'testname',
						'true'    => 'TRUE',
						'false'   => 'FALSE',
						'tab'     => 'tabs_one',
						'default' => 'yes', // yes or ''.
						'desc'    => esc_html__( 'Checking toggleswitch Field', 'tinyfield' ),
					),
					array(
						'id'      => 'colorpicker_field_3',
						'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
						'type'    => 'colorpicker',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'default' => '#ff0000',
						'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
					),

					array(
						'id'       => 'gallery_field_12',
						'title'    => esc_html__( 'Gallery Image', 'tinyfield' ),
						'subtitle' => esc_html__( 'Subtitle Gallery', 'tinyfield' ),
						'type'     => 'gallery',
						'tab'      => 'tabs_one',
						'class'    => 'testname',
						'default'  => '82', // Image id '10, 15, 20'.
						'desc'     => esc_html__( 'Checking gallery field', 'tinyfield' ),
					),

					array(
						'id'        => 'toggleswitch_field_2',
						'title'     => esc_html__( 'Toggle Switch 2', 'tinyfield' ),
						'type'      => 'toggleswitch',
						'class'     => 'testname',
						'true'      => 'TRUE',
						'false'     => 'FALSE',
						'tab'       => 'tabs_one',
						'default'   => 'yes', // yes or ''.
						'desc'      => esc_html__( 'Checking toggleswitch Field', 'tinyfield' ),
						'condition' => array(
							'parent' => '.fields-wrapper',
							'action' => 'show',
							'logic'  => 'and',
							'rules'  => array(
								array(
									'name'     => 'toggleswitch_field_3',
									'operator' => 'is',
									'value'    => 'yes',
								),
							),
						),
					),

					array(
						'id'        => 'switchbtn_field_14',
						'title'     => esc_html__( 'Switch 14 ?', 'tinyfield' ),
						'type'      => 'switchbtn',
						'tab'       => 'tabs_one',
						'class'     => 'testname',
						'default'   => 'RadioSwitch-6',
						'options'   => array(
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
						'desc'      => esc_html__( 'Checking switchbtn field', 'tinyfield' ),
						'condition' => array(
							'parent' => '.fields-wrapper',
							'action' => 'show',
							'logic'  => 'and',
							'rules'  => array(
								array(
									'name'     => 'toggleswitch_field_3',
									'operator' => 'is',
									'value'    => 'yes',
								),
								array(
									'name'     => 'toggleswitch_field_2',
									'operator' => 'isnot',
									'value'    => 'yes',
								),
							),
						),
					),

					array(
						'id'      => 'switchbtn_field_13',
						'title'   => esc_html__( 'Switch?', 'tinyfield' ),
						'type'    => 'switchbtn',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'default' => 'RadioSwitch-6',
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
						'desc'    => esc_html__( 'Checking switchbtn field', 'tinyfield' ),
					),
					array(
						'id'      => 'checkbox-field-2',
						'title'   => esc_html__( 'Checkbox', 'tinyfield' ),
						'type'    => 'checkbox',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => array( 'iPhone', 'iPad' ),
						'options' => array(
							'iPhone'  => 'iPhone label text',
							'iPad'    => 'iPad label text',
							'Macbook' => 'Macbook label text',
							'iWatch'  => 'iWatch label text',
						),
						'desc'    => esc_html__( 'Checking checkbox Field', 'tinyfield' ),
					),
					// MUlti condition
					array(
						'id'        => 'colorpicker_field_4',
						'title'     => esc_html__( 'Color Picker multiconditional', 'tinyfield' ),
						'type'      => 'colorpicker',
						'tab'       => 'tabs_one',
						'class'     => 'testname',
						'default'   => '#ff0000',
						'desc'      => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
						'condition' => array(
							'parent' => '.fields-wrapper',
							'action' => 'show',
							'logic'  => 'and',
							'rules'  => array(
								array(
									'relation' => 'and',
									'group'    => array(
										array(
											'name'     => 'toggleswitch_field_3',
											'operator' => 'is',
											'value'    => 'yes',
										),
										array(
											'name'     => 'toggleswitch_field_2',
											'operator' => 'isnot',
											'value'    => 'yes',
										),
									),
								),
								array(
									'relation' => 'and',
									'group'    => array(
										array(
											'name'     => 'switchbtn_field_14',
											'operator' => 'is',
											'value'    => 'RadioSwitch-1',
										),
										array(
											'name'     => 'switchbtn_field_13',
											'operator' => 'is',
											'value'    => 'RadioSwitch-2',
										),
									),
								),
								array(
									'relation' => 'or',
									'group'    => array(
										array(
											'name'     => 'checkbox-field-2',
											'operator' => 'contains',
											'value'    => 'iPhone',
										),
									),
								),
							),
						),
					),

					array(
						'id'        => 'checkbox-field-1',
						'title'     => esc_html__( 'Checkbox', 'tinyfield' ),
						'type'      => 'checkbox',
						'class'     => 'testname',
						'tab'       => 'tabs_one',
						'default'   => array( 'iPhone', 'iPad' ),
						'options'   => array(
							'iPhone'  => 'iPhone label text',
							'iPad'    => 'iPad label text',
							'Macbook' => 'Macbook label text',
							'iWatch'  => 'iWatch label text',
						),
						'desc'      => esc_html__( 'Checking checkbox Field', 'tinyfield' ),
						'condition' => array(
							'parent' => '.fields-wrapper',
							'action' => 'show',
							'logic'  => 'and',
							'rules'  => array(
								array(
									'name'     => 'switchbtn_field_14',
									'operator' => 'is',
									'value'    => 'RadioSwitch-14',
								),
								array(
									'name'     => 'toggleswitch_field_3',
									'operator' => 'is',
									'value'    => 'yes',
								),
							),
						),
					),

					array(
						'id'      => 'colorpicker_field_3',
						'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
						'type'    => 'colorpicker',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'default' => '#ff0000',
						'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
					),

					array(
						'id'      => 'colorpicker_field_4',
						'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
						'type'    => 'colorpicker',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'default' => '#ff0000',
						'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
					),
					*/
					// array(
					// 	'id'       => 'editor_field_12',
					// 	'title'    => esc_html__( 'Editor field', 'tinyfield' ),
					// 	'subtitle' => esc_html__( 'Editor Subtitle', 'tinyfield' ),
					// 	'type'     => 'editor',
					// 	'tab'      => 'tabs_one',
					// 	'class'    => 'testname',
					// 	'default'  => 'Default value',
					// 	'desc'     => esc_html__( 'Checking textarea field', 'tinyfield' ),
					// ),
					// array(
					// 	'id'       => 'editor_field_13',
					// 	'title'    => esc_html__( 'Editor field', 'tinyfield' ),
					// 	'subtitle' => esc_html__( 'Editor Subtitle', 'tinyfield' ),
					// 	'type'     => 'editor',
					// 	'tab'      => 'tabs_one',
					// 	'class'    => 'testname',
					// 	'default'  => 'Default value',
					// 	'desc'     => esc_html__( 'Checking textarea field', 'tinyfield' ),
					// ),
					// // Make MUltiple QUery.
					/*
					array(
						'id'       => 'gallery_field_12',
						'title'    => esc_html__( 'Gallery Image', 'tinyfield' ),
						'subtitle' => esc_html__( 'Subtitle Gallery', 'tinyfield' ),
						'type'     => 'gallery',
						'tab'      => 'tabs_one',
						'class'    => 'testname',
						'default'  => '82', // Image id '10, 15, 20'.
						'desc'     => esc_html__( 'Checking gallery field', 'tinyfield' ),
					),
					array(
						'id'       => 'gallery_field_13',
						'title'    => esc_html__( 'Gallery Image', 'tinyfield' ),
						'subtitle' => esc_html__( 'Subtitle Gallery', 'tinyfield' ),
						'type'     => 'gallery',
						'tab'      => 'tabs_one',
						'class'    => 'testname',
						'default'  => '82', // Image id '10, 15, 20'.
						'desc'     => esc_html__( 'Checking gallery field', 'tinyfield' ),
					),
					// // Make MUltiple QUery.
					array(
						'id'      => 'image_field_2',
						'title'   => esc_html__( 'image', 'tinyfield' ),
						'type'    => 'image',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'default' => '82', // Single number.
						'desc'    => esc_html__( 'Checking image field', 'tinyfield' ),
					),

					array(
						'id'      => 'image_field_21',
						'title'   => esc_html__( 'image', 'tinyfield' ),
						'type'    => 'image',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'default' => '82', // Single number.
						'desc'    => esc_html__( 'Checking image field', 'tinyfield' ),
					),

					array(
						'id'      => 'number_field_11',
						'title'   => esc_html__( 'Number field', 'tinyfield' ),
						'type'    => 'number',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => '123456789',
						'desc'    => esc_html__( 'Checking number field', 'tinyfield' ),
					),

					array(
						'id'      => 'number_field_12',
						'title'   => esc_html__( 'Number field', 'tinyfield' ),
						'type'    => 'number',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => '123456789',
						'desc'    => esc_html__( 'Checking number field', 'tinyfield' ),
					),

					array(
						'id'      => 'date_field_22',
						'title'   => esc_html__( 'Date field', 'tinyfield' ),
						'type'    => 'date',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => '2021-12-22', // Date formate 2021-12-22.
						'desc'    => esc_html__( 'Checking date field', 'tinyfield' ),
					),

					array(
						'id'      => 'date_field_23',
						'title'   => esc_html__( 'Date field', 'tinyfield' ),
						'type'    => 'date',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => '2021-12-22', // Date formate 2021-12-22.
						'desc'    => esc_html__( 'Checking date field', 'tinyfield' ),
					),

					array(
						'id'      => 'email_field_33',
						'title'   => esc_html__( 'Email field', 'tinyfield' ),
						'type'    => 'email',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => 'testname@gmail.com',
						'desc'    => esc_html__( 'Checking email field', 'tinyfield' ),
					),

					array(
						'id'      => 'email_field_34',
						'title'   => esc_html__( 'Email field', 'tinyfield' ),
						'type'    => 'email',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => 'testname@gmail.com',
						'desc'    => esc_html__( 'Checking email field', 'tinyfield' ),
					),

					array(
						'id'      => 'url_field_44',
						'title'   => esc_html__( 'URl field', 'tinyfield' ),
						'type'    => 'url',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => 'https://www.facebook.com/',
						'desc'    => esc_html__( 'Checking url field', 'tinyfield' ),
					),

					array(
						'id'      => 'url_field_45',
						'title'   => esc_html__( 'URl field', 'tinyfield' ),
						'type'    => 'url',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => 'https://www.facebook.com/',
						'desc'    => esc_html__( 'Checking url field', 'tinyfield' ),
					),

					array(
						'id'      => 'text_field_55',
						'title'   => esc_html__( 'Text field', 'tinyfield' ),
						'type'    => 'text',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => 'testname testname',
						'desc'    => esc_html__( 'Checking text field', 'tinyfield' ),
					),

					array(
						'id'      => 'text_field_56',
						'title'   => esc_html__( 'Text field', 'tinyfield' ),
						'type'    => 'text',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => 'testname testname',
						'desc'    => esc_html__( 'Checking text field', 'tinyfield' ),
					),
					*/
					array(
						'id'          => 'multiselect_field_15',
						'title'       => esc_html__( 'Multiselect Box', 'tinyfield' ),
						'type'        => 'select',
						'class'       => 'testname',
						'tab'         => 'tabs_one',
						'multiselect' => true,
						'default'     => array( 'iPhone', 'iPad' ),
						'options'     => array(
							'iPhone'  => 'iPhone label text',
							'iPad'    => 'iPad label text',
							'Macbook' => 'Macbook label text',
							'iWatch'  => 'iWatch label text',
						),
						'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
					),

					array(
						'id'          => 'multiselect_field_16',
						'title'       => esc_html__( 'Multiselect Box', 'tinyfield' ),
						'type'        => 'select',
						'class'       => 'testname',
						'tab'         => 'tabs_one',
						'multiselect' => true,
						'default'     => array( 'iPhone', 'iPad' ),
						'options'     => array(
							'iPhone'  => 'iPhone label text',
							'iPad'    => 'iPad label text',
							'Macbook' => 'Macbook label text',
							'iWatch'  => 'iWatch label text',
						),
						'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
					),

					array(
						'id'          => 'multiselect_field_255',
						'title'       => esc_html__( 'Multiselect Disable', 'tinyfield' ),
						'type'        => 'select',
						'class'       => 'testname',
						'tab'         => 'tabs_one',
						'multiselect' => false,
						'default'     => array( 'iWatch' ),
						'options'     => array(
							'iPhone'  => 'iPhone label text',
							'iPad'    => 'iPad label text',
							'Macbook' => 'Macbook label text',
							'iWatch'  => 'iWatch label text',
						),
						'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
					),
					array(
						'id'          => 'multiselect_field_256',
						'title'       => esc_html__( 'Multiselect Disable', 'tinyfield' ),
						'type'        => 'select',
						'class'       => 'testname',
						'tab'         => 'tabs_one',
						'multiselect' => false,
						'default'     => array( 'iWatch' ),
						'options'     => array(
							'iPhone'  => 'iPhone label text',
							'iPad'    => 'iPad label text',
							'Macbook' => 'Macbook label text',
							'iWatch'  => 'iWatch label text',
						),
						'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
					),
					/*
					// // Make MUltiple QUery.
					array(
						'id'          => 'postsselect_2255',
						'title'       => esc_html__( 'Postsselect Box', 'tinyfield' ),
						'type'        => 'postsselect',
						'class'       => 'testname',
						'tab'         => 'tabs_one',
						'post_types'  => array( 'post' ),
						'multiselect' => false,
						'default'     => array( '1' ),
						'desc'        => esc_html__( 'Checking postsselect field', 'tinyfield' ),
					),

					array(
						'id'          => 'postsselect_2256',
						'title'       => esc_html__( 'Postsselect Box', 'tinyfield' ),
						'type'        => 'postsselect',
						'class'       => 'testname',
						'tab'         => 'tabs_one',
						'post_types'  => array( 'post' ),
						'multiselect' => false,
						'default'     => array( '1' ),
						'desc'        => esc_html__( 'Checking postsselect field', 'tinyfield' ),
					),

					array(
						'id'      => 'radio_field_122',
						'title'   => esc_html__( 'Radio', 'tinyfield' ),
						'type'    => 'radio',
						'class'   => 'testname',
						'default' => 'iPa-2',
						'tab'     => 'tabs_one',
						'options' => array(
							'iPhone-1'  => 'iPhone label text',
							'iPa-2'     => 'iPad label text',
							'Macbook-3' => 'Macbook label text',
							'iWatch-4'  => 'iWatch label text',
						),
						'desc'    => esc_html__( 'Checking radio field', 'tinyfield' ),
					),

					array(
						'id'      => 'radio_field_123',
						'title'   => esc_html__( 'Radio', 'tinyfield' ),
						'type'    => 'radio',
						'class'   => 'testname',
						'default' => 'iPa-2',
						'tab'     => 'tabs_one',
						'options' => array(
							'iPhone-1'  => 'iPhone label text',
							'iPa-2'     => 'iPad label text',
							'Macbook-3' => 'Macbook label text',
							'iWatch-4'  => 'iWatch label text',
						),
						'desc'    => esc_html__( 'Checking radio field', 'tinyfield' ),
					),

					array(
						'id'      => 'radioimage_field_25',
						'title'   => esc_html__( 'Radio Image', 'tinyfield' ),
						'type'    => 'radioimage',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'column'  => 5,
						'default' => 'radioimage_4',
						'options' => array(
							'radioimage_1' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 1',
							),
							'radioimage_2' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 2',
							),
							'radioimage_3' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 3',
							),
							'radioimage_4' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 4',
							),
							'radioimage_5' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 5',
							),
						),
						'desc'    => esc_html__( 'Checking radioimage field', 'tinyfield' ),
					),

					array(
						'id'      => 'radioimage_field_255',
						'title'   => esc_html__( 'Radio Image', 'tinyfield' ),
						'type'    => 'radioimage',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'column'  => 5,
						'default' => 'radioimage_4',
						'options' => array(
							'radioimage_1' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 1',
							),
							'radioimage_2' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 2',
							),
							'radioimage_3' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 3',
							),
							'radioimage_4' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 4',
							),
							'radioimage_5' => array(
								'url'   => 'https://via.placeholder.com/150',
								'label' => 'Label 5',
							),
						),
						'desc'    => esc_html__( 'Checking radioimage field', 'tinyfield' ),
					),

					array(
						'id'      => 'rangeslider_field_2',
						'title'   => esc_html__( 'Range Slider', 'tinyfield' ),
						'type'    => 'rangeslider',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'min'     => 5,
						'max'     => 1000,
						'default' => 500,
						'desc'    => esc_html__( 'Checking rangeslider Field', 'tinyfield' ),
					),

					array(
						'id'      => 'rangeslider_field_21',
						'title'   => esc_html__( 'Range Slider', 'tinyfield' ),
						'type'    => 'rangeslider',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'min'     => 5,
						'max'     => 1000,
						'default' => 500,
						'desc'    => esc_html__( 'Checking rangeslider Field', 'tinyfield' ),
					),

					array(
						'id'      => 'sidebar_field_1',
						'title'   => esc_html__( 'Sidebar', 'tinyfield' ),
						'type'    => 'sidebar',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'default' => array( 'sidebar-1' ),
						'desc'    => esc_html__( 'Checking sidebar field', 'tinyfield' ),
					),

					array(
						'id'      => 'sidebar_field_2',
						'title'   => esc_html__( 'Sidebar', 'tinyfield' ),
						'type'    => 'sidebar',
						'tab'     => 'tabs_one',
						'class'   => 'testname',
						'default' => array( 'sidebar-1' ),
						'desc'    => esc_html__( 'Checking sidebar field', 'tinyfield' ),
					),

					array(
						'id'      => 'textarea_field_1000',
						'title'   => esc_html__( 'Textarea field', 'tinyfield' ),
						'type'    => 'textarea',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => 'Default value Default value',
						'desc'    => esc_html__( 'Checking textarea field', 'tinyfield' ),
					),

					array(
						'id'      => 'textarea_field_1001',
						'title'   => esc_html__( 'Textarea field', 'tinyfield' ),
						'type'    => 'textarea',
						'class'   => 'testname',
						'tab'     => 'tabs_one',
						'default' => 'Default value Default value',
						'desc'    => esc_html__( 'Checking textarea field', 'tinyfield' ),
					),*/

				),
			),

			// array(
			// 	'id'     => 'repeater_field_2',
			// 	'title'  => esc_html__( 'Repeater Field', 'tinyfield' ),
			// 	'tab'    => 'tabs_one',
			// 	'type'   => 'repeater',
			// 	'class'  => 'testname',
			// 	'desc'   => esc_html__( 'Checking Repeater Field', 'tinyfield' ),
			// 	'fields' => array(
			// 		array(
			// 			'id'      => 'colorpicker_field_3',
			// 			'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
			// 			'type'    => 'colorpicker',
			// 			'tab'     => 'tabs_one',
			// 			'class'   => 'testname',
			// 			'default' => '#ff0000',
			// 			'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
			// 		),
			// 	),

			// ),

			// array(
			// 	'id'      => 'toggleswitch_field_3',
			// 	'title'   => esc_html__( 'Toggle Switch 3', 'tinyfield' ),
			// 	'type'    => 'toggleswitch',
			// 	'class'   => 'testname',
			// 	'true'    => 'TRUE',
			// 	'false'   => 'FALSE',
			// 	'tab'     => 'tabs_one',
			// 	'default' => '', // yes or ''.
			// 	'desc'    => esc_html__( 'Checking toggleswitch Field', 'tinyfield' ),
			// ),
			// array(
			// 	'id'        => 'toggleswitch_field_2',
			// 	'title'     => esc_html__( 'Toggle Switch 2', 'tinyfield' ),
			// 	'type'      => 'toggleswitch',
			// 	'class'     => 'testname',
			// 	'true'      => 'TRUE',
			// 	'false'     => 'FALSE',
			// 	'tab'       => 'tabs_one',
			// 	'default'   => 'yes', // yes or ''.
			// 	'desc'      => esc_html__( 'Checking toggleswitch Field', 'tinyfield' ),
			// 	'condition' => array(
			// 		'parent' => '.fields-wrapper',
			// 		'action' => 'show',
			// 		'logic'  => 'and',
			// 		'rules'  => array(
			// 			array(
			// 				'name'     => 'toggleswitch_field_3',
			// 				'operator' => 'is',
			// 				'value'    => 'yes',
			// 			),
			// 		),
			// 	),
			// ),

			// array(
			// 	'id'        => 'switchbtn_field_14',
			// 	'title'     => esc_html__( 'Switch 14 ?', 'tinyfield' ),
			// 	'type'      => 'switchbtn',
			// 	'tab'       => 'tabs_one',
			// 	'class'     => 'testname',
			// 	'default'   => 'RadioSwitch-6',
			// 	'options'   => array(
			// 		'RadioSwitch-1'  => 'RadioSwitch-1',
			// 		'RadioSwitch-2'  => 'RadioSwitch-2',
			// 		'RadioSwitch-3'  => 'RadioSwitch-3',
			// 		'RadioSwitch-4'  => 'RadioSwitch-4',
			// 		'RadioSwitch-5'  => 'RadioSwitch-5',
			// 		'RadioSwitch-6'  => 'RadioSwitch-6',
			// 		'RadioSwitch-7'  => 'RadioSwitch-7',
			// 		'RadioSwitch-8'  => 'RadioSwitch-8',
			// 		'RadioSwitch-9'  => 'RadioSwitch-9',
			// 		'RadioSwitch-10' => 'RadioSwitch-10',
			// 		'RadioSwitch-11' => 'RadioSwitch-11',
			// 		'RadioSwitch-12' => 'RadioSwitch-12',
			// 		'RadioSwitch-13' => 'RadioSwitch-13',
			// 		'RadioSwitch-14' => 'RadioSwitch-14',
			// 	),
			// 	'desc'      => esc_html__( 'Checking switchbtn field', 'tinyfield' ),
			// 	'condition' => array(
			// 		'parent' => '.fields-wrapper',
			// 		'action' => 'show',
			// 		'logic'  => 'and',
			// 		'rules'  => array(
			// 			array(
			// 				'name'     => 'toggleswitch_field_3',
			// 				'operator' => 'is',
			// 				'value'    => 'yes',
			// 			),
			// 			array(
			// 				'name'     => 'toggleswitch_field_2',
			// 				'operator' => 'isnot',
			// 				'value'    => 'yes',
			// 			),
			// 		),
			// 	),
			// ),

			// array(
			// 	'id'      => 'switchbtn_field_13',
			// 	'title'   => esc_html__( 'Switch?', 'tinyfield' ),
			// 	'type'    => 'switchbtn',
			// 	'tab'     => 'tabs_one',
			// 	'class'   => 'testname',
			// 	'default' => 'RadioSwitch-6',
			// 	'options' => array(
			// 		'RadioSwitch-1'  => 'RadioSwitch-1',
			// 		'RadioSwitch-2'  => 'RadioSwitch-2',
			// 		'RadioSwitch-3'  => 'RadioSwitch-3',
			// 		'RadioSwitch-4'  => 'RadioSwitch-4',
			// 		'RadioSwitch-5'  => 'RadioSwitch-5',
			// 		'RadioSwitch-6'  => 'RadioSwitch-6',
			// 		'RadioSwitch-7'  => 'RadioSwitch-7',
			// 		'RadioSwitch-8'  => 'RadioSwitch-8',
			// 		'RadioSwitch-9'  => 'RadioSwitch-9',
			// 		'RadioSwitch-10' => 'RadioSwitch-10',
			// 		'RadioSwitch-11' => 'RadioSwitch-11',
			// 		'RadioSwitch-12' => 'RadioSwitch-12',
			// 		'RadioSwitch-13' => 'RadioSwitch-13',
			// 		'RadioSwitch-14' => 'RadioSwitch-14',
			// 	),
			// 	'desc'    => esc_html__( 'Checking switchbtn field', 'tinyfield' ),
			// ),
			// array(
			// 	'id'      => 'checkbox-field-2',
			// 	'title'   => esc_html__( 'Checkbox', 'tinyfield' ),
			// 	'type'    => 'checkbox',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => array( 'iPhone', 'iPad' ),
			// 	'options' => array(
			// 		'iPhone'  => 'iPhone label text',
			// 		'iPad'    => 'iPad label text',
			// 		'Macbook' => 'Macbook label text',
			// 		'iWatch'  => 'iWatch label text',
			// 	),
			// 	'desc'    => esc_html__( 'Checking checkbox Field', 'tinyfield' ),
			// ),
			// // MUlti condition
			// array(
			// 	'id'        => 'colorpicker_field_4',
			// 	'title'     => esc_html__( 'Color Picker multiconditional', 'tinyfield' ),
			// 	'type'      => 'colorpicker',
			// 	'tab'       => 'tabs_one',
			// 	'class'     => 'testname',
			// 	'default'   => '#ff0000',
			// 	'desc'      => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
			// 	'condition' => array(
			// 		'parent' => '.fields-wrapper',
			// 		'action' => 'show',
			// 		'logic'  => 'and',
			// 		'rules'  => array(
			// 			array(
			// 				'relation' => 'and',
			// 				'group'    => array(
			// 					array(
			// 						'name'     => 'toggleswitch_field_3',
			// 						'operator' => 'is',
			// 						'value'    => 'yes',
			// 					),
			// 					array(
			// 						'name'     => 'toggleswitch_field_2',
			// 						'operator' => 'isnot',
			// 						'value'    => 'yes',
			// 					),
			// 				),
			// 			),
			// 			array(
			// 				'relation' => 'and',
			// 				'group'    => array(
			// 					array(
			// 						'name'     => 'switchbtn_field_14',
			// 						'operator' => 'is',
			// 						'value'    => 'RadioSwitch-1',
			// 					),
			// 					array(
			// 						'name'     => 'switchbtn_field_13',
			// 						'operator' => 'is',
			// 						'value'    => 'RadioSwitch-2',
			// 					),
			// 				),
			// 			),
			// 			array(
			// 				'relation' => 'or',
			// 				'group'    => array(
			// 					array(
			// 						'name'     => 'checkbox-field-2',
			// 						'operator' => 'contains',
			// 						'value'    => 'iPhone',
			// 					),
			// 				),
			// 			),
			// 		),
			// 	),
			// ),

			// array(
			// 	'id'        => 'checkbox-field-1',
			// 	'title'     => esc_html__( 'Checkbox', 'tinyfield' ),
			// 	'type'      => 'checkbox',
			// 	'class'     => 'testname',
			// 	'tab'       => 'tabs_one',
			// 	'default'   => array( 'iPhone', 'iPad' ),
			// 	'options'   => array(
			// 		'iPhone'  => 'iPhone label text',
			// 		'iPad'    => 'iPad label text',
			// 		'Macbook' => 'Macbook label text',
			// 		'iWatch'  => 'iWatch label text',
			// 	),
			// 	'desc'      => esc_html__( 'Checking checkbox Field', 'tinyfield' ),
			// 	'condition' => array(
			// 		'parent' => '.fields-wrapper',
			// 		'action' => 'show',
			// 		'logic'  => 'and',
			// 		'rules'  => array(
			// 			array(
			// 				'name'     => 'switchbtn_field_14',
			// 				'operator' => 'is',
			// 				'value'    => 'RadioSwitch-14',
			// 			),
			// 			array(
			// 				'name'     => 'toggleswitch_field_3',
			// 				'operator' => 'is',
			// 				'value'    => 'yes',
			// 			),
			// 		),
			// 	),
			// ),

			// array(
			// 	'id'      => 'colorpicker_field_3',
			// 	'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
			// 	'type'    => 'colorpicker',
			// 	'tab'     => 'tabs_one',
			// 	'class'   => 'testname',
			// 	'default' => '#ff0000',
			// 	'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'colorpicker_field_4',
			// 	'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
			// 	'type'    => 'colorpicker',
			// 	'tab'     => 'tabs_one',
			// 	'class'   => 'testname',
			// 	'default' => '#ff0000',
			// 	'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'       => 'editor_field_12',
			// 	'title'    => esc_html__( 'Editor field', 'tinyfield' ),
			// 	'subtitle' => esc_html__( 'Editor Subtitle', 'tinyfield' ),
			// 	'type'     => 'editor',
			// 	'tab'      => 'tabs_one',
			// 	'class'    => 'testname',
			// 	'default'  => 'Default value',
			// 	'desc'     => esc_html__( 'Checking textarea field', 'tinyfield' ),
			// ),
			// array(
			// 	'id'       => 'editor_field_13',
			// 	'title'    => esc_html__( 'Editor field', 'tinyfield' ),
			// 	'subtitle' => esc_html__( 'Editor Subtitle', 'tinyfield' ),
			// 	'type'     => 'editor',
			// 	'tab'      => 'tabs_one',
			// 	'class'    => 'testname',
			// 	'default'  => 'Default value',
			// 	'desc'     => esc_html__( 'Checking textarea field', 'tinyfield' ),
			// ),
			// // // Make MUltiple QUery.

			// array(
			// 	'id'       => 'gallery_field_12',
			// 	'title'    => esc_html__( 'Gallery Image', 'tinyfield' ),
			// 	'subtitle' => esc_html__( 'Subtitle Gallery', 'tinyfield' ),
			// 	'type'     => 'gallery',
			// 	'tab'      => 'tabs_one',
			// 	'class'    => 'testname',
			// 	'default'  => '82', // Image id '10, 15, 20'.
			// 	'desc'     => esc_html__( 'Checking gallery field', 'tinyfield' ),
			// ),
			// array(
			// 	'id'       => 'gallery_field_13',
			// 	'title'    => esc_html__( 'Gallery Image', 'tinyfield' ),
			// 	'subtitle' => esc_html__( 'Subtitle Gallery', 'tinyfield' ),
			// 	'type'     => 'gallery',
			// 	'tab'      => 'tabs_one',
			// 	'class'    => 'testname',
			// 	'default'  => '82', // Image id '10, 15, 20'.
			// 	'desc'     => esc_html__( 'Checking gallery field', 'tinyfield' ),
			// ),
			// // // Make MUltiple QUery.
			// array(
			// 	'id'      => 'image_field_2',
			// 	'title'   => esc_html__( 'image', 'tinyfield' ),
			// 	'type'    => 'image',
			// 	'tab'     => 'tabs_one',
			// 	'class'   => 'testname',
			// 	'default' => '82', // Single number.
			// 	'desc'    => esc_html__( 'Checking image field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'image_field_21',
			// 	'title'   => esc_html__( 'image', 'tinyfield' ),
			// 	'type'    => 'image',
			// 	'tab'     => 'tabs_one',
			// 	'class'   => 'testname',
			// 	'default' => '82', // Single number.
			// 	'desc'    => esc_html__( 'Checking image field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'number_field_11',
			// 	'title'   => esc_html__( 'Number field', 'tinyfield' ),
			// 	'type'    => 'number',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => '123456789',
			// 	'desc'    => esc_html__( 'Checking number field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'number_field_12',
			// 	'title'   => esc_html__( 'Number field', 'tinyfield' ),
			// 	'type'    => 'number',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => '123456789',
			// 	'desc'    => esc_html__( 'Checking number field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'date_field_22',
			// 	'title'   => esc_html__( 'Date field', 'tinyfield' ),
			// 	'type'    => 'date',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => '2021-12-22', // Date formate 2021-12-22.
			// 	'desc'    => esc_html__( 'Checking date field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'date_field_23',
			// 	'title'   => esc_html__( 'Date field', 'tinyfield' ),
			// 	'type'    => 'date',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => '2021-12-22', // Date formate 2021-12-22.
			// 	'desc'    => esc_html__( 'Checking date field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'email_field_33',
			// 	'title'   => esc_html__( 'Email field', 'tinyfield' ),
			// 	'type'    => 'email',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => 'testname@gmail.com',
			// 	'desc'    => esc_html__( 'Checking email field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'email_field_34',
			// 	'title'   => esc_html__( 'Email field', 'tinyfield' ),
			// 	'type'    => 'email',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => 'testname@gmail.com',
			// 	'desc'    => esc_html__( 'Checking email field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'url_field_44',
			// 	'title'   => esc_html__( 'URl field', 'tinyfield' ),
			// 	'type'    => 'url',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => 'https://www.facebook.com/',
			// 	'desc'    => esc_html__( 'Checking url field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'url_field_45',
			// 	'title'   => esc_html__( 'URl field', 'tinyfield' ),
			// 	'type'    => 'url',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => 'https://www.facebook.com/',
			// 	'desc'    => esc_html__( 'Checking url field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'text_field_55',
			// 	'title'   => esc_html__( 'Text field', 'tinyfield' ),
			// 	'type'    => 'text',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => 'testname testname',
			// 	'desc'    => esc_html__( 'Checking text field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'text_field_56',
			// 	'title'   => esc_html__( 'Text field', 'tinyfield' ),
			// 	'type'    => 'text',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => 'testname testname',
			// 	'desc'    => esc_html__( 'Checking text field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'          => 'multiselect_field_15',
			// 	'title'       => esc_html__( 'Multiselect Box', 'tinyfield' ),
			// 	'type'        => 'select',
			// 	'class'       => 'testname',
			// 	'tab'         => 'tabs_one',
			// 	'multiselect' => true,
			// 	'default'     => array( 'iPhone', 'iPad' ),
			// 	'options'     => array(
			// 		'iPhone'  => 'iPhone label text',
			// 		'iPad'    => 'iPad label text',
			// 		'Macbook' => 'Macbook label text',
			// 		'iWatch'  => 'iWatch label text',
			// 	),
			// 	'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'          => 'multiselect_field_16',
			// 	'title'       => esc_html__( 'Multiselect Box', 'tinyfield' ),
			// 	'type'        => 'select',
			// 	'class'       => 'testname',
			// 	'tab'         => 'tabs_one',
			// 	'multiselect' => true,
			// 	'default'     => array( 'iPhone', 'iPad' ),
			// 	'options'     => array(
			// 		'iPhone'  => 'iPhone label text',
			// 		'iPad'    => 'iPad label text',
			// 		'Macbook' => 'Macbook label text',
			// 		'iWatch'  => 'iWatch label text',
			// 	),
			// 	'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'          => 'multiselect_field_255',
			// 	'title'       => esc_html__( 'Multiselect Disable', 'tinyfield' ),
			// 	'type'        => 'select',
			// 	'class'       => 'testname',
			// 	'tab'         => 'tabs_one',
			// 	'multiselect' => false,
			// 	'default'     => array( 'iWatch' ),
			// 	'options'     => array(
			// 		'iPhone'  => 'iPhone label text',
			// 		'iPad'    => 'iPad label text',
			// 		'Macbook' => 'Macbook label text',
			// 		'iWatch'  => 'iWatch label text',
			// 	),
			// 	'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
			// ),
			// array(
			// 	'id'          => 'multiselect_field_256',
			// 	'title'       => esc_html__( 'Multiselect Disable', 'tinyfield' ),
			// 	'type'        => 'select',
			// 	'class'       => 'testname',
			// 	'tab'         => 'tabs_one',
			// 	'multiselect' => false,
			// 	'default'     => array( 'iWatch' ),
			// 	'options'     => array(
			// 		'iPhone'  => 'iPhone label text',
			// 		'iPad'    => 'iPad label text',
			// 		'Macbook' => 'Macbook label text',
			// 		'iWatch'  => 'iWatch label text',
			// 	),
			// 	'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
			// ),

			// // // Make MUltiple QUery.
			// array(
			// 	'id'          => 'postsselect_2255',
			// 	'title'       => esc_html__( 'Postsselect Box', 'tinyfield' ),
			// 	'type'        => 'postsselect',
			// 	'class'       => 'testname',
			// 	'tab'         => 'tabs_one',
			// 	'post_types'  => array( 'post' ),
			// 	'multiselect' => false,
			// 	'default'     => array( '1' ),
			// 	'desc'        => esc_html__( 'Checking postsselect field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'          => 'postsselect_2256',
			// 	'title'       => esc_html__( 'Postsselect Box', 'tinyfield' ),
			// 	'type'        => 'postsselect',
			// 	'class'       => 'testname',
			// 	'tab'         => 'tabs_one',
			// 	'post_types'  => array( 'post' ),
			// 	'multiselect' => false,
			// 	'default'     => array( '1' ),
			// 	'desc'        => esc_html__( 'Checking postsselect field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'radio_field_122',
			// 	'title'   => esc_html__( 'Radio', 'tinyfield' ),
			// 	'type'    => 'radio',
			// 	'class'   => 'testname',
			// 	'default' => 'iPa-2',
			// 	'tab'     => 'tabs_one',
			// 	'options' => array(
			// 		'iPhone-1'  => 'iPhone label text',
			// 		'iPa-2'     => 'iPad label text',
			// 		'Macbook-3' => 'Macbook label text',
			// 		'iWatch-4'  => 'iWatch label text',
			// 	),
			// 	'desc'    => esc_html__( 'Checking radio field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'radio_field_123',
			// 	'title'   => esc_html__( 'Radio', 'tinyfield' ),
			// 	'type'    => 'radio',
			// 	'class'   => 'testname',
			// 	'default' => 'iPa-2',
			// 	'tab'     => 'tabs_one',
			// 	'options' => array(
			// 		'iPhone-1'  => 'iPhone label text',
			// 		'iPa-2'     => 'iPad label text',
			// 		'Macbook-3' => 'Macbook label text',
			// 		'iWatch-4'  => 'iWatch label text',
			// 	),
			// 	'desc'    => esc_html__( 'Checking radio field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'radioimage_field_25',
			// 	'title'   => esc_html__( 'Radio Image', 'tinyfield' ),
			// 	'type'    => 'radioimage',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'column'  => 5,
			// 	'default' => 'radioimage_4',
			// 	'options' => array(
			// 		'radioimage_1' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 1',
			// 		),
			// 		'radioimage_2' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 2',
			// 		),
			// 		'radioimage_3' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 3',
			// 		),
			// 		'radioimage_4' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 4',
			// 		),
			// 		'radioimage_5' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 5',
			// 		),
			// 	),
			// 	'desc'    => esc_html__( 'Checking radioimage field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'radioimage_field_255',
			// 	'title'   => esc_html__( 'Radio Image', 'tinyfield' ),
			// 	'type'    => 'radioimage',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'column'  => 5,
			// 	'default' => 'radioimage_4',
			// 	'options' => array(
			// 		'radioimage_1' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 1',
			// 		),
			// 		'radioimage_2' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 2',
			// 		),
			// 		'radioimage_3' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 3',
			// 		),
			// 		'radioimage_4' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 4',
			// 		),
			// 		'radioimage_5' => array(
			// 			'url'   => 'https://via.placeholder.com/150',
			// 			'label' => 'Label 5',
			// 		),
			// 	),
			// 	'desc'    => esc_html__( 'Checking radioimage field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'rangeslider_field_2',
			// 	'title'   => esc_html__( 'Range Slider', 'tinyfield' ),
			// 	'type'    => 'rangeslider',
			// 	'tab'     => 'tabs_one',
			// 	'class'   => 'testname',
			// 	'min'     => 5,
			// 	'max'     => 1000,
			// 	'default' => 500,
			// 	'desc'    => esc_html__( 'Checking rangeslider Field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'rangeslider_field_21',
			// 	'title'   => esc_html__( 'Range Slider', 'tinyfield' ),
			// 	'type'    => 'rangeslider',
			// 	'tab'     => 'tabs_one',
			// 	'class'   => 'testname',
			// 	'min'     => 5,
			// 	'max'     => 1000,
			// 	'default' => 500,
			// 	'desc'    => esc_html__( 'Checking rangeslider Field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'sidebar_field_1',
			// 	'title'   => esc_html__( 'Sidebar', 'tinyfield' ),
			// 	'type'    => 'sidebar',
			// 	'tab'     => 'tabs_one',
			// 	'class'   => 'testname',
			// 	'default' => array( 'sidebar-1' ),
			// 	'desc'    => esc_html__( 'Checking sidebar field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'sidebar_field_2',
			// 	'title'   => esc_html__( 'Sidebar', 'tinyfield' ),
			// 	'type'    => 'sidebar',
			// 	'tab'     => 'tabs_one',
			// 	'class'   => 'testname',
			// 	'default' => array( 'sidebar-1' ),
			// 	'desc'    => esc_html__( 'Checking sidebar field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'textarea_field_1000',
			// 	'title'   => esc_html__( 'Textarea field', 'tinyfield' ),
			// 	'type'    => 'textarea',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => 'Default value Default value',
			// 	'desc'    => esc_html__( 'Checking textarea field', 'tinyfield' ),
			// ),

			// array(
			// 	'id'      => 'textarea_field_1001',
			// 	'title'   => esc_html__( 'Textarea field', 'tinyfield' ),
			// 	'type'    => 'textarea',
			// 	'class'   => 'testname',
			// 	'tab'     => 'tabs_one',
			// 	'default' => 'Default value Default value',
			// 	'desc'    => esc_html__( 'Checking textarea field', 'tinyfield' ),
			// ),

		), // End fields.
	); // End tinyfield_page_header_footer.
	return $meta_boxes;
}
add_filter( 'tinyfield_post_meta_boxes', 'testing_metadata_', 99 );


/**
 * Undocumented function
 *
 * @param array $meta_boxes default metaboxes field.
 * @return array.
 */

function testing_settings( $settings ) {
	/*
		Fields default value.
		'id'
		'title'
		'subtitle'
		'type'
		'class'
		'desc'
	*/
	$settings[] = array(
		'id'         => 'tinyfield_settings_header',
		'menu_title' => esc_html__( 'Container 1', 'tinyfield' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'classes'    => 'tinyfield-metabox-wrapper',
		'tabs'       => array(
			'tabs_one'   => array(
				'label'          => 'Tab One',
				'default_active' => true,
			),
			'tabs_two'   => array(
				'label' => 'Tab Two',
			),
			'tabs_three' => array(
				'label' => 'Tab Three',
			),
		),
		'tabs_type'  => 'vertical-tab',
		'fields'     => array(
			// Gallery field is under construction.
			array(
				'id'      => 'toggleswitch_field_3',
				'title'   => esc_html__( 'Toggle Switch', 'tinyfield' ),
				'type'    => 'toggleswitch',
				'class'   => 'testname',
				'true'    => 'TRUE',
				'false'   => 'FALSE',
				'tab'     => 'tabs_one',
				'default' => 'yes', // yes or ''.
				'desc'    => esc_html__( 'Checking toggleswitch Field', 'tinyfield' ),
			),
			array(
				'id'      => 'checkbox-field-5',
				'title'   => esc_html__( 'Checkbox', 'tinyfield' ),
				'type'    => 'checkbox',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => array( 'iPhone', 'Macbook' ),
				'options' => array(
					'iPhone'  => 'iPhone label text',
					'iPad'    => 'iPad label text',
					'Macbook' => 'Macbook label text',
					'iWatch'  => 'iWatch label text',
				),
				'desc'    => esc_html__( 'Checking checkbox Field', 'tinyfield' ),
			),

			array(
				'id'      => 'colorpicker_field_2',
				'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
				'type'    => 'colorpicker',
				'tab'     => 'tabs_one',
				'class'   => 'testname',
				'default' => '#ff0000',
				'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
			),

			// array(
			// 	'id'       => 'editor_field_12',
			// 	'title'    => esc_html__( 'Editor field', 'tinyfield' ),
			// 	'subtitle' => esc_html__( 'Editor Subtitle', 'tinyfield' ),
			// 	'type'     => 'editor',
			// 	'tab'      => 'tabs_one',
			// 	'class'    => 'testname',
			// 	'default'  => 'Default value',
			// 	'desc'     => esc_html__( 'Checking textarea field', 'tinyfield' ),
			// ),

			// // Make MUltiple QUery.

			array(
				'id'       => 'gallery_field_1',
				'title'    => esc_html__( 'Gallery', 'tinyfield' ),
				'subtitle' => esc_html__( 'Subtitle Gallery', 'tinyfield' ),
				'type'     => 'gallery',
				'tab'      => 'tabs_one',
				'class'    => 'testname',
				'default'  => '82', // Image id '10, 15, 20'.
				'desc'     => esc_html__( 'Checking gallery field', 'tinyfield' ),
			),

			// Make MUltiple QUery.
			array(
				'id'      => 'image_field_2',
				'title'   => esc_html__( 'image', 'tinyfield' ),
				'type'    => 'image',
				'tab'     => 'tabs_one',
				'class'   => 'testname',
				'default' => '82', // Single number.
				'desc'    => esc_html__( 'Checking image field', 'tinyfield' ),
			),

			array(
				'id'      => 'number_field_1',
				'title'   => esc_html__( 'Number field', 'tinyfield' ),
				'type'    => 'number',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => '123456789',
				'desc'    => esc_html__( 'Checking number field', 'tinyfield' ),
			),

			array(
				'id'      => 'date_field_2',
				'title'   => esc_html__( 'Date field', 'tinyfield' ),
				'type'    => 'date',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => '2021-12-22', // Date formate 2021-12-22.
				'desc'    => esc_html__( 'Checking date field', 'tinyfield' ),
			),

			array(
				'id'      => 'email_field_3',
				'title'   => esc_html__( 'Email field', 'tinyfield' ),
				'type'    => 'email',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => 'testname@gmail.com',
				'desc'    => esc_html__( 'Checking email field', 'tinyfield' ),
			),

			array(
				'id'      => 'url_field_4',
				'title'   => esc_html__( 'URl field', 'tinyfield' ),
				'type'    => 'url',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => 'https://www.facebook.com/',
				'desc'    => esc_html__( 'Checking url field', 'tinyfield' ),
			),

			array(
				'id'      => 'text_field_7',
				'title'   => esc_html__( 'Text field', 'tinyfield' ),
				'type'    => 'text',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => '',
				'desc'    => esc_html__( 'Checking text field', 'tinyfield' ),
			),

			array(
				'id'          => 'multiselect_field_13',
				'title'       => esc_html__( 'Multiselect Box', 'tinyfield' ),
				'type'        => 'select',
				'class'       => 'testname',
				'tab'         => 'tabs_one',
				'multiselect' => true,
				'default'     => array( 'iPhone', 'Macbook' ),
				'options'     => array(
					'iPhone'  => 'iPhone label text',
					'iPad'    => 'iPad label text',
					'Macbook' => 'Macbook label text',
					'iWatch'  => 'iWatch label text',
				),
				'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
			),

			array(
				'id'          => 'multiselect_field_20',
				'title'       => esc_html__( 'Multiselect Disable', 'tinyfield' ),
				'type'        => 'select',
				'class'       => 'testname',
				'tab'         => 'tabs_one',
				'multiselect' => false,
				'default'     => array( 'iWatch' ),
				'options'     => array(
					'iPhone'  => 'iPhone label text',
					'iPad'    => 'iPad label text',
					'Macbook' => 'Macbook label text',
					'iWatch'  => 'iWatch label text',
				),
				'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
			),

			// // Make MUltiple QUery.
			array(
				'id'          => 'postsselect_22',
				'title'       => esc_html__( 'Postsselect Box', 'tinyfield' ),
				'type'        => 'postsselect',
				'class'       => 'testname',
				'tab'         => 'tabs_one',
				'post_types'  => array( 'post' ),
				'multiselect' => false,
				'default'     => array( '2' ),
				'desc'        => esc_html__( 'Checking postsselect field', 'tinyfield' ),
			),

			array(
				'id'      => 'radio_field_8',
				'title'   => esc_html__( 'Radio', 'tinyfield' ),
				'type'    => 'radio',
				'class'   => 'testname',
				'default' => 'iPa-2',
				'tab'     => 'tabs_one',
				'options' => array(
					'iPhone-1'  => 'iPhone label text',
					'iPa-2'     => 'iPad label text',
					'Macbook-3' => 'Macbook label text',
					'iWatch-4'  => 'iWatch label text',
				),
				'desc'    => esc_html__( 'Checking radio field', 'tinyfield' ),
			),

			array(
				'id'      => 'radioimage_field_5',
				'title'   => esc_html__( 'Radio Image', 'tinyfield' ),
				'type'    => 'radioimage',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'column'  => 5,
				'default' => 'radioimage_4',
				'options' => array(
					'radioimage_1' => array(
						'url'   => 'https://via.placeholder.com/150',
						'label' => 'Label 1',
					),
					'radioimage_2' => array(
						'url'   => 'https://via.placeholder.com/150',
						'label' => 'Label 2',
					),
					'radioimage_3' => array(
						'url'   => 'https://via.placeholder.com/150',
						'label' => 'Label 3',
					),
					'radioimage_4' => array(
						'url'   => 'https://via.placeholder.com/150',
						'label' => 'Label 4',
					),
					'radioimage_5' => array(
						'url'   => 'https://via.placeholder.com/150',
						'label' => 'Label 5',
					),
				),
				'desc'    => esc_html__( 'Checking radioimage field', 'tinyfield' ),
			),

			array(
				'id'      => 'rangeslider_field_2',
				'title'   => esc_html__( 'Range Slider', 'tinyfield' ),
				'type'    => 'rangeslider',
				'tab'     => 'tabs_one',
				'class'   => 'testname',
				'min'     => 5,
				'max'     => 1000,
				'default' => 50,
				'desc'    => esc_html__( 'Checking rangeslider Field', 'tinyfield' ),
			),

			array(
				'id'      => 'sidebar_field_1ppff',
				'title'   => esc_html__( 'Sidebar', 'tinyfield' ),
				'type'    => 'sidebar',
				'tab'     => 'tabs_one',
				'class'   => 'testname',
				'default' => array( 'sidebar-1' ),
				'desc'    => esc_html__( 'Checking sidebar field', 'tinyfield' ),
			),

			array(
				'id'      => 'textarea_field_2',
				'title'   => esc_html__( 'Textarea field', 'tinyfield' ),
				'type'    => 'textarea',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => 'Default value Default value',
				'desc'    => esc_html__( 'Checking textarea field', 'tinyfield' ),
			),

		), // End fields.
	); // End tinyfield_page_header_footer.
	// $settings[] = array(
	// 'id'         => 'tinyfield_settings_footer',
	// 'menu_title' => esc_html__( 'Container 1', 'tinyfield' ),
	// 'context'    => 'normal',
	// 'priority'   => 'high',
	// 'classes'    => 'tinyfield-metabox-wrapper',
	// 'tabs'       => array(
	// 'tabs_one'   => array(
	// 'label'          => 'Tab One',
	// 'default_active' => true,
	// ),
	// 'tabs_two'   => array(
	// 'label' => 'Tab Two',
	// ),
	// 'tabs_three' => array(
	// 'label' => 'Tab Three',
	// ),
	// ),
	// 'tabs_type'  => 'vertical-tab',
	// 'fields'     => array(
	// Gallery field is under construction.

	// array(
	// 'id'      => 'toggleswitch_field_3',
	// 'title'   => esc_html__( 'Toggle Switch', 'tinyfield' ),
	// 'type'    => 'toggleswitch',
	// 'class'   => 'testname',
	// 'true'    => 'TRUE',
	// 'false'   => 'FALSE',
	// 'tab'     => 'tabs_one',
	// 'default' => 'yes', // yes or ''.
	// 'desc'    => esc_html__( 'Checking toggleswitch Field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'checkbox-field-5',
	// 'title'   => esc_html__( 'Checkbox', 'tinyfield' ),
	// 'type'    => 'checkbox',
	// 'class'   => 'testname',
	// 'tab'     => 'tabs_one',
	// 'default' => array( 'iPhone', 'Macbook' ),
	// 'options' => array(
	// 'iPhone'  => 'iPhone label text',
	// 'iPad'    => 'iPad label text',
	// 'Macbook' => 'Macbook label text',
	// 'iWatch'  => 'iWatch label text',
	// ),
	// 'desc'    => esc_html__( 'Checking checkbox Field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'colorpicker_field_2',
	// 'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
	// 'type'    => 'colorpicker',
	// 'tab'     => 'tabs_one',
	// 'class'   => 'testname',
	// 'default' => '#ff0000',
	// 'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
	// ),

	// array(
	// 'id'       => 'editor_field_12',
	// 'title'    => esc_html__( 'Editor field', 'tinyfield' ),
	// 'subtitle' => esc_html__( 'Editor Subtitle', 'tinyfield' ),
	// 'type'     => 'editor',
	// 'tab'      => 'tabs_one',
	// 'class'    => 'testname',
	// 'default'  => 'Default value',
	// 'desc'     => esc_html__( 'Checking textarea field', 'tinyfield' ),
	// ),

	// Make MUltiple QUery.

	// array(
	// 'id'       => 'gallery_field_1',
	// 'title'    => esc_html__( 'Gallery', 'tinyfield' ),
	// 'subtitle' => esc_html__( 'Subtitle Gallery', 'tinyfield' ),
	// 'type'     => 'gallery',
	// 'tab'      => 'tabs_one',
	// 'class'    => 'testname',
	// 'default'  => '82', // Image id '10, 15, 20'.
	// 'desc'     => esc_html__( 'Checking gallery field', 'tinyfield' ),
	// ),

	// Make MUltiple QUery.
	// array(
	// 'id'      => 'image_field_2',
	// 'title'   => esc_html__( 'image', 'tinyfield' ),
	// 'type'    => 'image',
	// 'tab'     => 'tabs_one',
	// 'class'   => 'testname',
	// 'default' => '82', // Single number.
	// 'desc'    => esc_html__( 'Checking image field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'number_field_1',
	// 'title'   => esc_html__( 'Number field', 'tinyfield' ),
	// 'type'    => 'number',
	// 'class'   => 'testname',
	// 'tab'     => 'tabs_one',
	// 'default' => '123456789',
	// 'desc'    => esc_html__( 'Checking number field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'date_field_2',
	// 'title'   => esc_html__( 'Date field', 'tinyfield' ),
	// 'type'    => 'date',
	// 'class'   => 'testname',
	// 'tab'     => 'tabs_one',
	// 'default' => '2021-12-22', // Date formate 2021-12-22.
	// 'desc'    => esc_html__( 'Checking date field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'email_field_3',
	// 'title'   => esc_html__( 'Email field', 'tinyfield' ),
	// 'type'    => 'email',
	// 'class'   => 'testname',
	// 'tab'     => 'tabs_one',
	// 'default' => 'testname@gmail.com',
	// 'desc'    => esc_html__( 'Checking email field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'url_field_4',
	// 'title'   => esc_html__( 'URl field', 'tinyfield' ),
	// 'type'    => 'url',
	// 'class'   => 'testname',
	// 'tab'     => 'tabs_one',
	// 'default' => 'https://www.facebook.com/',
	// 'desc'    => esc_html__( 'Checking url field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'text_field_6',
	// 'title'   => esc_html__( 'Text field', 'tinyfield' ),
	// 'type'    => 'text',
	// 'class'   => 'testname',
	// 'tab'     => 'tabs_one',
	// 'default' => 'testname testname',
	// 'desc'    => esc_html__( 'Checking text field', 'tinyfield' ),
	// ),

	// array(
	// 'id'          => 'multiselect_field_11',
	// 'title'       => esc_html__( 'Multiselect Box', 'tinyfield' ),
	// 'type'        => 'select',
	// 'class'       => 'testname',
	// 'tab'         => 'tabs_one',
	// 'multiselect' => true,
	// 'default'     => array( 'iPhone', 'Macbook' ),
	// 'options'     => array(
	// 'iPhone'  => 'iPhone label text',
	// 'iPad'    => 'iPad label text',
	// 'Macbook' => 'Macbook label text',
	// 'iWatch'  => 'iWatch label text',
	// ),
	// 'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
	// ),

	// array(
	// 'id'          => 'multiselect_field_20',
	// 'title'       => esc_html__( 'Multiselect Disable', 'tinyfield' ),
	// 'type'        => 'select',
	// 'class'       => 'testname',
	// 'tab'         => 'tabs_one',
	// 'multiselect' => false,
	// 'default'     => array( 'iWatch' ),
	// 'options'     => array(
	// 'iPhone'  => 'iPhone label text',
	// 'iPad'    => 'iPad label text',
	// 'Macbook' => 'Macbook label text',
	// 'iWatch'  => 'iWatch label text',
	// ),
	// 'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
	// ),

	// Make MUltiple QUery.
	// array(
	// 'id'          => 'postsselect_22',
	// 'title'       => esc_html__( 'Postsselect Box', 'tinyfield' ),
	// 'type'        => 'postsselect',
	// 'class'       => 'testname',
	// 'tab'         => 'tabs_one',
	// 'post_types'  => array( 'post' ),
	// 'multiselect' => false,
	// 'default'     => array( '2' ),
	// 'desc'        => esc_html__( 'Checking postsselect field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'radio_field_1',
	// 'title'   => esc_html__( 'Radio', 'tinyfield' ),
	// 'type'    => 'radio',
	// 'class'   => 'testname',
	// 'default' => 'iPa-2',
	// 'tab'     => 'tabs_one',
	// 'options' => array(
	// 'iPhone-1'  => 'iPhone label text',
	// 'iPa-2'     => 'iPad label text',
	// 'Macbook-3' => 'Macbook label text',
	// 'iWatch-4'  => 'iWatch label text',
	// ),
	// 'desc'    => esc_html__( 'Checking radio field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'radioimage_field_2',
	// 'title'   => esc_html__( 'Radio Image', 'tinyfield' ),
	// 'type'    => 'radioimage',
	// 'class'   => 'testname',
	// 'tab'     => 'tabs_one',
	// 'column'  => 5,
	// 'default' => 'radioimage_4',
	// 'options' => array(
	// 'radioimage_1' => array(
	// 'url'   => 'https://via.placeholder.com/150',
	// 'label' => 'Label 1',
	// ),
	// 'radioimage_2' => array(
	// 'url'   => 'https://via.placeholder.com/150',
	// 'label' => 'Label 2',
	// ),
	// 'radioimage_3' => array(
	// 'url'   => 'https://via.placeholder.com/150',
	// 'label' => 'Label 2',
	// ),
	// 'radioimage_4' => array(
	// 'url'   => 'https://via.placeholder.com/150',
	// 'label' => 'Label 2',
	// ),
	// 'radioimage_5' => array(
	// 'url'   => 'https://via.placeholder.com/150',
	// 'label' => 'Label 2',
	// ),
	// ),
	// 'desc'    => esc_html__( 'Checking radioimage field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'rangeslider_field_2',
	// 'title'   => esc_html__( 'Range Slider', 'tinyfield' ),
	// 'type'    => 'rangeslider',
	// 'tab'     => 'tabs_one',
	// 'class'   => 'testname',
	// 'min'     => 5,
	// 'max'     => 1000,
	// 'default' => 50,
	// 'desc'    => esc_html__( 'Checking rangeslider Field', 'tinyfield' ),
	// ),

	// array(
	// 'id'    => 'sidebar_field_1',
	// 'title' => esc_html__( 'Sidebar', 'tinyfield' ),
	// 'type'  => 'sidebar',
	// 'tab'   => 'tabs_one',
	// 'class' => 'testname',
	// 'default' => array( 'sidebar-1' ),
	// 'desc'  => esc_html__( 'Checking sidebar field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'switchbtn_field_1',
	// 'title'   => esc_html__( 'Switch?', 'tinyfield' ),
	// 'type'    => 'switchbtn',
	// 'tab'     => 'tabs_one',
	// 'class'   => 'testname',
	// 'default' => 'RadioSwitch-6',
	// 'options' => array(
	// 'RadioSwitch-1'  => 'RadioSwitch-1',
	// 'RadioSwitch-2'  => 'RadioSwitch-2',
	// 'RadioSwitch-3'  => 'RadioSwitch-3',
	// 'RadioSwitch-4'  => 'RadioSwitch-4',
	// 'RadioSwitch-5'  => 'RadioSwitch-5',
	// 'RadioSwitch-6'  => 'RadioSwitch-6',
	// 'RadioSwitch-7'  => 'RadioSwitch-7',
	// 'RadioSwitch-8'  => 'RadioSwitch-8',
	// 'RadioSwitch-9'  => 'RadioSwitch-9',
	// 'RadioSwitch-10' => 'RadioSwitch-10',
	// 'RadioSwitch-11' => 'RadioSwitch-11',
	// 'RadioSwitch-12' => 'RadioSwitch-12',
	// 'RadioSwitch-13' => 'RadioSwitch-13',
	// 'RadioSwitch-14' => 'RadioSwitch-14',
	// ),
	// 'desc'    => esc_html__( 'Checking switchbtn field', 'tinyfield' ),
	// ),

	// array(
	// 'id'      => 'textarea_field_1',
	// 'title'   => esc_html__( 'Textarea field', 'tinyfield' ),
	// 'type'    => 'textarea',
	// 'class'   => 'testname',
	// 'tab'     => 'tabs_one',
	// 'default' => 'Default value Default value',
	// 'desc'    => esc_html__( 'Checking textarea field', 'tinyfield' ),
	// ),

	// ), // End fields.
	// );
	// End tinyfield_page_header_footer.
	return $settings;
}

add_filter( 'tinyfield_setting', 'testing_settings', 99 );


/**
 * Undocumented function
 *
 * @param array $meta_boxes default metaboxes field.
 * @return array.
 */
function texonomy_metadata_( $meta_boxes ) {
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
		'id'             => 'tinyfield_post_header_footer',
		'title'          => esc_html__( 'Container 1', 'tinyfield' ),
		'taxonomy _name' => array( 'post_tag' ),
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		'classes'        => 'tinyfield-metabox-wrapper',
		'fields'         => array(
			// Gallery field is under construction.
			// array(
			// 'id'      => 'toggleswitch_1',
			// 'title'   => esc_html__( 'Toggle Switch', 'tinyfield' ),
			// 'type'    => 'toggleswitch',
			// 'class'   => 'testname',
			// 'true'    => 'TRUE',
			// 'false'   => 'FALSE',
			// 'tab'     => 'tabs_one',
			// 'default' => 'false', // true or false.
			// 'desc'    => esc_html__( 'Checking toggleswitch Field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'checkbox_1',
			// 'title'   => esc_html__( 'Checkbox', 'tinyfield' ),
			// 'type'    => 'checkbox',
			// 'class'   => 'testname',
			// 'tab'     => 'tabs_one',
			// 'default' => 'iPhone',
			// 'options' => array(
			// 'iPhone'  => 'iPhone label text',
			// 'iPad'    => 'iPad label text',
			// 'Macbook' => 'Macbook label text',
			// 'iWatch'  => 'iWatch label text',
			// ),
			// 'desc'    => esc_html__( 'Checking checkbox Field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'colorpicker_1',
			// 'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
			// 'type'    => 'colorpicker',
			// 'tab'     => 'tabs_one',
			// 'class'   => 'testname',
			// 'default' => '#ff0000',
			// 'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
			// ),
			// array(
			// 'id'       => 'editor_11',
			// 'title'    => esc_html__( 'Editor field', 'tinyfield' ),
			// 'subtitle' => esc_html__( 'Editor Subtitle', 'tinyfield' ),
			// 'type'     => 'editor',
			// 'tab'      => 'tabs_one',
			// 'class'    => 'testname',
			// 'default'  => 'Default value',
			// 'desc'     => esc_html__( 'Checking textarea field', 'tinyfield' ),
			// ),

			// array(
			// 'id'       => 'gallery_1',
			// 'title'    => esc_html__( 'Gallery', 'tinyfield' ),
			// 'subtitle' => esc_html__( 'Subtitle Gallery', 'tinyfield' ),
			// 'type'     => 'gallery',
			// 'tab'      => 'tabs_one',
			// 'class'    => 'testname',
			// 'desc'     => esc_html__( 'Checking gallery field', 'tinyfield' ),
			// ),

			// array(
			// 'id'    => 'image_',
			// 'title' => esc_html__( 'image', 'tinyfield' ),
			// 'type'  => 'image',
			// 'tab'   => 'tabs_one',
			// 'class' => 'testname',
			// 'desc'  => esc_html__( 'Checking image field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'number_1',
			// 'title'   => esc_html__( 'Number field', 'tinyfield' ),
			// 'type'    => 'number',
			// 'class'   => 'testname',
			// 'tab'     => 'tabs_one',
			// 'default' => 'Default value',
			// 'desc'    => esc_html__( 'Checking number field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'date_2',
			// 'title'   => esc_html__( 'Date field', 'tinyfield' ),
			// 'type'    => 'date',
			// 'class'   => 'testname',
			// 'tab'     => 'tabs_one',
			// 'default' => 'Default value',
			// 'desc'    => esc_html__( 'Checking date field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'email_3',
			// 'title'   => esc_html__( 'Email field', 'tinyfield' ),
			// 'type'    => 'email',
			// 'class'   => 'testname',
			// 'tab'     => 'tabs_one',
			// 'default' => '',
			// 'desc'    => esc_html__( 'Checking email field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'url_4',
			// 'title'   => esc_html__( 'URl field', 'tinyfield' ),
			// 'type'    => 'url',
			// 'class'   => 'testname',
			// 'tab'     => 'tabs_one',
			// 'default' => '',
			// 'desc'    => esc_html__( 'Checking url field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'text_5',
			// 'title'   => esc_html__( 'Text field', 'tinyfield' ),
			// 'type'    => 'text',
			// 'class'   => 'testname',
			// 'tab'     => 'tabs_one',
			// 'default' => '',
			// 'desc'    => esc_html__( 'Checking text field', 'tinyfield' ),
			// ),
			// array(
			// 'id'          => 'multiselect_11',
			// 'title'       => esc_html__( 'Multiselect Box', 'tinyfield' ),
			// 'type'        => 'select',
			// 'class'       => 'testname',
			// 'tab'         => 'tabs_one',
			// 'multiselect' => true,
			// 'default'     => array( '' ),
			// 'options'     => array(
			// 'iPhone'  => 'iPhone label text',
			// 'iPad'    => 'iPad label text',
			// 'Macbook' => 'Macbook label text',
			// 'iWatch'  => 'iWatch label text',
			// ),
			// 'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
			// ),

			// array(
			// 'id'          => 'multiselect_20',
			// 'title'       => esc_html__( 'Multiselect Disable', 'tinyfield' ),
			// 'type'        => 'select',
			// 'class'       => 'testname',
			// 'tab'         => 'tabs_one',
			// 'multiselect' => false,
			// 'default'     => array( '' ),
			// 'options'     => array(
			// 'iPhone'  => 'iPhone label text',
			// 'iPad'    => 'iPad label text',
			// 'Macbook' => 'Macbook label text',
			// 'iWatch'  => 'iWatch label text',
			// ),
			// 'desc'        => esc_html__( 'Checking multiselect field', 'tinyfield' ),
			// ),

			// array(
			// 'id'          => 'postsselect_22',
			// 'title'       => esc_html__( 'Postsselect Box', 'tinyfield' ),
			// 'type'        => 'postsselect',
			// 'class'       => 'testname',
			// 'tab'         => 'tabs_one',
			// 'post_types'  => array( 'post', 'page' ),
			// 'multiselect' => false,
			// 'default'     => array( '2' ),
			// 'desc'        => esc_html__( 'Checking postsselect field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'radio_1',
			// 'title'   => esc_html__( 'Radio?', 'tinyfield' ),
			// 'type'    => 'radio',
			// 'class'   => 'testname',
			// 'default' => 'iPhone',
			// 'tab'     => 'tabs_one',
			// 'options' => array(
			// 'iPhone-1'  => 'iPhone label text',
			// 'iPa-2'     => 'iPad label text',
			// 'Macbook-3' => 'Macbook label text',
			// 'iWatch-4'  => 'iWatch label text',
			// ),
			// 'desc'    => esc_html__( 'Checking radio field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'radioimage_2',
			// 'title'   => esc_html__( 'Radio Image', 'tinyfield' ),
			// 'type'    => 'radioimage',
			// 'class'   => 'testname',
			// 'tab'     => 'tabs_one',
			// 'default' => 'iPhone',
			// 'options' => array(
			// 'radioimage_1' => array(
			// 'url'   => 'https://via.placeholder.com/150',
			// 'label' => 'Label 1',
			// ),
			// 'radioimage_2' => array(
			// 'url'   => 'https://via.placeholder.com/150',
			// 'label' => 'Label 2',
			// ),
			// ),
			// 'desc'    => esc_html__( 'Checking radioimage field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'rangeslider_2',
			// 'title'   => esc_html__( 'Range Slider', 'tinyfield' ),
			// 'type'    => 'rangeslider',
			// 'tab'     => 'tabs_one',
			// 'class'   => 'testname',
			// 'min'     => 5,
			// 'max'     => 1000,
			// 'default' => 50,
			// 'desc'    => esc_html__( 'Checking rangeslider Field', 'tinyfield' ),
			// ),
			// array(
			// 'id'    => 'sidebar_1',
			// 'title' => esc_html__( 'Sidebar', 'tinyfield' ),
			// 'type'  => 'sidebar',
			// 'tab'   => 'tabs_one',
			// 'class' => 'testname',
			// 'desc'  => esc_html__( 'Checking sidebar field', 'tinyfield' ),
			// ),

			// array(
			// 'id'      => 'switchbtn_1',
			// 'title'   => esc_html__( 'Switch?', 'tinyfield' ),
			// 'type'    => 'switchbtn',
			// 'tab'     => 'tabs_one',
			// 'class'   => 'testname',
			// 'default' => 'iPhone',
			// 'options' => array(
			// 'RadioSwitch-1'  => 'RadioSwitch-1',
			// 'RadioSwitch-2'  => 'RadioSwitch-2',
			// 'RadioSwitch-3'  => 'RadioSwitch-3',
			// 'RadioSwitch-4'  => 'RadioSwitch-4',
			// 'RadioSwitch-5'  => 'RadioSwitch-5',
			// 'RadioSwitch-6'  => 'RadioSwitch-6',
			// 'RadioSwitch-7'  => 'RadioSwitch-7',
			// 'RadioSwitch-8'  => 'RadioSwitch-8',
			// 'RadioSwitch-9'  => 'RadioSwitch-9',
			// 'RadioSwitch-10' => 'RadioSwitch-10',
			// 'RadioSwitch-11' => 'RadioSwitch-11',
			// 'RadioSwitch-12' => 'RadioSwitch-12',
			// 'RadioSwitch-13' => 'RadioSwitch-13',
			// 'RadioSwitch-14' => 'RadioSwitch-14',
			// ),
			// 'desc'    => esc_html__( 'Checking switchbtn field', 'tinyfield' ),
			// ),
			// array(
			// 'id'      => 'textarea_1',
			// 'title'   => esc_html__( 'Textarea field', 'tinyfield' ),
			// 'type'    => 'textarea',
			// 'class'   => 'testname',
			// 'tab'     => 'tabs_one',
			// 'default' => 'Default value',
			// 'desc'    => esc_html__( 'Checking textarea field', 'tinyfield' ),
			// ),
		), // End fields.
	); // End tinyfield_page_header_footer.
	return $meta_boxes;
}
// add_filter( 'tiny_tex_meta_boxes', 'texonomy_metadata_', 99 );
