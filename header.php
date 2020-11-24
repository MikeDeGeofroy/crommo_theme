<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(). '/js/script.js'?>"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(). '/style.css' ?>">
    <script>
        marquee_text = "<?php echo bloginfo( 'description' ); ?>";
        shop = false;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
            <a href="/" style="margin-left: 50px;">INICIO</a>
            <a href="/shop">TIENDA</a>
            <a href="/contact" style="margin-right: 100px;">CONTACTO</a>
            <a id="logo" href="/"><img src="<?php echo get_template_directory_uri()?>/assets/logo.png" alt=""></a>
        </div>
    </div>