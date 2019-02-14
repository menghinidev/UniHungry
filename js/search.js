$(document).ready(function() {

  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 768) {
      $('.content').addClass('changeScreen');
      $('.changeScreen').removeClass('content');
      document.getElementById('filters').style.display = "none";
      //document.getElementById("filters").classList.add("tab-pane", "fade");
      //document.getElementById("content").classList.add("tab-pane", "fade", "in", "active");
      document.getElementById('myFiltersNav').style.display = "block";
    } else {
      document.getElementById('filters').style.display = "block";
      //document.getElementById("filters").classList.remove("tab-pane", "fade");
      //document.getElementById("content").classList.remove("tab-pane", "fade", "in", "active");
      document.getElementById('myFiltersNav').style.display = "none";
      $('.changeScreen').addClass('content');
      $('.content').removeClass('changeScreen');
    }
  };

  $(window).resize(function(){
    alterClass();
  });

  alterClass();
})
