$(function() {
    HeaderProportions();
    MarqueeProportions();
});

$(window).resize(function() {
    HeaderProportions();
    MarqueeProportions();
    ShopSettings();
});

$(document).ready(function(){
    ShopSettings();
});

function HeaderProportions(){
    // Getting height of header to then define the size of the text and logo based on the headder, then centering the text and logo.
    headerheight = $("#header").height();
    textsize = headerheight/4;
    $("#header a:not(#logo)").css("font-size", textsize);
    textoffset = headerheight/2 - textsize/2;
    $("#header a:not(#logo)").css("margin-top", textoffset);

    windowheight = $(document).width();

    if(windowheight > 800){
        logosize = headerheight/2;
    } else {
        logosize = headerheight/3;
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
    marqueetextoffset = marqueeheight/2 - marqueetextsize/1.8;
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
    $marqueetext.html(text);
    textwidth = $marqueetext.width();
    
    scroll();

    function scroll(){
        $marquee.css("text-indent", maxoffset);
        $marqueetext.html(text);
        $marquee.animate({ "text-indent":`${-textwidth}` }, 20000, "linear", function(){
            scroll();
        });
    }
}

function ShopSettings(){
    $(".post").each(function(){
        titlewidth = $(".shopimg", this).width() + 5;
        $("p", this).css("width", titlewidth);

        $(".buttons .button1", this).click(function(){
            postid = $(this).parent().parent().attr('id');
            $("#" + postid).fadeOut();
        });
        
        margintop = $(".shopimg img", this).height()/2;

        if(margintop == 0){
            setTimeout(function(){
                ShopSettings();
            }, 500);
        }

        $(".button3", this).css("top", -margintop - $(".button3", this).height() - $(".description", this).height() - 10);

        if(window.location.pathname == "/shop/"){
            $(".shopimg .overlay", this).mouseenter(function() {
                $("img", this).css("filter", "blur(2px)").css("transform", "scale(1.05)");
                $(this).closest(".post").find(".button3").click(function(){
                    $("a", this).css("color", "rgba(255, 255, 255, 1)");
                    $("a", this).css("border", "3px solid rgba(255, 255, 255, 1)");
                });
                $(this).closest(".post").find(".button3").trigger("click");
            }).mouseleave(function() {
                $("img", this).css("filter", "blur(0px)").css("transform", "scale(1.00)");
                $(this).closest(".post").find(".button3").click(function(){
                    $("a", this).css("color", "rgba(255, 255, 255, 0)");
                    $("a", this).css("border", "3px solid rgba(255, 255, 255, 0)");
                });
                $(this).closest(".post").find(".button3").trigger("click");
            });
            $(".button3", this).mouseenter(function() {
                $(this).closest(".post").find(".shopimg .overlay").click(function(){
                    $("img", this).css("filter", "blur(2px)").css("transform", "scale(1.05)");
                });
                $(this).closest(".post").find(" .shopimg .overlay ").trigger("click");
                $("a", this).css("color", "rgba(255, 255, 255, 1)");
                $("a", this).css("border", "3px solid rgba(255, 255, 255, 1)");
            }).mouseleave(function() {
                $(this).closest(".post").find(".shopimg .overlay").click(function(){
                    $("img", this).css("filter", "blur(0px)").css("transform", "scale(1.00)");
                });
                $(this).closest(".post").find(" .shopimg .overlay ").trigger("click");
                $("a", this).css("color", "rgba(255, 255, 255, 0)");
                $("a", this).css("border", "3px solid rgba(255, 255, 255, 0)");
            });
        } else {
            $(".post").mouseenter(function() {
                $(this).css("transform", "scale(1.01)");
            }).mouseleave(function() {
                $(this).css("transform", "scale(1.00)");
            }).click( () => {
                console.log($(this).css("transform"));
            });
        }
    });
}