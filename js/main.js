
(function ($) {
    "use strict";

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function () {

        var bandera = 0;
        console.log(input);
        for (var i = 0; i < input.length; i++) {
			console.log(i);
            switch (i) {
            case 0:
                if (validateLet(input[i]) == false) {
                    showValidate(input[i]);
                    console.log("Validación de nombre");
                    bandera++;
                }
                break;

            case 1:
                if (validateLetAp(input[i]) == false) {
                    showValidate(input[i]);
                    console.log("Validación de apellido");
                    bandera++;
                }
                break;

            case 2:
                if (validateCel(input[i]) == false) {
                    showValidate(input[i]);
                    console.log("Validación de celuluar");
                    bandera++;
                }
                break;

            case 3:
                if (validateCI(input[i]) == false) {
                    showValidate(input[i]);
                    console.log("Validación de carne");
                    bandera++;
                }
                break;

            default:
                if (validate(input[i]) == false) {
                    console.log("Validación de mail y campos vaios");
                    showValidate(input[i]);
                    bandera++;
                }

            }
            
        }

        console.log(bandera)

        if (bandera != 0) {
            return false;
        }

    });

    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validateLet(input) {
        var letters = /^[A-Za-z]+$/;
        if ($(input).attr('name') == 'nombre') {
            if ($(input).val().trim() == '') {
                return false;
            } else if ($(input).val().trim().match(letters) == null) {
                return false;
            }
        }
    }

    function validateLetAp(input) {
        var letters = /^[A-Za-z]+$/;
        if ($(input).attr('name') == 'apellido') {
            if ($(input).val().trim() == '') {
                return false;
            } else if ($(input).val().trim().match(letters) == null) {
                return false;
            }
        }
    }

    //funcion de verificación de solo numeros en campos CI
    function validateCI(input) {
        if ($(input).attr('name') == 'ci') {
            var tam = $('#ci').val();
            if (tam.length == 7) {
                if (tam.match(/^([0-9]$)/) != null) {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    //funcion de verificación de solo numeros en campos CEL
    function validateCel(input) {
        if ($(input).attr('name') == 'celular') {
            var tam = $('#celular').val();
            if (tam.length == 8) {
                if (tam.match(/^([0-9]$)/) != null) {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    //funcion de verificacion de email y campos que no vayan vacíos
    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate');
    }

})(jQuery);
