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
});
