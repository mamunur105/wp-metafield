/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

eval("function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }\n\nfunction _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }\n\nfunction _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }\n\n__webpack_require__(/*! ./index.scss */ \"./src/index.scss\");\n\nvar _require = __webpack_require__(/*! ./scripts/tabs */ \"./src/scripts/tabs.js\"),\n    Tabs = _require.Tabs;\n\n(function ($) {\n  'use strict';\n  /**\r\n   * All of the code for your Dashboard-specific JavaScript source\r\n   * should reside in this file.\r\n   * ready:\r\n   *\r\n   * $(function() {\r\n   *\r\n   * });\r\n   *\r\n   * Or when the window is loaded:\r\n   *\r\n   * $( window ).load(function() {\r\n   *\r\n   * });\r\n   */\n\n  var PS_Metaboxes = {};\n  var $window = $(window),\n      $document = $(document),\n      $select2 = $('.selectbox-wraper select'),\n      $image_upload = $('.fields-wrapper.image-upload'),\n      $galleryimage = $('.image-gallery'),\n      $colorpicker = $('.field-colorpicker'),\n      $conditional = $('.conditional-field'); // Check if element exists\n\n  var psExists = function psExists(el) {\n    return el.length > 0;\n  };\n  /************************************************************\r\n         01 - colorpicker\r\n     *************************************************************/\n\n\n  PS_Metaboxes.wpColorPicker = function () {\n    if (psExists($colorpicker)) {\n      $colorpicker.wpColorPicker();\n    }\n  };\n  /************************************************************\r\n         02 - Select2 activation\r\n     *************************************************************/\n\n\n  PS_Metaboxes.select2 = function () {\n    if (psExists($select2)) {\n      $select2.each(function () {\n        var parent = $(this).parent('.selectbox-wraper');\n        var multiselect = parent.data('multiselect');\n        var selectobj = {\n          multiple: false\n        };\n\n        if (Boolean(multiselect)) {\n          selectobj.multiple = true;\n        }\n\n        var selectEl = $(this).select2(_objectSpread({}, selectobj));\n\n        if (Boolean(multiselect)) {\n          selectEl.next().children().children().children().sortable({\n            containment: 'parent',\n            stop: function stop(event, ui) {\n              ui.item.parent().children('[title]').each(function () {\n                var title = $(this).attr('title');\n                var original = $('option:contains(' + title + ')', selectEl).first();\n                original.detach();\n                selectEl.append(original);\n              });\n              selectEl.change();\n            }\n          });\n        }\n      });\n    }\n  };\n  /************************************************************\r\n         03 - imageUpload activation\r\n     *************************************************************/\n\n\n  PS_Metaboxes.imageUpload = function () {\n    if (psExists($image_upload)) {\n      // on upload button click\n      $image_upload.on('click', '.upload-btn', function (e) {\n        e.preventDefault();\n        var button_parent = e.target.closest('.field-wrapper'),\n            preview = button_parent.querySelector('.preview-image'),\n            input_field = button_parent.querySelector('.image_input_field'),\n            custom_uploader = wp.media({\n          title: 'Insert image',\n          library: {\n            type: 'image'\n          },\n          button: {\n            text: 'Use this image' // button label text\n\n          },\n          multiple: false\n        });\n        custom_uploader.on('open', function () {\n          // var lib = custom_uploader.state().get('library');\n          var ids_value = input_field.value.split(',');\n          var selection = custom_uploader.state().get('selection'); // lib.comparator = function( a, b ) {\n          // \tvar aInQuery = !! this.mirroring.get( a.cid ),\n          // \t\tbInQuery = !! this.mirroring.get( b.cid );\n          // \tif ( ! aInQuery && bInQuery ) {\n          // \t\treturn -1;\n          // \t} else if ( aInQuery && ! bInQuery ) {\n          // \t\treturn 1;\n          // \t} else {\n          // \t\treturn 0;\n          // \t}\n          // };\n\n          ids_value.forEach(function (id) {\n            var attachment = wp.media.attachment(id);\n            attachment.fetch(); // lib.add( attachment ? [ attachment ] : [] );\n\n            selection.add(attachment ? [attachment] : []);\n          });\n        });\n        custom_uploader.on('select', function () {\n          // it also has \"open\" and \"close\" events\n          var attachment = custom_uploader.state().get('selection').first().toJSON();\n          preview.style.backgroundImage = 'url(' + attachment.url + ')';\n          input_field.value = attachment.id;\n          button_parent.querySelector('.preview-wrap').classList.remove('button-hide');\n        });\n        custom_uploader.open();\n      });\n      $image_upload.on('click', '.metabox-image-remove', function (e) {\n        e.preventDefault();\n        var button_parent = e.target.closest('.field-wrapper'),\n            preview = button_parent.querySelector('.preview-image'),\n            input_field = button_parent.querySelector('.image_input_field');\n        input_field.value = '';\n        preview.style.backgroundImage = 'url(https://via.placeholder.com/700x200)';\n        button_parent.querySelector('.preview-wrap').classList.add('button-hide');\n      });\n    }\n  };\n  /************************************************************\r\n         03 - imageUpload activation\r\n     *************************************************************/\n\n\n  PS_Metaboxes.galleryImage = function () {\n    if (psExists($galleryimage)) {\n      // on upload button click\n      $galleryimage.on('click', '.upload-btn', function (e) {\n        e.preventDefault();\n        var button_parent = e.target.closest('.field-wrapper'),\n            preview = button_parent.querySelector('.preview-list'),\n            input_field = button_parent.querySelector('.image_input_field'),\n            custom_uploader = wp.media({\n          title: 'Insert image',\n          library: {\n            type: 'image'\n          },\n          button: {\n            text: 'Use this image' // button label text\n\n          },\n          multiple: 'add'\n        });\n        custom_uploader.on('open', function () {\n          // var lib = custom_uploader.state().get('library');\n          var ids_value = input_field.value.split(',');\n          var selection = custom_uploader.state().get('selection');\n          ids_value.forEach(function (id) {\n            var attachment = wp.media.attachment(id);\n            attachment.fetch(); // lib.add( attachment ? [ attachment ] : [] );\n\n            selection.add(attachment ? [attachment] : []);\n          });\n        });\n        custom_uploader.on('select', function () {\n          // it also has \"open\" and \"close\" events\n          var attachment = custom_uploader.state().get('selection').toJSON();\n          var image = '';\n          var ids = [];\n          attachment.forEach(function (item) {\n            if (item.id) {\n              image += '<li class=\"preview-wrap\" data-id=' + item.id + '><div class=\"preview-image\" style=\"background-image:url(' + item.url + ')\"></div> <button class=\"metabox-image-remove\"><span class=\"dashicons dashicons-no-alt\"></span></button><a href=\"#\" class=\"metabox-image-edit\" target=\"_blank\"> <span class=\"dashicons dashicons-edit-large\"></span> </a> </li>';\n              ids.push(item.id);\n            }\n          });\n          preview.innerHTML = image;\n          var filtered = ids.filter(function (el) {\n            return el != false;\n          });\n          input_field.value = filtered;\n        });\n        custom_uploader.open();\n      });\n      $galleryimage.on('click', '.metabox-image-remove', function (e) {\n        e.preventDefault();\n        var preview = e.target.closest('.preview-wrap'),\n            input_field = e.target.closest('.field-wrapper').querySelector('.image_input_field'),\n            preview_id = preview.getAttribute('data-id'),\n            input_value = input_field.value.split(','),\n            input_value = input_value.filter(function (item) {\n          return item !== preview_id;\n        });\n        preview.remove();\n        input_field.value = String(input_value);\n      });\n      $galleryimage.find('ul.preview-list').sortable({\n        opacity: 0.8,\n        stop: function stop(event) {\n          // console.log( event.target.children );\n          var input_field = event.target.closest('.field-wrapper').querySelector('.image_input_field'),\n              ids = [];\n          Array.from(event.target.children).forEach(function (item) {\n            ids.push(item.getAttribute('data-id'));\n          });\n          var filtered = ids.filter(function (el) {\n            return el != false;\n          });\n          console.log(filtered);\n          input_field.value = String(filtered);\n        }\n      });\n    }\n  };\n  /************************************************************\r\n         04 - Checkbox\r\n     *************************************************************/\n\n\n  PS_Metaboxes.checkBox = function () {\n    var selector = $('.fields-wrapper').find(\"[type=checkbox]\");\n\n    if (psExists(selector)) {\n      selector.each(function (index, item) {\n        // console.log($(item).attr('name'));\n        var curent_value = $(item).val();\n        $(item).on('change', function () {\n          var curent_value = $(selector).val();\n\n          if (curent_value && 1 == curent_value) {\n            $(item).val(0);\n          } else if (curent_value && 0 == curent_value) {\n            $(item).val(1);\n          }\n        });\n      });\n    }\n  };\n  /************************************************************\r\n         05 - colorpicker\r\n     *************************************************************/\n\n\n  PS_Metaboxes.Tabs = function () {\n    return Tabs();\n  };\n\n  $document.on('ready', function () {\n    PS_Metaboxes.wpColorPicker(), PS_Metaboxes.select2(), PS_Metaboxes.imageUpload(), PS_Metaboxes.galleryImage(), PS_Metaboxes.checkBox();\n    PS_Metaboxes.Tabs();\n  });\n})(jQuery);\n\n//# sourceURL=webpack://starter-block/./src/index.js?");

/***/ }),

/***/ "./src/scripts/tabs.js":
/*!*****************************!*\
  !*** ./src/scripts/tabs.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
eval("\n\nexports.Tabs = function () {\n  var picotab = document.querySelector('.picotab');\n\n  var tab = function tab() {\n    var active = picotab.querySelector('.active');\n    var active_class = active.getAttribute('data-tab'); // Get all elements with class=\"tabcontent\" and hide them\n\n    var tabcontent = document.getElementsByClassName('fields-wrapper');\n\n    for (var i = 0; i < tabcontent.length; i++) {\n      tabcontent[i].style.display = 'none';\n    }\n\n    var tablinks = document.getElementsByClassName(active_class);\n\n    for (var _i = 0; _i < tablinks.length; _i++) {\n      tablinks[_i].style.display = '';\n    }\n  }; // Add event listener to table\n\n\n  var el = picotab.querySelectorAll(\".tablinks\");\n\n  for (var i = 0; i < el.length; i++) {\n    el[i].addEventListener(\"click\", function (event) {\n      event.preventDefault();\n      var active = picotab.querySelectorAll('.active');\n\n      for (var j = 0; j < active.length; j++) {\n        active[j].classList.remove(\"active\");\n      }\n\n      event.target.classList.add(\"active\");\n      tab();\n    });\n  }\n\n  tab();\n};\n\n//# sourceURL=webpack://starter-block/./src/scripts/tabs.js?");

/***/ }),

/***/ "./src/index.scss":
/*!************************!*\
  !*** ./src/index.scss ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://starter-block/./src/index.scss?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/index.js");
/******/ 	
/******/ })()
;