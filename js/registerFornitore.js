$(document).ready(function() {

    if($("#fornitoreCheck").prop("checked")) {
        $('#fornitoreInput').collapse('show');
        $('#registrati').text("Invia richiesta");
        $('#registrati').removeClass('green').addClass('orange');
    }

    $("#fornitoreCheck").change(function() {
        if(this.checked) {
            $('#fornitoreInput').collapse('show');
            $('#registrati').text("Invia richiesta");
            $('#registrati').removeClass('green').addClass('orange');
        } else {
            $('#fornitoreInput').collapse('hide');
            $('#registrati').text("Registrati");
            $('#registrati').removeClass('orange').addClass('green');

        }
    });

});
