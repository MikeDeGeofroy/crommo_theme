<?php get_header(); ?>

    <div id=main>
    <div class="postcontainer_single">
    <h1><?php the_title(); ?></h1>
            <div class="imagecontainer_single">
                <div class="post" id="<?php the_ID() ?>" style="grid-row: 1 / span 2;">
                    <div class="buttons">
                    <a style="cursor: default;" href="/shop"><img class="button1" src="<?php echo get_template_directory_uri(). '/assets/button1.png'?>" alt=""></a>
                        <a class="button2" href=""><img
                                src="<?php echo get_template_directory_uri(). '/assets/button2.png'?>" style="margin-left: 3px;" alt=""></a>
                    </div>
                    <p><span><?php the_title(); ?>.jpeg</span></p>
                    <div class="shopimg">
                        <div class="overlay">
                            <?php 
                            $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
                            echo $matches[0][0];
                            // echo count($matches[0]);
                            ?>
                        </div>
                    </div>
                </div>
                    <span id="description">
                        <div class="title"><span>Descripción</span></div>
                            <span>
                            <?php  
                                echo preg_replace('/<img[^>]+./','',get_the_content());
                            ?>
                            </span>
                        </span>
                    <span id="purchase">
                        <div class="title"><span>Compra</span></div>
                        <?php
                        $price = get_post_meta($post->ID, 'precio', true);
                        echo do_shortcode("[wp_paypal button='buynow' name='My product' amount='{$price}']");
                        ?>
                    </span>
            </div>
        </div>
    </div>

<?php get_footer(); ?>