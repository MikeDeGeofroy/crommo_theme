$(function() {
    HomeSettings();
});

$(window).resize(function() {
    HomeSettings();
});

$(document).ready(function(){
    HomeSettings()
});

function HomeSettings(){
    $(".headerimagecontainer").css("height", window.innerHeight);

    $("#arrow_bounce").click( () => {
        window.scroll({ top: window.innerHeight, behavior: 'smooth' });
        is_top = false;
    })

    is_top = true;

    if(window.scrollY < window.innerHeight){
        $(".headercontainer").hide();
    }

    $(document).scroll( () => {

        // If viewport is in main screen -> hide header
        if(window.scrollY < window.innerHeight){
            $(".headercontainer").fadeOut();
        } else {
            $(".headercontainer").fadeIn();
            $("#arrow_bounce").fadeOut();
            // is_top = false;
        }

        // If viewport is top -> set is_top : true;
        if(window.scrollY == 0){
            setTimeout(() => {  is_top = true; }, 500);
            $("#arrow_bounce").fadeIn();
        }

        // If is_top true -> scroll down viewport height

        if(is_top && window.scrollY < window.innerHeight){
            window.scroll({ top: window.innerHeight, behavior: 'smooth' });
            is_top = false;
        }
    });
}