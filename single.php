<?php get_header(); ?>

    <div id=main>
        <div class="postcontainer">
                <div class="post" id="<?php the_ID() ?>">
                    <div class="buttons">
                        <a style="cursor: default;" href="/shop"><img style="top: 41px !important;" class="button1" src="<?php echo get_template_directory_uri(). '/assets/button1.png'?>" alt=""></a>
                        <a  class="button2" href="<?php the_permalink() ?>"><img style="top: 41px !important; margin-left: 3px;" src="<?php echo get_template_directory_uri(). '/assets/button2.png'?>" alt=""></a>
                    </div>
                    <p style="top: 24px !important;"><span><?php the_title(); ?>.jpeg</span></p>
                    <div class="shopimg">
                        <?php 
                        $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
                        echo $matches[0][0];
                        ?>
                    </div>
                </div>
        </div>
    </div>

<?php get_footer(); ?>