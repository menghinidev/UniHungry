$(document).ready(function(){
    updateNotifications();

    setInterval(function(){ updateNotifications(); }, 1000*30);//updates every minute

    //shouldnt set seen if click on show all
    $('#dropdown_parent').on('hidden.bs.dropdown', function () {
        setSeen();
    });
});

function mostraTutte(){
    $( "#dropdown_parent" ).off();
    window.location.href = "../php/Notifications.php";
}


function updateNotifications(){
    $.ajax({
    type: "POST",
    url: "navbar_ajax.php",
    data: {action: "update" }
}).done(function(data) {
    var array = data.split("_");
    var num = array[0];
    var html = array[1];
    $("#drop_notifiche").empty();
    $("#drop_notifiche").append(html);
    //update button
    if(num>0){
        $(".notifiche_count").text(num);
        $(".notifiche_count").show();
        $("#dropdownCount").text(num);
        $("#dropdownCount").show();
    }
  });
}

function setSeen(){
    //get ids of displayed
    var ids = [];
    $('.notify').each(function(){
        ids.push($(this).attr('id').replace("notifica", ""))
    });
    $.ajax({
    type: "POST",
    url: "navbar_ajax.php",
    data: {action: "set_seen", ids: ids }
}).done(function() {
    //update current view
    $(".notify").removeClass("not-seen");
    $(".notifiche_count").hide();
    $("#dropdownCount").hide();
  });
}
