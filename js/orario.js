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

  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 1250) {
      $('.larger').removeClass('col-2');
      $('.larger').addClass('col-6');
      $('.newline').addClass('topdistance');
      changeDisplay('hide', 'none');
    } else {
      $('.larger').removeClass('col-6');
      $('.larger').addClass('col-2');
      $('.newline').removeClass('topdistance');
      changeDisplay('hide', 'flex');
    }
  };

  $(window).resize(function(){
    alterClass();
  });
  setDisabled();
  alterClass();

});

function changeDisplay(className, property) {
  var elem = document.getElementsByClassName(className);
  for (i = 0; i < elem.length; i++) {
    elem[i].style.display = property;
  }
}

function checkChange(obj, name) {
  var x = document.getElementById(name).getElementsByClassName('optional');
  if(obj.checked) {
    for (i = 0; i < x.length; i++) {
      x[i].disabled = true;
      x[i].value = '';
    }
  } else {
    for (i = 0; i < x.length; i++) {
      x[i].disabled = false;
    }
  }
}

function setDisabled(){
  var checkbox = document.getElementsByClassName('form-check-input');
  for (var i = 0; i < checkbox.length; i++) {
    if (checkbox[i].checked) {
      var parentRowId = checkbox[i].parentNode.parentNode.id;
      checkChange(checkbox[i], parentRowId);
    }
  }
}
