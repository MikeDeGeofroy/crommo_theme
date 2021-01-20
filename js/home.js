$(window).resize(function() {
    HomeSettings();
});

$(document).ready(function(){
    HomeSettings();
    moodBoard();
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

    // Posts positioning. Count posts, if is first post, set to take full width, second column 1, third column 3
}  

function moodBoard(){
    element = $('.post');

    element.draggable({
        cursor: "move",
        stack: ".post"
    })

    element.each( setRandomPosition );

    function setRandomPosition(){
        //Generate random Top % [0, 75]
        var randomTop = randomIntFromInterval(-35, 35);
        //Generate randon Left % [0, 85]
        var randomLeft = randomIntFromInterval(-35, 35);
        $(this).css({
          top: randomTop + '%',
          left: randomLeft + '%'
        })
      }

    function randomIntFromInterval(min,max) {
        return Math.floor(Math.random()*(max-min+1)+min);
    }
}