$(document).ready(function() {

  $('#combo').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if (valueSelected == "AGGIUNGI CATEGORIA"){
      $("#addCat").fadeIn("1500");
    } else {
      $("#addCat").fadeOut("1500");
    }
  });

});
