$(document).ready(function() {

  $("#consegna").click(function() {
      if(this.checked) {
          $('#myForm').collapse('hide');
          $("#nome").prop('required',false);
          $("#cognome").prop('required',false);
          $("#numero_carta").prop('required',false);
          $("#cvv").prop('required',false);
          $("#anno_scadenza").prop('required',false);
          $("#mese_scadenza").prop('required',false);
      }
  });

  $("#ora").click(function() {
      if(this.checked) {
          $('#myForm').collapse('show');
          $("#nome").prop('required',true);
          $("#cognome").prop('required',true);
          $("#numero_carta").prop('required',true);
          $("#cvv").prop('required',true);
          $("#anno_scadenza").prop('required',true);
          $("#mese_scadenza").prop('required',true);
      }
  });

  $(".scrolling").click(function(event){
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},
      Math.abs(window.scrollY - $(this.hash).offset().top) * 1);
  });

  $("input[type='number']").inputSpinner();

  $(window).resize(function(){
    alterImage();
  });

  alterImage();

});


function alterImage() {
  var ww = document.body.clientWidth;
  if(ww < 1000){
      $('.logo').removeClass('col-2').addClass('col-4');
  } else {
      $('.logo').removeClass('col-4').addClass('col-2');
  }
  if(document.body.scrollHeight > screen.height && ww < 750){
      $("#toShow").show();
  } else {
      $("#toShow").hide();
  }
}
