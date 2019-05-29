$(document).ready(function(){

    $('.filter').click(function(){
        applyFilter();
    });

});


function applyFilter(){
    var query = "";
    $('.filter').each(function(){
        if($(this).prop( "checked" )){
            query+=$(this).attr("id");
            query+="&";
        }
    });
    query = query.slice(0, -1);
    query = "?"+query;
    location.href = "./GestioneOrdini.php"+query;
}

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
