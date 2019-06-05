function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
    if (input.files[0].size > 900000) {
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

(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    $('#error').hide();
    if(window.location.href.indexOf("id") <= -1) {
       $("#sumbitForm").attr("disabled", true);
    }
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


var immagine;


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
      if(blob.size < 1900000) {
        immagine = blob;
        const imageUrl = URL.createObjectURL(blob);
        $('#foodImg').attr('src', imageUrl);
        $("#sumbitForm").attr("disabled", false);
      } else {
        $("#sumbitForm").attr("disabled", true);
        $('#error').show();
      }
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
    url: 'action_upload_form.php',
    data: form,
    processData: false,
    contentType: false
  }).done(function(data) {
    window.location = "/unihungry/php/ProfiloFornitore.php";
  });
}

function showConfirm() {
  $('#confirm').modal('show');
}

function deleteProduct() {
  var id = $('#idprodotto').val();
  $.ajax({
    type: 'POST',
    url: 'action_delete_product.php',
    data: {productId: id},
  }).done(function(data) {
    window.location = "/unihungry/php/ProfiloFornitore.php";
  });
}
