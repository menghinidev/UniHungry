$(document).ready(function() {

    if($("#fornitoreCheck").prop("checked")) {
        $('#fornitoreInput').collapse('show');
        $("#nome_fornitore").prop('required',true);
        $("#indirizzo").prop('required',true);
        $("#descrizione_breve").prop('required',true);
        $('#registrati').text("Invia richiesta");
        $('#registrati').removeClass('green').addClass('orange');
    }

    $("#fornitoreCheck").change(function() {
        if(this.checked) {
            $('#fornitoreInput').collapse('show');
            $("#nome_fornitore").prop('required',true);
            $("#indirizzo").prop('required',true);
            $("#descrizione_breve").prop('required',true);
            $('#registrati').text("Invia richiesta");
            $('#registrati').removeClass('green').addClass('orange');
        } else {
            $('#fornitoreInput').collapse('hide');
            $("#nome_fornitore").prop('required',false);
            $("#indirizzo").prop('required',false);
            $("#descrizione_breve").prop('required',false);
            $('#registrati').text("Registrati");
            $('#registrati').removeClass('orange').addClass('green');

        }
    });

});
