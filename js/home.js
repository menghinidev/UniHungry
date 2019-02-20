$(document).ready(function() {

    $(".resBlock").click(function() {
        $(".reslogo").css( {"transform":"rotateY(0deg)", "transition":"transform 1s"})
        $(".resback").css( {"transform":"rotateY(180deg)", "transition":"transform 1s"})
        $(this).find(".reslogo").css( {"transform":"rotateY(180deg)", "transition":"transform 1s"})
        $(this).find(".resback").css( {"transform":"rotateY(360deg)", "transition":"transform 1s"})
    })

    $('.carousel').carousel({
    pause: "null"
    });

    $(".scrolling").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},
        Math.abs(window.scrollY - $(this.hash).offset().top) * 1.5);
    });

})
