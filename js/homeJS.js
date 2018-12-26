$(document).ready(function()
{
    $(".rescaption").hide();

    $(".resBlock").mouseenter(function(event)
    {
        $(this).find(".rescaption").fadeIn(500);
    }).mouseleave(function(event)
    {
        $(this).find(".rescaption").fadeOut(500);
    })
});
