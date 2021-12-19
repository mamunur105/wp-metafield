require('./index.scss');
const { ConditionalFields } = require('./scripts/conditional-fields');
const { Tabs } = require('./scripts/tabs');


(function($) {
	'use strict';

	/**
	 * All of the code for your Dashboard-specific JavaScript source
	 * should reside in this file.
	 * ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * Or when the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 */
	var Tinyfield_Metaboxes = {};
	var $window = $(window),
		$document = $(document),
		$select2 = $('.selectbox-wraper select'),
		$image_upload = $('.fields-wrapper.image-upload'),
		$galleryimage = $('.image-gallery'),
		$colorpicker = $('.field-colorpicker'),
		$conditional = $('.conditional-field');
	// Check if element exists
	let psExists = (el) => el.length > 0;

	/************************************************************
        01 - colorpicker
    *************************************************************/
	Tinyfield_Metaboxes.wpColorPicker = () => {
		if (psExists($colorpicker)) {
			$colorpicker.wpColorPicker();
		}
	};
	/************************************************************
        02 - Select2 activation
    *************************************************************/
	Tinyfield_Metaboxes.select2 = () => {
		if (psExists($select2)) {
			$select2.each(function() {
				let parent = $(this).parent('.selectbox-wraper');
				let multiselect = parent.data('multiselect');
				let selectobj = {
					multiple: false
				};
				if (Boolean(multiselect)) {
					selectobj.multiple = true;
				}
				var selectEl = $(this).select2({ ...selectobj });
				if (Boolean(multiselect)) {
					selectEl.next().children().children().children().sortable({
						containment: 'parent',
						stop: (event, ui) => {
							ui.item.parent().children('[title]').each(function() {
								var title = $(this).attr('title');
								var original = $('option:contains(' + title + ')', selectEl).first();
								original.detach();
								selectEl.append(original);
							});
							selectEl.change();
						}
					});
				}
			});
		}
	};
	/************************************************************
        03 - imageUpload activation
    *************************************************************/
	Tinyfield_Metaboxes.imageUpload = () => {
		if (psExists($image_upload)) {
			// on upload button click
			$image_upload.on('click', '.upload-btn', (e) => {
				e.preventDefault();
				var button_parent = e.target.closest('.field-wrapper'),
					preview = button_parent.querySelector('.preview-image'),
					input_field = button_parent.querySelector('.image_input_field'),
					custom_uploader = wp.media({
						title: 'Insert image',
						library: {
							type: 'image'
						},
						button: {
							text: 'Use this image' // button label text
						},
						multiple: false
					});
				custom_uploader.on('open', function() {
					// var lib = custom_uploader.state().get('library');
					var ids_value = input_field.value.split(',');
					var selection = custom_uploader.state().get('selection');
					ids_value.forEach(function(id) {
						var attachment = wp.media.attachment(id);
						attachment.fetch();
						// lib.add( attachment ? [ attachment ] : [] );
						selection.add(attachment ? [ attachment ] : []);
					});
				});
				custom_uploader.on('select', function() {
					// it also has "open" and "close" events
					var attachment = custom_uploader.state().get('selection').first().toJSON();
					preview.style.backgroundImage = 'url(' + attachment.url + ')';
					input_field.value = attachment.id;
					button_parent.querySelector('.metabox-image-edit').href = admin_script.adminurl + '/post.php?post=' + attachment.id + '&action=edit';
					button_parent.querySelector('.preview-wrap').classList.remove('button-hide');
				});
				custom_uploader.open();
			});
			$image_upload.on('click', '.metabox-image-remove', (e) => {
				e.preventDefault();
				var button_parent = e.target.closest('.field-wrapper'),
					preview = button_parent.querySelector('.preview-image'),
					input_field = button_parent.querySelector('.image_input_field');
				input_field.value = '';
				preview.style.backgroundImage = 'url(https://via.placeholder.com/700x200)';
				button_parent.querySelector('.preview-wrap').classList.add('button-hide');
			});
		}
	};
	/************************************************************
        03 - imageUpload activation
    *************************************************************/
	Tinyfield_Metaboxes.galleryImage = () => {
		if (psExists($galleryimage)) {
			// on upload button click
			$galleryimage.on('click', '.upload-btn', (e) => {
				e.preventDefault();
				var button_parent = e.target.closest('.field-wrapper'),
					preview = button_parent.querySelector('.preview-list'),
					input_field = button_parent.querySelector('.image_input_field'),
					custom_uploader = wp.media({
						title: 'Insert image',
						library: {
							type: 'image'
						},
						button: {
							text: 'Use this image' // button label text
						},
						multiple: 'add'
					});
				custom_uploader.on('open', function() {
					// var lib = custom_uploader.state().get('library');
					var ids_value = input_field.value.split(',');
					var selection = custom_uploader.state().get('selection');
					ids_value.forEach(function(id) {
						var attachment = wp.media.attachment(id);
						attachment.fetch();
						// lib.add( attachment ? [ attachment ] : [] );
						selection.add(attachment ? [ attachment ] : []);
					});
				});
				custom_uploader.on('select', function() {
					// it also has "open" and "close" events
					var attachment = custom_uploader.state().get('selection').toJSON();
					var image = '';
					var ids = [];
					attachment.forEach((item) => {
						if (item.id) {
							image += '<li class="preview-wrap" data-id=' + item.id + '><div class="preview-image" style="background-image:url(' + item.url + ')"></div> <button class="metabox-image-remove"><span class="dashicons dashicons-no-alt"></span></button><a href="' + admin_script.adminurl + '/post.php?post=' + item.id + '&action=edit" class="metabox-image-edit" target="_blank"> <span class="dashicons dashicons-edit-large"></span> </a> </li>';
							ids.push(item.id);
						}
					});
					preview.innerHTML = image;
					var filtered = ids.filter(function(el) {
						return el != false;
					});
					input_field.value = filtered;
				});
				custom_uploader.open();
			});
			$galleryimage.on('click', '.metabox-image-remove', (e) => {
				e.preventDefault();
				var preview = e.target.closest('.preview-wrap'),
					input_field = e.target.closest('.field-wrapper').querySelector('.image_input_field'),
					preview_id = preview.getAttribute('data-id'),
					input_value = input_field.value.split(','),
					input_value = input_value.filter(function(item) {
						return item !== preview_id;
					});
				preview.remove();
				input_field.value = String(input_value);
			});

			$galleryimage.find('ul.preview-list').sortable({
				opacity: 0.8,
				stop: function(event) {
					// console.log( event.target.children );
					var input_field = event.target.closest('.field-wrapper').querySelector('.image_input_field'),
					ids = [];
					Array.from(event.target.children).forEach(function(item) {
						ids.push( item.getAttribute('data-id') );
					});
					var filtered = ids.filter(function(el) {
						return el != false;
					});
					console.log(filtered);
					input_field.value = String(filtered);
				}
			});
		}
	};
	/************************************************************
        04 - Checkbox
    *************************************************************/
	Tinyfield_Metaboxes.checkBox = () => {
		let selector = $('.fields-wrapper').find( "[type=checkbox]" );
		if (psExists(selector)) {
			selector.each(function(index, item){
				// console.log($(item).attr('name'));
				let curent_value =  $(item).val() ;
				$(item).on('change',function(){
					let curent_value =  $(selector).val() ;
					if( curent_value && 1 == curent_value  ){
						$(item).val(0);
					}else if( curent_value && 0 == curent_value ){
						$(item).val(1);
					}
				});
			});
		}
	}

	/************************************************************
        05 - colorpicker
    *************************************************************/
	Tinyfield_Metaboxes.Tabs = () => Tabs() ;
	Tinyfield_Metaboxes.Conditional = () => ConditionalFields('#post');
	// window.mfConditionalFields
	$document.on('ready', () => {
		Tinyfield_Metaboxes.wpColorPicker(),
		Tinyfield_Metaboxes.select2(),
		Tinyfield_Metaboxes.imageUpload(),
		Tinyfield_Metaboxes.galleryImage(),
		Tinyfield_Metaboxes.checkBox();
		Tinyfield_Metaboxes.Tabs();
		// window.mfConditionalFields('#post');
		Tinyfield_Metaboxes.Conditional();
		jQuery(function() {
			let rpobj = {
					wrapper: '.wrapper',
					container: '.container',
					row: '.row.repeater-inner',
					add: '.add',
					remove: '.remove',
					move: '.move',
					move_up: '.move-up',
					move_down: '.move-down',
					move_steps: '.move-steps',
					template: '.template',
					is_sortable: true,
					before_add: null,
					after_add: self.after_add,
					before_remove: null,
					after_remove: null,
					sortable_options: null,
					row_count_placeholder: '{{row-count-placeholder}}',
			}
			jQuery('.repeater').each(function() {
				jQuery(this).repeatable_fields( rpobj );
			});
		});

	});
})(jQuery);
