<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="<?php echo get_template_directory_uri(). '/offline_libs/jquery.ui.touch-punch.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(). '/js/general.js'?>"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(). '/style.css' ?>">
    <?php 
        if( is_page( 'shop' ) ){ ?>
            <script type="text/javascript" src="<?php echo get_template_directory_uri(). '/js/shop.js'?>"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(). '/style_shop.css' ?>">
    <?php
        } elseif( is_home() ){ ?>
            <script type="text/javascript" src="<?php echo get_template_directory_uri(). '/js/home.js'?>"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(). '/style_home.css' ?>">
    <?php 
        } else { ?>
            <script type="text/javascript" src="<?php echo get_template_directory_uri(). '/js/contact.js'?>"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(). '/style_contact.css' ?>">
    <?php
        }
    ?>
    <script>
        marquee_text = "<?php echo bloginfo( 'description' ); ?>";
        shop = false;
        home = false;
        <?php 
        if( is_page( 'shop' ) ){
            echo "shop = true;";
        } elseif( is_home() ){
            echo "home = true;";
        }
        ?>
        if(shop){
            $(document).ready(function () {

            if (localStorage.getItem("scroll_position") != null) {
                $(window).scrollTop(localStorage.getItem("scroll_position"));
            }

            $(window).on("scroll", function() {
                localStorage.setItem("scroll_position", $(window).scrollTop());
            });

            });
        }
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="headercontainer">
        <div id="marquee">
            <p>
                <span>

                </span>
            </p>
        </div>
        <div id="header">
            <div class="navigation">
                <a href="/">Portfolio</a>
                <a href="/contact">Contacto</a>
            </div>
            <!-- <a href="/shop">TIENDA</a> -->
            <a id="logo" href="/"><img src="<?php echo get_template_directory_uri()?>/assets/logo.png" alt=""></a>
        </div>
        <!-- <div class="mobile_navigation">
            <span class="mobile_navigation_buttons">
                <a href="/">INICIO</a>
                <a href="/shop">TIENDA</a>
                <a href="/contact">CONTACTO</a>
            </span>
            <div class="burgermenu">
                <div id="stripeone"></div>
                <div id="stripetwo"></div>
                <div id="stripethree"></div>
            </div>
        </div> -->
    </div>