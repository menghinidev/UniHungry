function unLock(element) {
  var id = $(element).attr("id");
  var password = generatePassword();
  //generate password
  $.ajax({
  type: "POST",
  url: "action_unlock.php",
  data: { id: id, pw:password }
}).done(function(data) {
    $("#"+id+"").parent().parent().remove();
  });
};


function generatePassword(){
    var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < 10; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }

    return hex_sha512(pass);
}
