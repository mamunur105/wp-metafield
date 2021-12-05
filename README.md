# metabox ( Under construction  )
Field type:
01. number
02. date
03. email
04. url
05. text
06. textarea
07. checkbox
08. radio
09. select
10. switchbtn
11. toggleswitch
12. colorpicker
13. rangeslider
14. radioimage
15. postsselect
16. sidebar
17. image
18. gallery
19. editor
20. Tab



Next Upcoming Field and option:
=> Conditional
=> Group And Repeatable
=> file
=> Link


Uses As metabox:
```

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
			// Gallery field is under construction.
			/*
			array(
				'id'      => 'toggleswitch_field_1',
				'title'   => esc_html__( 'Toggle Switch', 'tinyfield' ),
				'type'    => 'toggleswitch',
				'class'   => 'testname',
				'true'    => 'TRUE',
				'false'   => 'FALSE',
				'tab'     => 'tabs_one',
				'default' => 'yes', // yes or ''.
				'desc'    => esc_html__( 'Checking toggleswitch Field', 'tinyfield' ),
			),
			*/
			/*
			array(
				'id'      => 'checkbox-field-1',
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
			*/
			/*
			array(
				'id'      => 'colorpicker_field_2',
				'title'   => esc_html__( 'Color Picker', 'tinyfield' ),
				'type'    => 'colorpicker',
				'tab'     => 'tabs_one',
				'class'   => 'testname',
				'default' => '#ff0000',
				'desc'    => esc_html__( 'Checking colorpicker field', 'tinyfield' ),
			),
			*/
			/*
			array(
				'id'       => 'editor_field_11',
				'title'    => esc_html__( 'Editor field', 'tinyfield' ),
				'subtitle' => esc_html__( 'Editor Subtitle', 'tinyfield' ),
				'type'     => 'editor',
				'tab'      => 'tabs_one',
				'class'    => 'testname',
				'default'  => 'Default value',
				'desc'     => esc_html__( 'Checking textarea field', 'tinyfield' ),
			),
			// // Make MUltiple QUery.
			*/
			/*
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
			*/
			/*
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
			*/
			/*
			array(
				'id'      => 'number_field_1',
				'title'   => esc_html__( 'Number field', 'tinyfield' ),
				'type'    => 'number',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => '123456789',
				'desc'    => esc_html__( 'Checking number field', 'tinyfield' ),
			),
			*/
			/*
			array(
				'id'      => 'date_field_2',
				'title'   => esc_html__( 'Date field', 'tinyfield' ),
				'type'    => 'date',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => '2021-12-22', // Date formate 2021-12-22.
				'desc'    => esc_html__( 'Checking date field', 'tinyfield' ),
			),
			*/
			/*
			array(
				'id'      => 'email_field_3',
				'title'   => esc_html__( 'Email field', 'tinyfield' ),
				'type'    => 'email',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => 'testname@gmail.com',
				'desc'    => esc_html__( 'Checking email field', 'tinyfield' ),
			),
			*/
			/*
			array(
				'id'      => 'url_field_4',
				'title'   => esc_html__( 'URl field', 'tinyfield' ),
				'type'    => 'url',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => 'https://www.facebook.com/',
				'desc'    => esc_html__( 'Checking url field', 'tinyfield' ),
			),
			*/
			/*
			array(
				'id'      => 'text_field_5',
				'title'   => esc_html__( 'Text field', 'tinyfield' ),
				'type'    => 'text',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => 'testname testname',
				'desc'    => esc_html__( 'Checking text field', 'tinyfield' ),
			),
			*/
			/*
			array(
				'id'          => 'multiselect_field_11',
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
			*/
			/*
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
			*/
			/*
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
			*/
			/*
			array(
				'id'      => 'radio_field_1',
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
			*/
			/*
			array(
				'id'      => 'radioimage_field_2',
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
						'label' => 'Label 2',
					),
					'radioimage_4' => array(
						'url'   => 'https://via.placeholder.com/150',
						'label' => 'Label 2',
					),
					'radioimage_5' => array(
						'url'   => 'https://via.placeholder.com/150',
						'label' => 'Label 2',
					),
				),
				'desc'    => esc_html__( 'Checking radioimage field', 'tinyfield' ),
			),
			*/
			/*
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
			*/
			/*
			array(
				'id'    => 'sidebar_field_1',
				'title' => esc_html__( 'Sidebar', 'tinyfield' ),
				'type'  => 'sidebar',
				'tab'   => 'tabs_one',
				'class' => 'testname',
				'default' => array( 'sidebar-1' ),
				'desc'  => esc_html__( 'Checking sidebar field', 'tinyfield' ),
			),
			*/
			/*
			array(
				'id'      => 'switchbtn_field_1',
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
			*/
			/*
			array(
				'id'      => 'textarea_field_1',
				'title'   => esc_html__( 'Textarea field', 'tinyfield' ),
				'type'    => 'textarea',
				'class'   => 'testname',
				'tab'     => 'tabs_one',
				'default' => 'Default value Default value',
				'desc'    => esc_html__( 'Checking textarea field', 'tinyfield' ),
			),
			*/
		), // End fields.
	); // End tinyfield_page_header_footer.
	return $meta_boxes;
}
add_filter( 'tinyfield_meta_boxes', 'testing_metadata_', 99 );

```
