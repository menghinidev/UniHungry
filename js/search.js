$(document).ready(function() {

  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 768) {
      $('.content').addClass('changeScreen');
      $('.changeScreen').removeClass('content');
    } else {
      $('.changeScreen').addClass('content');
      $('.content').removeClass('changeScreen');
    }
  };

  $(window).resize(function(){
    alterClass();
  });

  alterClass();
})
