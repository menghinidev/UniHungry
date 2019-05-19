function changeQuantity(input, prod_id, fornitore_id){
    var newq = $(input).val();
    $.ajax({
    type: "POST",
    url: "cart_ajax.php",
    data: { action: "changeQuantity", idProdotto: prod_id, quantity: newq}
}).done(function() {
    //update total
    updateTotal();
  });
}

function updateTotal(){
    $.ajax({
    type: "POST",
    url: "cart_ajax.php",
    data: { action: "updateTotal"}
}).done(function(total) {
    //update label
    $('#totale').text(total+"€");

  });
}
