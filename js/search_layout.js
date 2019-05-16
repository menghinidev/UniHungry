$(document).ready(function() {

$(window).resize(function(){
  alterClass();
});

alterClass();

});


function alterClass() {
  var ww = document.body.clientWidth;
  var f = $('#filters');
  if(ww < 850){
      $('.logo').removeClass('col-2').addClass('col-4');
      $('#filterButton').show();
      f.hide();
      f.removeClass('col-2').addClass('fullwidth');
      f.css('position', 'absolute');
  } else {
      $('.logo').removeClass('col-4').addClass('col-2');
      $('#filterButton').hide();
     f.show();
     f.removeClass('fullwidth').addClass('col-2');
     f.css('position', 'relative');
  }
}
