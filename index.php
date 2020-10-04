<?php get_header(); ?>

<?php
if( is_front_page() ){
    $args = array(
        'cat' => 4
    );
} elseif ( is_page( 'shop' ) ){
    $args = array(
        'cat' => 3
    );
    $is_shop = true;
}

$query = new WP_Query( $args );
?>

    <div id=main>
        <div class="postcontainer">
        <?php
        if( $is_shop ){
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>
                <div class="shopimg">
                    <div class="buttons">
                        <img src="<?php echo get_template_directory_uri(). '/assets/button2.png'?>" alt="">
                        <img src="<?php echo get_template_directory_uri(). '/assets/button1.png'?>" alt="">
                    </div>
                    <p><span><?php the_title(); ?>.jpeg</span></p>
                    <div class="imgcontainer">
                        <?php 
                        $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
                        echo $matches[0][0];
                        ?>
                    </div>
                    <?php 
                    $testiiing = get_post_meta($post->ID, "precio", true);
                    echo do_shortcode('[wp_paypal button="buynow" name="My product" amount="' . $testiiing . '"]');
                    ?>
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
        <div class="instagramcontainer">
            <p class="follow">FOLLOW US <a href="https://www.instagram.com/crommo__">@crommo__</a></p>
        </div>
    </div>

<?php get_footer(); ?>




