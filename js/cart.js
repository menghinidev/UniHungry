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
    } else {
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
