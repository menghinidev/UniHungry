function buttonClick(action, id_ordine){
    $.ajax({
    type: "POST",
    url: "ordiniStatus_ajax.php",
    data: { action: action, id_ordine: id_ordine}
}).done(function() {
    //update
    location.reload();
  });
}
