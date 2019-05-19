$(document).ready(function() {

  $("#consegna").click(function() {
      if(this.checked) {
          $('#myForm').collapse('hide');
      } else {
          $('#myForm').collapse('show');
      }
  });

  $("#ora").click(function() {
      if(this.checked) {
          $('#myForm').collapse('show');
      } else {
          $('#myForm').collapse('hide');
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
