<?php get_header(); ?>

<?php
if( is_front_page() ){
    $args = array(
        'category_name' => 'home'
    );
} elseif ( is_page( 'shop' ) ){
    $args = array(
        'category_name' => 'shop'
    );
    $is_shop = true;
}

$query = new WP_Query( $args );
?>

    <div id=main>
        <div class="postcontainer">
        <div class="column">
        <?php
        if( $is_shop ){
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>
                <div class="post" id="<?php the_ID() ?>">
                    <div class="buttons">
                        <img class="button1" src="<?php echo get_template_directory_uri(). '/assets/button1.png'?>" alt="">
                        <a  class="button2" href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(). '/assets/button2.png'?>" style="margin-left: 3px;" alt=""></a>
                    </div>
                    <p><span><?php the_title(); ?>.jpeg</span></p>
                    <p class="button3"><a href="<?php the_permalink() ?>">VER ARTICULO</a></p>
                    <div class="shopimg">
                        <div class="overlay">
                        <?php 
                        $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
                        echo $matches[0][0];
                        ?>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
        } else {
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
            
                    the_content();
                }
            }
        }
        ?>
        </div>
            <!-- remove me -->
            <div class="column">
        <?php
        if( $is_shop ){
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>
                <div class="post" id="<?php the_ID() ?>">
                    <div class="buttons">
                        <img class="button1" src="<?php echo get_template_directory_uri(). '/assets/button1.png'?>" alt="">
                        <a  class="button2" href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(). '/assets/button2.png'?>" style="margin-left: 3px;" alt=""></a>
                    </div>
                    <p><span><?php the_title(); ?>.jpeg</span></p>
                    <p class="button3"><a href="<?php the_permalink() ?>">VER ARTICULO</a></p>
                    <div class="shopimg">
                        <div class="overlay">
                        <?php 
                        $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
                        echo $matches[0][0];
                        ?>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
        } else {
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
            
                    the_content();
                }
            }
        }
        ?>
        </div>
            <!-- remove me -->
        </div>
    </div>


<?php get_footer(); ?>




