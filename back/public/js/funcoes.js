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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/funcoes.js":
/*!****************************************!*\
  !*** ./resources/assets/js/funcoes.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#imprimir').click(function () {
    window.print();
  });
  /*Tela cheia do contas a pagar*/

  $('#full-screen').click(function () {
    $('.parte-cima').css("display", "none");
    $('#menu-topo').css("display", "none");
    $('#menu-lateral').css("display", "none");
    $('#conteudo').removeClass('col-md-10');
    $('#conteudo').removeClass('col-md-offset-2');
    $('#conteudo').removeClass('col-xs-8');
    $('#conteudo').removeClass('col-xs-offset-4');
    $('#conteudo').addClass('col-md-12');
    $('#conteudo').css("margin-top", "1px");
    $('#full-screen').css("display", "none");
    $('div#mini-screen').css("display", "block");
  });
  $('#mini-screen').click(function () {
    $('.parte-cima').css("display", "block");
    $('#menu-topo').css("display", "block");
    $('#menu-lateral').css("display", "block");
    $('#conteudo').addClass('col-md-10');
    $('#conteudo').addClass('col-md-offset-2');
    $('#conteudo').addClass('col-xs-8');
    $('#conteudo').addClass('col-xs-offset-4');
    $('#conteudo').css("margin-top", "40px");
    $('#conteudo').removeClass('col-md-12');
    $('#mini-screen').css("display", "none");
    $('div#full-screen').css("display", "block");
  });
  /*BOTAO DE EXCLUIR DO CONTAS A PAGAR*/

  $('#removect').click(function () {
    $(".excluirct").toggleClass("ocultar");
  });
  /* OCULTAR E MOSTRAR O MENU */

  $('#ocultar').on('click', function () {
    $('#menu-lateral').fadeOut('fast');
    $('#conteudo').removeClass('col-xs-offset-4');
    $('#conteudo').removeClass('col-xs-8');
    $('#conteudo').removeClass('col-md-offset-2');
    $('#conteudo').removeClass('col-md-10');
    $('#conteudo').addClass('col-md-12');
    $('#ocultar').css("display", "none");
    $('#mostrar').css("display", "block");
  });
  $('#mostrar').click(function () {
    $('#menu-lateral').fadeIn('slow');
    $('#conteudo').removeClass('col-md-12');
    $('#conteudo').addClass('col-md-10');
    $('#conteudo').addClass('col-md-offset-2');
    $('#conteudo').addClass('col-xs-8');
    $('#conteudo').addClass('col-xs-4');
    $('#ocultar').css("display", "block");
    $('#mostrar').css("display", "none");
  });
  /* GERADOR DE EXCEL DO FINANCEIRO */

  function tableToExcel() {
    var tableToExcel = function () {
      var uri = 'data:application/vnd.ms-excel;base64,',
          template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]-->   <meta charset="utf-8"></head><body><table>{table}</table></body></html>',
          base64 = function base64(s) {
        return window.btoa(unescape(encodeURIComponent(s)));
      },
          format = function format(s, c) {
        return s.replace(/{(\w+)}/g, function (m, p) {
          return c[p];
        });
      };

      return function (table, name) {
        if (!table.nodeType) table = document.getElementById(table);
        var ctx = {
          worksheet: name || 'Worksheet',
          table: table.innerHTML
        };
        window.l;
        ocation.href = uri + base64(format(template, ctx));
      };
    }();
  }
  /*SUBMIT DO EMITIR PAGAMENTO*/


  $('#form-emitir').submit(function () {
    window.open('/financeiro/emitirpagamento', 'formpopup', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=650, height=480, left=400, top=100');
    this.target = 'formpopup';
  });
  $('#editar_valor').click(function () {
    window.open('/vdlap/financeiro/editar/editar.php', 'pagemitir', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=650, height=380');
    this.target = 'janelaedicao';
    $("#fazeredicao").submit();
  });
  $('#ver_cheque').click(function () {
    window.open('/vdlap/financeiro/exibircheque/exibircheque.php', 'pagemitir', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=650, height=380');
    this.target = 'janelaedicao';
    $("#ver_cheque").submit();
  });
  $('#descerpagina').click(function () {
    var target_offset = $("#rodape").offset();
    var target_top = target_offset.top;
    $('html, body').animate({
      scrollTop: target_top
    }, 0);
  });
  /* FIM DO EMITIR PAGAMENTO*/

  /* MASCARA DE DINHEIRO */

  /* FIM MASCARA DE DINHREIRO */

  if (typeof jQuery === "undefined") {
    throw new Error("AdminLTE requires jQuery");
  }

  var AdminLTEOptions;

  (function ($, jQuery, AdminLTEOptions) {//// original code goes here
  })(jQuery, jQuery, AdminLTEOptions);
});
/* OCULTAR E MOSTRAR PARCELA */

$(document).ready(function () {
  var $tipo = $('#tipo').val();

  if ($tipo == "Parcelado") {
    $('#group-parcelas').addClass("mostrar");
    $('#group-parcelas').removeClass("ocultar");
  } else {
    $('#group-parcelas').removeClass("mostrar");
    $('#group-parcelas').addClass("ocultar");
  }

  $("#tipo").change(function () {
    var $tipo = $('#tipo').val();

    if ($tipo == "Parcelado") {
      $('#group-parcelas').addClass("mostrar");
      $('#group-parcelas').removeClass("ocultar");
      $('#valor-parcela').removeClass("ocultar");
      $('#valor-parcela').addClass("mostrar");
      $('#valor-vista').addClass("ocultar");
      $('#valor-vista').removeClass("mostrar");
    } else {
      $('#group-parcelas').removeClass("mostrar");
      $('#group-parcelas').addClass("ocultar");
      $('#valor-parcela').addClass("ocultar");
      $('#valor-parcela').removeClass("mostrar");
      $('#valor-vista').removeClass("ocultar");
      $('#valor-vista').addClass("mostrar");
    }
  });
});
$(document).ready(function () {
  $('#excluir').click(function () {
    alert("Deseja Realmente Excluir");
  });
});
$(document).ready(function () {
  var emailLogin;
  var $url;
  var asset;
  $asset = $('#asset').val();
  $('#email-login').change(function () {
    $emailLogin = $('#email-login').val();
    $url = 'login/imagem/' + $emailLogin;
    $.ajax({
      method: 'get',
      url: $url,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }).done(function (msg) {
      $link = $asset + msg;
      $("#imagem-perfil").attr("src", $link);
    });
  });
  $("#possui-empreendimento").change(function () {
    var $tipo = $('#possui-empreendimento').val();

    if ($tipo == "Sim") {
      $('.empreendimento-ocultar').addClass("mostrar");
      $('.empreendimento-ocultar').removeClass("ocultar");
    }
  });
});
/*FIM DO DOCUMENTO READY */
//excel

var tableToExcel = function () {
  var uri = 'data:application/vnd.ms-excel;base64,',
      template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]-->   <meta charset="utf-8"></head><body><table>{table}</table></body></html>',
      base64 = function base64(s) {
    return window.btoa(unescape(encodeURIComponent(s)));
  },
      format = function format(s, c) {
    return s.replace(/{(\w+)}/g, function (m, p) {
      return c[p];
    });
  };

  return function (table, name) {
    if (!table.nodeType) table = document.getElementById(table);
    var ctx = {
      worksheet: name || 'Worksheet',
      table: table.innerHTML // window.location.href = uri + base64(format(template, ctx))

    };
    var link = document.createElement("a");
    link.download = "exportado.xls";
    link.href = uri + base64(format(template, ctx));
    link.click();
  };
}();

$(document).ready(function () {
  $('.btn-menu-toogle').click(function () {
    $(".menu-ocultar").toggle();
  });
});
$(document).ready(function () {
  $('#example').dataTable({
    "language": {
      "url": "dataTables.german.lang"
    }
  });
}); // OCULTAR SEGUNDO E TERCEIRO NOME DO CLIENTE

$(document).ready(function () {
  $(".linha-ocultar").hide();
  $("#btn-add-contato").click(function () {
    $(".linha-ocultar").toggle('slow');
  });
});
$(document).ready(function () {
  $('#tabelaclientes').DataTable({
    "iDisplayLength": 100
  });
}); // RELATORIO ANUAL

$(document).ready(function () {
  $('#ano').on('change', function () {
    $('#formularioano').submit();
  });
}); // CONTAS A PAGAR

/***/ }),

/***/ 1:
/*!**********************************************!*\
  !*** multi ./resources/assets/js/funcoes.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /opt/lampp/htdocs/sistema/resources/assets/js/funcoes.js */"./resources/assets/js/funcoes.js");


/***/ })

/******/ });