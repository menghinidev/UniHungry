$(document).ready(function() {

  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 1270) {
      $('.content').addClass('changeScreen');
      $('.changeScreen').removeClass('content');
      $('.logo').removeClass('col-2');
      $('.logo').addClass('col-4');
      $('.contenuto').removeClass('col-10');
      $('.contenuto').addClass('col-8');
      document.getElementById('filters').style.display = "none";
      document.getElementById('searchToHide').style.display = "block";
      document.getElementById('myFiltersNav').style.display = "block";
      changeDisplay('buttonAppear', 'block');
      changeDisplay('buttonToHide', 'none');
    } else {
      $('.logo').removeClass('col-4');
      $('.logo').addClass('col-2');
      $('.contenuto').removeClass('col-8');
      $('.contenuto').addClass('col-10');
      changeDisplay('buttonAppear', 'none');
      changeDisplay('buttonToHide', 'block');
      document.getElementById('filters').style.display = "block";
      document.getElementById('myFiltersNav').style.display = "none";
      document.getElementById('searchToHide').style.display = "none";
      $('.changeScreen').addClass('content');
      $('.content').removeClass('changeScreen');
    }
  };

  $(window).resize(function(){
    alterClass();
  });

  alterClass();
})

function changeDisplay(className, property) {
  var elem = document.getElementsByClassName(className);
  for (i = 0; i < elem.length; i++) {
    elem[i].style.display = property;
  }
}
