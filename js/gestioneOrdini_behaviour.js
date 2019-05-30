$(document).ready(function(){

    $('.filter').click(function(){
        location.href = returnFilterUrl();
    });

    $('#dateFilter').on('input', function(e) {
        location.href = returnFilterUrl();
    });

    setInterval(function(){ checkUpdate(); }, 1000*30);

});


function checkUpdate(){
    var count = 0;
    $('.order').each(function(){
        count++;
    });
    console.log(count);
    $.ajax({
    type: "POST",
    url: "checkUpdateOrders.php",
    data: {count: count, ricevuto:isFilterEnabled("#ricevuto"), accettato:isFilterEnabled("#accettato"), consegnato: isFilterEnabled("#consegnato"), completato: isFilterEnabled("#completato"),date: $('#dateFilter').val() }
}).done(function(update) {
        console.log(update);
        if(update == "true"){
            location.reload();
        }
    });
}

function isFilterEnabled(id){
    if($(id).prop( "checked" )){
        return true;
    }
    return false;
}

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
    refresh();
  });
}

function refresh(){
    var queryParameters = {}, queryString = location.search.substring(1),
    re = /([^&=]+)=([^&]*)/g, m;
    while (m = re.exec(queryString)) {
    queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    }
    delete queryParameters['oid'];
    location.search = $.param(queryParameters); // Causes page to reload but without oid
}
