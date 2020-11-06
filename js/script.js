$(function() {
    HeaderProportions();
    MarqueeProportions();
    InstaFooter();
});

$(window).resize(function() {
    HeaderProportions();
    MarqueeProportions();
    ShopSettings();
    FooterProportions();
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

function ObjectAnimation(template_directory){
    container = document.getElementById( 'canvas' );
    document.body.appendChild( container );

    var scene = new THREE.Scene();

    var camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );
    camera.position.z = 2;

    var renderer = new THREE.WebGLRenderer({antialias: true});

    renderer.setClearColor("#FFFFFF");

    renderer.setSize(window.innerWidth, window.innerHeight);

    document.body.appendChild(renderer.domElement);

    var light1 = new THREE.PointLight(0xFFFFFF, 1, 500);
    light1.position.set(0, 0, 10);
    scene.add(light1);
    var light2 = new THREE.PointLight(0xFFFFFF, 1, 500);
    light2.position.set(0, 10, 0);
    scene.add(light2);
    var light3 = new THREE.PointLight(0xFFFFFF, 1, 500);
    light2.position.set(10, 0, 0);
    scene.add(light3);

    var objLoader = new THREE.OBJLoader();
    var mtlLoader = new THREE.MTLLoader();

    var MyObj;

    mtlLoader.setPath(template_directory + '/3d_objects/');

    console.log(template_directory);

    var url = "untitled.mtl";

    mtlLoader.load(url, function(materials) {

    materials.preload();

    var objLoader = new THREE.OBJLoader();
    objLoader.setMaterials(materials);
    objLoader.setPath(template_directory + '/3d_objects/');
    objLoader.load('untitled.obj', function (object) {

        MyObj = object;

        scene.add(object);

    });

    });

    var render = function() {
        requestAnimationFrame(render);  

        MyObj.rotation.y += 0.001;
        MyObj.rotation.z += 0.001;
        MyObj.rotation.x += 0.001;

        renderer.render(scene, camera);
    } 

    render();
}