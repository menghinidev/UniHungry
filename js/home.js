$(document).ready(function() {

    $("div:not(.resBlock)").click(function(){
        $(".reslogo").css( {"transform":"rotateY(0deg)", "transition":"transform 1s"})
        $(".resback").css( {"transform":"rotateY(180deg)", "transition":"transform 1s"})
    });

    $(".resBlock").click(function() {
        event.stopPropagation();
        $(".reslogo").css( {"transform":"rotateY(0deg)", "transition":"transform 1s"})
        $(".resback").css( {"transform":"rotateY(180deg)", "transition":"transform 1s"})
        $(this).find(".reslogo").css( {"transform":"rotateY(180deg)", "transition":"transform 1s"})
        $(this).find(".resback").css( {"transform":"rotateY(360deg)", "transition":"transform 1s"})
    });

    $('.carousel').carousel({
    pause: "null"
    });

    $(".scrolling").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},
        Math.abs(window.scrollY - $(this.hash).offset().top) * 1);
    });

    $(window).scroll(function () {
      var top =  $(".goto-top");
      if ( $('body').height() <= (    $(window).height() + $(window).scrollTop() + 200 )) {
        top.animate({"margin-left": "0px"}, 1500);
      } else {
        top.animate({"margin-left": "-100%"}, 1500);
      }
    });

    $(".goto-top").on('click', function () {
        $("html, body").animate({scrollTop: 0}, 1000);
    });
});
