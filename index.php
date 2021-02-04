<?php get_header(); ?>

<?php
session_start();

if( is_front_page() ){
    $args = array(
        'category_name' => 'home'
    );
    $_SESSION['category'] = "home";
} elseif ( is_page( 'shop' ) ){
    $args = array(
        'category_name' => 'shop'
    );
    $_SESSION['category'] = "shop";
} elseif ( is_page( 'contact' ) ) {
    $args = array(
        'category_name' => 'contact'
    );
    $_SESSION['category'] = "contact";
}

$query = new WP_Query( $args );
?>

<div id="main">
    <?php
        if( $_SESSION['category'] == "shop" ){ ?>
    <div class="postcontainer">
        <?php
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>
        <div class="post" id="<?php the_ID() ?>">
            <div class="buttons">
                <img class="button1" src="<?php echo get_template_directory_uri(). '/assets/button1.png'?>" alt="">
                <a class="button2" href="<?php the_permalink() ?>"><img
                        src="<?php echo get_template_directory_uri(). '/assets/button2.png'?>" style="margin-left: 3px;"
                        alt=""></a>
            </div>
            <p><span><?php the_title(); ?>.jpg</span></p>
            <div class="shopimg">
                <div class="overlay">
                    <?php 
                        $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content,
                    $matches);
                    echo $matches[0][0];
                    ?>
                </div>
            </div>
            <div class="description">
                <a href="">
                    <div class="title"><span><?php the_title(); ?></span></div>
                    <div><span><?php get_metadata('post', $post->ID, 'precio', true); ?></span><span> EUR</span></div>
                </a>
            </div>
            <p class="button3"><a href="<?php the_permalink() ?>">VER ARTICULO</a></p>
        </div>
        <?php
                }
            }
        ?>
    </div>
    <?php
        } elseif( $_SESSION['category'] == "home" ) { ?>
    <div class="header_image_container">
        <img src="<?php echo get_template_directory_uri()?>/assets/logo.png" alt="">
        <!-- <img id="arrow_bounce" src="<?php echo get_template_directory_uri()?>/assets/Arrow_Down.png" alt=""> -->
    </div>
    <div class="postcontainer">
        <?php 

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post(); ?>
        <a class="post" href="<?php the_permalink() ?>">
            <div>
                <span><?php the_title(); ?></span>
                <?php 
                    $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
                echo $matches[0][0];
                ?>
            </div>
        </a>
        <?php
            }
        }

        ?>
    </div>
    <?php
        } elseif( $_SESSION['category'] == "contact" ) { ?>
    <div class="postcontainer">
        <div id="canvas"></div>
        <div class="contact">
            <h2><a href="tel:+34 635 03 58 71">+34 635 03 58 71</a></h2>
            <h2><a href="mailto:hello@crommo.es">hello@crommo.es</a></h2>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/102/three.js"></script>
    <script src="<?php echo get_template_directory_uri(). '/js/obj.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri(). '/js/mtl.js' ?>"></script>

    <script>
    template_directory_uri = "<?php echo get_template_directory_uri()?>";
    ObjectAnimation(template_directory_uri);
    </script>

    <?php
        }
        ?>
</div>


<?php get_footer(); ?>