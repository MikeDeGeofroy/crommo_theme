$(window).resize(function() {
    HomeSettings();
});

$(document).ready(function(){
    HomeSettings();
    moodBoard();
});

function HomeSettings(){
    $(".headerimagecontainer").css("height", window.innerHeight);

    if(window.scrollY < window.innerHeight/2){
        $("#logo").hide();
        $("#marquee").hide();
    }

    $(document).scroll( () => {

        // If viewport is in main screen -> hide header
        if(window.scrollY < window.innerHeight/1.5){
            // $(".headercontainer").fadeOut();
            $("#logo").fadeOut();
            $("#marquee").fadeOut();
        } else {
            // $(".headercontainer").fadeIn();
            $("#logo").fadeIn();
            $("#marquee").fadeIn();
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