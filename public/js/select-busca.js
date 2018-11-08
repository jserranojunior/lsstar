/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 86);
/******/ })
/************************************************************************/
/******/ ({

/***/ 86:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(87);


/***/ }),

/***/ 87:
/***/ (function(module, exports) {

/*
####################

SEMPRE ADICIONAR EM .addClass( "form-control ...
o nome da classe



######################
*/

/* BUSCA DINAMICA EM INPUT DO TIPO SELECT */

/* ##############  SELECIONAR FORNECEDOR ################# */

$(function () {
  $.widget("custom.combobox", {
    _create: function _create() {
      this.wrapper = $("<span>").addClass("custom-combobox").insertAfter(this.element);

      this.element.hide();
      this._createAutocomplete();
      this._createShowAllButton();
    },

    _createAutocomplete: function _createAutocomplete() {
      var selected = this.element.children(":selected"),
          value = selected.val() ? selected.text() : "";

      this.input = $("<input>").appendTo(this.wrapper).val(value).attr("title", "").addClass("form-control form-fornecedor custom-combobox-input   ui-corner-left").autocomplete({
        delay: 0,
        minLength: 0,
        source: $.proxy(this, "_source")
      }).tooltip({
        classes: {
          "ui-tooltip": "ui-state-highlight"
        }
      });

      this._on(this.input, {
        autocompleteselect: function autocompleteselect(event, ui) {
          ui.item.option.selected = true;
          this._trigger("select", event, {
            item: ui.item.option
          });
        },

        autocompletechange: "_removeIfInvalid"
      });
    },

    _createShowAllButton: function _createShowAllButton() {
      var input = this.input,
          wasOpen = false;

      $("<a>").attr("tabIndex", -1).attr("title", "Mostrar Todos").tooltip().appendTo(this.wrapper).button({
        icons: {
          primary: "ui-icon-triangle-1-s"
        },
        text: false
      }).removeClass("ui-corner-all").addClass("custom-combobox-toggle ui-corner-right").on("mousedown", function () {
        wasOpen = input.autocomplete("widget").is(":visible");
      }).on("click", function () {
        input.trigger("focus");

        // Close if already visible
        if (wasOpen) {
          return;
        }

        // Pass empty string as value to search for, displaying all results
        input.autocomplete("search", "");
      });
    },

    _source: function _source(request, response) {
      var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
      response(this.element.children("option").map(function () {
        var text = $(this).text();
        if (this.value && (!request.term || matcher.test(text))) return {
          label: text,
          value: text,
          option: this
        };
      }));
    },

    _removeIfInvalid: function _removeIfInvalid(event, ui) {

      // Selected an item, nothing to do
      if (ui.item) {
        return;
      }

      // Search for a match (case-insensitive)
      var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
      this.element.children("option").each(function () {
        if ($(this).text().toLowerCase() === valueLowerCase) {
          this.selected = valid = true;
          return false;
        }
      });

      // Found a match, nothing to do
      if (valid) {
        return;
      }

      // COLOCAR O VALOR NO INPUT
      // this.input.val(value);


      this.element.val("value");
      this._delay(function () {
        this.input.tooltip("close").attr("title", "");
      }, 2500);
      this.input.autocomplete("instance").term = "";
    },

    _destroy: function _destroy() {
      this.wrapper.remove();
      this.element.show();
    }

  });

  $("#favorecido").combobox();
  $("#toggle").on("click", function () {
    $("#favorecido").toggle();
  });

  /*FIM BUSCA INPUT */

  $('.form-fornecedor').change(function () {
    var value = $('.ui-autocomplete-input').val();
    $('#favorecido').append($('<option>', {
      value: value,
      text: value,
      selected: 'selected'
    }));
    $('.id_100 option[value=value]').attr('selected', 'selected');
  });
});

/* ##############  SELECIONAR CLIENTE ################# */

/* BUSCA DINAMICA EM INPUT DO TIPO SELECT */

$(function () {
  $.widget("custom.combobox", {
    _create: function _create() {
      this.wrapper = $("<span>").addClass("custom-combobox").insertAfter(this.element);

      this.element.hide();
      this._createAutocomplete();
      this._createShowAllButton();
    },

    _createAutocomplete: function _createAutocomplete() {
      var selected = this.element.children(":selected"),
          value = selected.val() ? selected.text() : "";

      this.input = $("<input>").appendTo(this.wrapper).val(value).attr("title", "").addClass("form-control form-nome custom-combobox-input   ui-corner-left").autocomplete({
        delay: 0,
        minLength: 0,
        source: $.proxy(this, "_source")
      }).tooltip({
        classes: {
          "ui-tooltip": "ui-state-highlight"
        }
      });

      this._on(this.input, {
        autocompleteselect: function autocompleteselect(event, ui) {
          ui.item.option.selected = true;
          this._trigger("select", event, {
            item: ui.item.option
          });
        },

        autocompletechange: "_removeIfInvalid"
      });
    },

    _createShowAllButton: function _createShowAllButton() {
      var input = this.input,
          wasOpen = false;

      $("<a>").attr("tabIndex", -1).attr("title", "Mostrar Todos").tooltip().appendTo(this.wrapper).button({
        icons: {
          primary: "ui-icon-triangle-1-s"
        },
        text: false
      }).removeClass("ui-corner-all").addClass("custom-combobox-toggle ui-corner-right").on("mousedown", function () {
        wasOpen = input.autocomplete("widget").is(":visible");
      }).on("click", function () {
        input.trigger("focus");

        // Close if already visible
        if (wasOpen) {
          return;
        }

        // Pass empty string as value to search for, displaying all results
        input.autocomplete("search", "");
      });
    },

    _source: function _source(request, response) {
      var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
      response(this.element.children("option").map(function () {
        var text = $(this).text();
        if (this.value && (!request.term || matcher.test(text))) return {
          label: text,
          value: text,
          option: this
        };
      }));
    },

    _removeIfInvalid: function _removeIfInvalid(event, ui) {

      // Selected an item, nothing to do
      if (ui.item) {
        return;
      }

      // Search for a match (case-insensitive)
      var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
      this.element.children("option").each(function () {
        if ($(this).text().toLowerCase() === valueLowerCase) {
          this.selected = valid = true;
          return false;
        }
      });

      // Found a match, nothing to do
      if (valid) {
        return;
      }

      // COLOCAR O VALOR NO INPUT
      // this.input.val(value);


      this.element.val("value");
      this._delay(function () {
        this.input.tooltip("close").attr("title", "");
      }, 2500);
      this.input.autocomplete("instance").term = "";
    },

    _destroy: function _destroy() {
      this.wrapper.remove();
      this.element.show();
    }

  });

  $("#nome").combobox();
  $("#toggle").on("click", function () {
    $("#nome").toggle();
  });

  $('.form-nome').change(function () {
    var value = $('.form-nome').val();
    $('#nome').append($('<option>', {
      value: value,
      text: value,
      selected: 'selected'
    }));
    $('.id_100 option[value=value]').attr('selected', 'selected');
  });
});

/***/ })

/******/ });