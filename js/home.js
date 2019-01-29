$(document).ready(function() {

    $(".resBlock").click(function() {
        $(".reslogo").css( {"transform":"rotateY(0deg)", "transition":"transform 1s"})
        $(".resback").css( {"transform":"rotateY(180deg)", "transition":"transform 1s"})
        $(this).find(".reslogo").css( {"transform":"rotateY(180deg)", "transition":"transform 1s"})
        $(this).find(".resback").css( {"transform":"rotateY(360deg)", "transition":"transform 1s"})
    })

    $('.carousel').carousel({
    interval: 10000,
    cycle: true,
    pause: "null"
    });

    var $root = $('html, body');

    $('a[href^="#"]').click(function () {
    $root.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);

    return false;
    })

})
