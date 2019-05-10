$(document).ready(function() {

  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 768) {
      $('.logo').removeClass('col-2');
      $('.logo').addClass('col-4');
      $('.contenuto').removeClass('col-10');
      $('.contenuto').addClass('col-8');
    } else {
      $('.logo').removeClass('col-4');
      $('.logo').addClass('col-2');
      $('.contenuto').removeClass('col-8');
      $('.contenuto').addClass('col-10');
    }
  };

  $(window).resize(function(){
    alterClass();
  });

  alterClass();
})
