$(document).ready(function(){
    $(window).on( "unload", function(e) {
        //set notifications as seen
        setAllSeen();
    });

    setInterval(function(){ updateList(); }, 1000*60);//updates every minute
});

function setAllSeen(){
    //get ids of displayed
    var ids = [];
    $('.notify-row').each(function(){
        ids.push($(this).attr('id').replace("notifica", ""))
    });
    console.log(ids);
    $.ajax({
    type: "POST",
    url: "notifications_ajax.php",
    data: {action: "setAllSeen", ids: ids }
    });
}

function updateList(){
    setAllSeen();
    $.ajax({
    type: "POST",
    url: "notifications_ajax.php",
    data: {action: "updateList"}
}).done(function(html) {
        $("#notifications").prepend(html);
    });
}
