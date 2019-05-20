function changeQuantity(input, prod_id, fornitore_id){
    var newq = $(input).val();
    $.ajax({
    type: "POST",
    url: "cart_ajax.php",
    data: { action: "changeQuantity", idProdotto: prod_id, quantity: newq, idFornitore: fornitore_id}
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

function removeProduct(prod_id, fornitore_id){
    $.ajax({
    type: "POST",
    url: "cart_ajax.php",
    data: { action: "removeProduct",  idProdotto: prod_id, idFornitore: fornitore_id}
}).done(function(reload) {
    updateTotal();
    if(reload){
        window.location.reload();
    } else {
        //remove row
        $("#prodotto"+prod_id).remove();
    }
  });
}
