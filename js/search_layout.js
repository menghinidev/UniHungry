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
      $("#cartButton").empty();
      $("#cartButton").append('<i class="fa fa-fw fa-lg fa-shopping-cart"></i>');
      $('.logo').removeClass('col-2').addClass('col-4');
      $('#filterButton').show();
      f.hide();
      f.removeClass('col-2').addClass('fullwidth');
      f.css('position', 'absolute');
  } else {
      $("#cartButton").empty();
      $("#cartButton").append('Carrello <i class="fa fa-fw fa-lg fa-shopping-cart"></i>');
      $('.logo').removeClass('col-4').addClass('col-2');
      $('#filterButton').hide();
     f.show();
     f.removeClass('fullwidth').addClass('col-2');
     f.css('position', 'relative');
  }
}
