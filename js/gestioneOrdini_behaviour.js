$(document).ready(function(){

    $('.filter').click(function(){
        location.href = returnFilterUrl();
    });

    $('#dateFilter').on('input', function(e) {
        location.href = returnFilterUrl();
    });

});


function returnFilterUrl(){
    var query = "";
    var flag = false;
    var date = $('#dateFilter').val();

    $('.filter').each(function(){
        if($(this).prop( "checked" )){
            query+=$(this).attr("id");
            query+="&";
            flag = true;
        }
    });
    if(flag && date == ""){
        query = query.slice(0, -1);
        query = "?"+query;
    } else if(date !== ""){
        query = query + "date=" + date;
        query = "?"+query;
    }
    return "./GestioneOrdini.php"+query;
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
