$(window).resize(function() {
    ShopSettings();
});

$(document).ready(function(){
    ShopSettings();
});

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