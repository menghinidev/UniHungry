function unLock(element) {
  var id = $(element).attr("id");
  //generate password
  $.ajax({
  type: "POST",
  url: "action_unlock.php",
  data: { id: id}
}).done(function(data) {
    $("#"+id+"").parent().parent().remove();
  });
};
