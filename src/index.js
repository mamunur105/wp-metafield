require('./index.scss');
const { ConditionalFields } = require('./scripts/conditional-fields');
const { Tabs } = require('./scripts/tabs');


(function($, window) {
	'use strict';

	var $body = $('body');
	// Check if element exists
	let psExists = (el) => el.length > 0;

	/************************************************************
        01 - colorpicker
    *************************************************************/
	function TinywpColorPicker() {
		let $colorpicker = $body.find('.field-colorpicker');
		if (psExists($colorpicker)) {
			$colorpicker.each( function(){
				$( this ).wpColorPicker();
			});
		}
	};

	/************************************************************
        03 - imageUpload activation
    *************************************************************/
	function TinyimageUpload() {
		let $image_upload = $body.find('.fields-wrapper.image-upload');
		if ( psExists( $image_upload ) ) {
			$image_upload.each( function(){
				// on upload button click
				$( this ).on('click', '.upload-btn', (e) => {
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
				$( this ).on('click', '.metabox-image-remove', (e) => {
					e.preventDefault();
					var button_parent = e.target.closest('.field-wrapper'),
						preview = button_parent.querySelector('.preview-image'),
						input_field = button_parent.querySelector('.image_input_field');
					input_field.value = '';
					preview.style.backgroundImage = 'url(https://via.placeholder.com/700x200)';
					button_parent.querySelector('.preview-wrap').classList.add('button-hide');
				});
			});
		}
	};
	/************************************************************
        03 - imageUpload activation
    *************************************************************/
	function TinygalleryImage() {
		let $galleryimage = $body.find('.image-gallery');
		if (psExists($galleryimage)) {
			$galleryimage.each( function(){
				// on upload button click
				$( this ).on('click', '.upload-btn', (e) => {
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
				$( this ).on('click', '.metabox-image-remove', (e) => {
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

				$( this ).find('ul.preview-list').sortable({
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
			});

		}
	};
	/************************************************************
        04 - Checkbox
    *************************************************************/
	function TinycheckBox() {
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
    05 - Range Slider
    *************************************************************/

	function TinyRangeSlider(){
		if( document.querySelectorAll('.range-slider').length ){
			let $rangeslider = document.querySelectorAll('.range-slider');
			range_slider( $rangeslider );
		}
	};

	/************************************************************
        05 - colorpicker
    *************************************************************/
	function TinyTabs(){ Tabs() };
	// window.mfConditionalFields
	function TinyConditional(){ ConditionalFields('#post') };
	/************************************************************
        02 - Select2 activation
    *************************************************************/
	function Tinyselect2( $select2 ){
		if (psExists($select2)) {
			// destroy each select2
			$select2.each(function(){
				console.log( this );
				let parent = $( this ).parent('.selectbox-wraper');
				let multiselect = parent.attr('data-multiselect');
				let selectobj = {
					multiple: false
				};
				if (Boolean(multiselect)) {
					selectobj.multiple = true;
				}
				var selectEl = $( this ).select2( selectobj );
				if (Boolean(multiselect)) {
					selectEl.next().children().children().children().sortable({
						containment: 'parent',
						stop: (event, ui) => {
							ui.item.parent().children('[title]').each(function() {
								let title = $(this).attr('title');
								let original = $('option:contains(' + title + ')', selectEl).first();
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
	function Tinyreinitialize(){
		let $select2 = $body.find('.selectbox-wraper select');
		TinywpColorPicker(),
		TinyimageUpload(),
		TinygalleryImage(),
		TinycheckBox();
		TinyTabs();
		TinyConditional();
		TinyRangeSlider();
		Tinyselect2( $select2 );
	}

	function Tinyclone( $this ){
		let parent_class = $( $this ).parents('.fields-wrapper');
		let parent_id = parent_class.attr('data-fields-id');
		let rpc  = parent_class.find('.repater-container');
		let number = $( $this ).attr('data-count');
		let nextCount = parseInt( number ) + 1 ;
		let parent_string = eval( parent_id ) ;
		parent_string = parent_string.replaceAll( '{count}', nextCount );
		let CloneHtml = $.parseHTML( parent_string );
		rpc.append( CloneHtml );
		$( $this ).attr('data-count', nextCount );
		Tinyreinitialize();
		TinyConditional();
	}

	$(document).on('ready', function() {
		Tinyreinitialize();
	});
	$('.tiny-button').on('click', function(){
		Tinyclone( this );
	});

})(jQuery, window);
