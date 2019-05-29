function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result)
        };
        reader.readAsDataURL(input.files[0]);
    }
    if (input.files[0].size > 1000000) {
      $('#error').show();
    } else {
      $('#error').hide();
      $('#modal').modal('show');
    }
}

$(document).ready(function(){
  if($('#foodImg').attr("src") == '../res/default_food.png') {
    $("#sumbitForm").attr("disabled", true);
  }
});

var immagine;

(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    $('#error').hide();
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          event.preventDefault();
          uploadData();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

window.addEventListener('DOMContentLoaded', function () {
  var image = document.getElementById('image');
  var cropBoxData;
  var canvasData;
  var cropper;

  $('#modal').on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
      aspectRatio: 1 / 1,
      autoCropArea: 0.5,
      ready: function () {
        cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
      }
    });
  }).on('hidden.bs.modal', function () {
    cropBoxData = cropper.getCropBoxData();
    canvasData = cropper.getCanvasData();
    $('#sumbitForm').removeAttr("disabled");
    cropper.getCroppedCanvas().toBlob((blob) => {
      immagine = blob;
      const imageUrl = URL.createObjectURL(blob);
      $('#foodImg').attr('src', imageUrl);
    });
    cropper.destroy();
  });
});

function uploadData() {
  var myform = document.getElementById('modificaform');
  var form = new FormData(myform);
  form.append('foto', immagine);
  $.ajax({
    type: 'POST',
    url: 'action_fornitore_update.php',
    data: form,
    processData: false,
    contentType: false
  }).done(function(data) {
    window.location = "/unihungry/php/ProfiloFornitore.php";
  });
}
