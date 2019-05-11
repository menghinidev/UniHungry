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
