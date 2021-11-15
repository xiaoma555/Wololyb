$(function () {
    $("#fb #teb").click(function () {
        if($("#fb").css('left')=="-400px"){
            $("#fb").css('left','0px');
        }
        else{
            $("#fb").css('left','-400px');
        }
    })
})