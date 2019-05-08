function handleModify(status, id) {
  $.ajax({
  type: "POST",
  url: "ModifyHandle.php",
  data: { status: status, id: id }
}).done(function() {
  window.location.reload();
});
}
