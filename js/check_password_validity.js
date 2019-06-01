/*

  MODULO JAVASCRIPT UTILIZZATO IN:
  ModificaProfiloFornitore.php
  ProfiloCliente.php

  GLI ID USATI SONO:
  passwordNewConfirm per il field di Conferma
  passwordNew per il field della nuova password
  valid per la label di check
  submitForm per il bottone di submit

*/
$(document).ready(function(){

  $('#passwordNewConfirm').prop("disabled", true);

  $("#passwordNewConfirm").keyup(function(){
    var passwordValue = $('#passwordNew').val();
    var actualConfirm = $(this).val();
    var result = passwordValue.startsWith(actualConfirm);

    if(result == false) {
      $('#valid').html("Password incorretta");
      $('#valid').css("color", "red");
    } else {
      $('#valid').html("Password parzialmemte corretta");
      $('#valid').css("color", "green");
    }

    if(actualConfirm.length == 0) {
      $('#valid').html("");
    }

    if(actualConfirm.length != passwordValue.length) {
      $('#sumbitForm').prop("disabled", true);
    }

    if(actualConfirm.length == passwordValue.length && result == true) {
      $('#sumbitForm').prop("disabled", false);
      $('#valid').html("Password corretta");
    }
  });

  $('#passwordNew').keyup(function() {
    var value = $(this).val();
    if(value == '') {
      $('#sumbitForm').prop("disabled", false);
      $('#passwordNewConfirm').prop("disabled", true);
      $('#passwordNewConfirm').val('');
      $('#valid').html("");
    } else {
      $('#sumbitForm').prop("disabled", true);
      $('#passwordNewConfirm').prop("disabled", false);
    }
  })
});
