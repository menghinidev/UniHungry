function not_loggedClick(){
    $.ajax({
    type: "GET",
    url: "set_should_login.php",
}).done(function() {
    document.location.href = "./Login.php";
  });
}


function addCart(id, id_fornitore, button){
    $.ajax({
    type: "POST",
    url: "add_cart.php",
    data: { idProdotto: id, idFornitore: id_fornitore }
}).done(function(data) {
    //updatecartIcon
    $('#cartButton').text("Carrello "+data);

    //update product button
    $(button).text("Aggiungi un altro");
    $(button).addClass("orange").removeClass("green");
  });
}
