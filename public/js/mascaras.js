$(document).ready(function () {
    $('.valor_mascara').mask('000.000.000.000.000,00', {reverse: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
        translation: {
        'r': {
            pattern: /[\/]/,
            fallback: '/'
        },
        placeholder: "__/__/____"
        }
    });


 $('.telefone_mascara').mask('(00)0000-00000');
 $('.dinheiro_mascara').mask('000.000.000.000.000,00', {reverse: true});


});