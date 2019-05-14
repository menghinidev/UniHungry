function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#foodImg').attr('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$("#reset").on('click', function() {
  $('#foodImg').attr('src', '../res/default_food.png');
});

$(document).ready(function(){

  $('.timepicker').timepicker({
    timeFormat: 'H:mm',
    interval: 15,
    minTime: '8:00am',
    maxTime: '6:00pm',
    startTime: '08:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
  });

});

function handleChange(obj){
  var start = document.getElementById('orarioInizio').value;
  var end = document.getElementById('orarioFine').value;
  $.ajax({
    type: "POST",
    url: "day_setter.php",
    data: {selectedDay: obj.value, inizio: start, fine: end}
  }).done(function(data) {
    alert(data);
    window.location.reload(true);
  });
}
