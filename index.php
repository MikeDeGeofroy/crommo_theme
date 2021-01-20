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
        <img id="arrow_bounce" src="<?php echo get_template_directory_uri()?>/assets/Arrow_Down.png" alt="">
    </div>
    <div class="postcontainer">
        <!-- <div class="post">
            <h1>EL TITULO</h1>
            <img src="https://images.unsplash.com/photo-1607903289321-7d98f815796d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                alt="">
        </div>
        <div class="post post3">
            <h1>EL TITULO</h1>
            <img src="https://images.unsplash.com/photo-1531346724132-8e2e298435e5?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=934&q=80"
                alt="">
        </div>
        <div class="post post2">
            <h1>EL TITULO</h1>
            <img src="https://images.unsplash.com/photo-1555928999-5a01ee666478?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80"
                alt="">
        </div> -->
        <?php 

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post(); ?>
        <a href="<?php the_permalink() ?>">
            <div class="post">
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
            <h1>+34 635 03 58 71</h1>
            <h1>info@crommo.es</h1>
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