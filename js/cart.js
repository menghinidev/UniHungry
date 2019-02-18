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

  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 768) {
      document.getElementById('toHide').style.display = "none";
      document.getElementById('toShow').style.display = "block";
      document.getElementById('rem').style.display = "none";
      $('.logo').removeClass('col-2');
      $('.logo').addClass('col-4');
      $('.contenuto').removeClass('col-10');
      $('.contenuto').addClass('col-8');
      $('.description').removeClass('col-9');
      $('.description').addClass('col-12');
      $('.tofullscreen').removeClass('col-8');
      $('.tofullscreen').addClass('col-12');
      $('.change').removeClass('col-3');
      $('.change').addClass('col-12');
    } else {
      $('.change').removeClass('col-12');
      $('.change').addClass('col-3');
      $('.tofullscreen').removeClass('col-12');
      $('.tofullscreen').addClass('col-8');
      $('.description').removeClass('col-12');
      $('.description').addClass('col-9');
      $('.logo').removeClass('col-4');
      $('.logo').addClass('col-2');
      $('.contenuto').removeClass('col-8');
      $('.contenuto').addClass('col-10');
      document.getElementById('toHide').style.display = "block";
      document.getElementById('toShow').style.display = "none";
      document.getElementById('rem').style.display = "inline-block";
    }
  };

  $(window).resize(function(){
    alterClass();
  });

  alterClass();

});
