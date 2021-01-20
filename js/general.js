$(function() {
    HeaderProportions();
    MarqueeProportions();
    ToggleBurgerMenu()
});

$(window).resize(function() {
    HeaderProportions();
    MarqueeProportions();
    FooterProportions();
    ToggleBurgerMenu()
});

$(document).ready(function(){
    InstaFooter();
});

function ToggleBurgerMenu() {
    padding_left = $(".postcontainer").css("margin-left");

    $(".burgermenu").css("margin-left", padding_left);
    $(".mobile_navigation").css("margin-left", "0");
    $(".mobile_navigation").css("transform", "translateX(-200px)")

    $(".burgermenu").click( () => {
        if($("#stripetwo").css("opacity") == 1){
            // Open Menu

            $("#stripeone").css("transform", "rotate(45deg) translate(3px, 4px)");
            $("#stripetwo").css("opacity", "0");
            $("#stripethree").css("transform", "rotate(-45deg) translate(3px, -4px)");

            $(".burgermenu").css("margin-left", "0");
            $(".burgermenu").css("padding-right", "4px");
            $(".mobile_navigation").css("transform", "translateX(0px)")
            $(".mobile_navigation").css("margin-left", padding_left);
        } else {
            // Close Menu

            $("#stripeone").css("transform", "rotate(0) translate(0px, 0px)");
            $("#stripetwo").css("opacity", "1");
            $("#stripethree").css("transform", "rotate(0) translate(0px, 0px)");

            $(".burgermenu").css("padding-right", "5px");
            $(".mobile_navigation").css("margin-left", "0");
            $(".mobile_navigation").css("transform", "translateX(-200px)")
            $(".burgermenu").css("margin-left", padding_left);
        }
    });
}

function HeaderProportions(){
    // Getting height of header to then define the size of the text and logo based on the headder, then centering the text and logo.
    headerheight = $("#header").height();
    textsize = headerheight/3;
    $(".navigation a").css("font-size", textsize);
    textoffset = headerheight/2 - textsize/2;
    $(".navigation").css("margin-top", textoffset);

    windowheight = $(document).width();

    if(windowheight > 800){
        logosize = headerheight/2;
        padding_left = $(".postcontainer").css("margin-left");
        $("#header").css("padding-left", padding_left);
        $("#header").css("padding-right", padding_left);
    } else {
        logosize = headerheight/3;
        $("#logo img").css("height", logosize);
        padding_left = $("#header").width()/2 - $("#logo img").width()/2;
        $("#header").css("padding-left", 0);
        $("#header").css("padding-right", 0);
    }

    logooffset = headerheight-logosize/1.2;
    $("#logo img").css("height", logosize);
    $("#logo img").css("margin-top", logooffset/2);
}

// Marquee

function MarqueeProportions(){
    // Centering Marquee Text & Setting text size.
    marqueeheight = $("#marquee").height();
    marqueetextsize = marqueeheight/1.8;
    marqueetextoffset = marqueeheight/2 - marqueetextsize/1.6;
    $("#marquee p").css("font-size", marqueetextsize);
    $("#marquee p").css("margin-top", marqueetextoffset);

    $marquee = $("#marquee p");
    $marqueetext = $("#marquee p span");
    
    maxoffset = $marquee.width();

    startoffset = $marqueetext.height();

    position = 0;

    textindent = parseInt($marquee.css("text-indent"), 10);

    // Getting width of text element.
    $marqueetext.css("text-indent", "0");
    $marqueetext.html(marquee_text);
    textwidth = $marqueetext.width();
    
    scroll();

    function scroll(){
        $marquee.css("text-indent", maxoffset);
        $marqueetext.html(marquee_text);
        $marquee.animate({ "text-indent":`${-textwidth}` }, 20000, "linear", function(){
            scroll();
        });
    }
}

function InstaFooter(){
    $.getJSON("https://www.instagram.com/crommo__/?__a=1", (data) => {
        function CreatePost(url, post_url){
            var new_post = document.createElement('div');
            new_post.className = "instagram_single_post_container";
            $(".instagram_posts_container").append(new_post);
            var new_post_a = document.createElement('a');
            new_post_a.href = post_url;
            new_post_a.target = "_blank";
            new_post.append(new_post_a);
            var new_post_img = document.createElement('img');
            new_post_img.src = url;
            new_post_a.append(new_post_img);
        }

        number_of_posts = data.graphql.user.edge_owner_to_timeline_media.count;

        posts_array = data.graphql.user.edge_owner_to_timeline_media.edges;

        posts_array = posts_array.slice(0, 9);

        console.log(posts_array);

        posts_array.forEach((element) =>{
            CreatePost(element.node.display_url, `https://instagram.com/p/${element.node.shortcode}/`);
        });

        FooterProportions();
    });
}

function FooterProportions(){
    width = $(".instagram_single_post_container a img").width();

    $(".instagram_single_post_container").css("height", width);
}