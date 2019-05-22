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
}).done(function(param) {
    updateTotal();
    var array = param.split(",");
    var fornitori = array[0];
    var f_delete = array[1];
    if(fornitori > 1){
        //reload banner
        $("#fornitoriNum").text(fornitori);
    } else {
        //remove banner
        $("#fornitoriAlert").hide();
    }
    if(f_delete){
        $("#fornitore"+fornitore_id).remove();
    }
    //remove product row
    $("#prodotto"+prod_id).remove();

    if(fornitori == 0){
        $("#content").text("Il carrello è vuoto!");
        $("#ordina").attr("disabled","disabled");
    }
    });
}
