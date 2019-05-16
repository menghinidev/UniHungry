function not_loggedClick(){
    $.ajax({
    type: "GET",
    url: "set_should_login.php",
}).done(function() {
    document.location.href = "./Login.php";
  });
}


function addCart(id, button){
    $.ajax({
    type: "POST",
    url: "add_cart.php",
    data: { idProdotto: id }
}).done(function(data) {
    //updatecartIcon
    $('#cartButton').text("Carrello "+data);

    //update product button
    $(button).text("Aggiungi un altro");
    $(button).addClass("orange").removeClass("green");
  });
}
