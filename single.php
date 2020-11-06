<?php get_header(); ?>

    <div id=main>
    <?php
    session_start();
    if( $_SESSION['category'] == "shop" ){
        ?>
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
                    <div id="myCarousel" class="carousel slide shopimg" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php 
                                $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
                                foreach($matches[0] as $key=>$value){ 
                                    if(count($matches[0]) == 1){ ?>

                                        <?php
                                    } elseif($key == 0){ ?>
                                        <li data-target="#myCarousel" class="active" data-slide-to="<?php echo $key ?>"></li>
                                        <?php
                                    }else { ?>

                                    <li data-target="#myCarousel" data-slide-to="<?php echo $key ?>"></li>
                                    <?php
                                    }
                                }
                            ?>
                        </ol>
                        <div class="overlay carousel-inner">
                            <?php 

                            foreach($matches[0] as $key=>$value){
                                if($key == 0){ ?>
                                    <div class="item active"><?php echo $value ?></div>
                                    <?php
                                } else { ?>
                                    <div class="item"><?php echo $value ?></div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                    <span id="description">
                        <div class="title"><span>Descripción</span></div>
                            <span>
                            <?php  
                                $content = preg_replace('/<img[^>]+./','',get_the_content());
                                $content = preg_replace('/<ul[^>]+./','',$content);
                                echo $content;
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
        <?php
    } elseif( $_SESSION['category'] == "home" ) {
        ?>
        <div class="postcontainer">
        
        </div>
        <?php
    } else {
        echo "lol";
    }
    ?>
    </div>

<?php get_footer(); ?>