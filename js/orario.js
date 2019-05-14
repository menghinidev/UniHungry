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

  $("#modificaform").submit(function(event) {
    prePost();
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
    testCorrectHours();
    obj.checked = true;
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
  for (var i = 0; i < days.length; i++) {
    var x = document.getElementById(days[i]).getElementsByClassName('optional');
    var start = document.getElementById(days[i]).getElementsByClassName('vertical')[0];
    var end = document.getElementById(days[i]).getElementsByClassName('vertical')[1];
    if((start.value != '') && (end.value != '')) {
      var startDate = new Date('1995-12-17T' + start.value + ':00');
      var endDate = new Date('1995-12-17T' + end.value + ':00');
      if(startDate - endDate > 0) {
        return false;
      }
    }
  }
}
