$(document).ready(function(){

  $('.timepicker').timepicker({
    timeFormat: 'H:mm',
    interval: 15,
    startTime: '08:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
  });

  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 750) {
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

  $("#modificaform").submit(function(event) {
    var areNumbers = checkIfAreNumbers();
    if (areNumbers) {
      var areHourOk = testCorrectHours();
      if (areHourOk) {
        prePost();
      } else {
        $('#error').show();
        event.preventDefault();
      }
    } else {
      $('#error').show();
      event.preventDefault();
    }
  });

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

function showOptional(obj, name) {
  var x = document.getElementById(name).getElementsByClassName('optional');
  var start = document.getElementById(name).getElementsByClassName('vertical')[0];
  var end = document.getElementById(name).getElementsByClassName('vertical')[1];
  if ((start.value != '') && (end.value != '')) {
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
  } else {
    obj.checked = true;
  }
}

function setDisabled(){
  $.ajax({
  type: "POST",
  url: "check_error.php",
}).done(function(data) {
  if (data == 'ok') {
    $('#error').hide();
  }
});

  var checkbox = document.getElementsByClassName('form-check-input');
  for (var i = 0; i < checkbox.length; i++) {
    if (checkbox[i].checked) {
      var parentRowId = checkbox[i].parentNode.parentNode.id;
      checkChange(checkbox[i], parentRowId);
    }
  }
}

function prePost() {
  var hours = document.getElementsByClassName('vertical');
  for (var i = 0; i < hours.length; i++) {
    if (hours[i].value == '') {
      hours[i].disabled = true;
    }
  }
}

function testCorrectHours(){
  var days = ['Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica'];
  var ok = true;
  for (var i = 0; i < days.length; i++) {
    var startPausa = document.getElementById(days[i]).getElementsByClassName('optional')[0];
    var endPausa = document.getElementById(days[i]).getElementsByClassName('optional')[1];
    var start = document.getElementById(days[i]).getElementsByClassName('vertical')[0];
    var end = document.getElementById(days[i]).getElementsByClassName('vertical')[1];
    if((start.value != '') && (end.value != '')) {
      var startDate = new Date('1995-12-17T' + start.value + ':00');
      var endDate = new Date('1995-12-17T' + end.value + ':00');
      if(startDate - endDate >= 0) {
        start.classList.add('lighted');
        end.classList.add('lighted');
        ok = false;
      }
      if (!startPausa.disabled) {
        var startPausaDate = new Date('1995-12-17T' + startPausa.value + ':00');
        var endPausaDate = new Date('1995-12-17T' + endPausa.value + ':00');
        if(startPausaDate - endPausaDate > 0) {
          startPausa.classList.add('lighted');
          endPausa.classList.add('lighted');
          ok = false;
        }
        if (startDate - startPausaDate > 0) {
          if(!start.classList.contains('lighted')) {
            start.classList.add('lighted');
          }
          if (!startPausa.classList.contains('lighted')) {
            startPausa.classList.add('lighted');
          }
          ok = false;
        }
        if (endDate - endPausaDate < 0) {
          if(!end.classList.contains('lighted')) {
            end.classList.add('lighted');
          }
          if (!endPausa.classList.contains('lighted')) {
            endPausa.classList.add('lighted');
          }
          ok = false;
        }
      }
    }
  }
  return ok;
}

function dismissAlert(){
  $('#error').hide();
  var elementHigh = document.getElementsByClassName('lighted');
  var arr = new Array();
  for (var x = 0; x < elementHigh.length; x++) {
    arr.push(elementHigh[x]);
  }
  for (var x = 0; x < arr.length; x++) {
    arr[x].classList.remove('lighted');
  }
}

function checkIfAreNumbers(){
  return true;
}
