<?php get_header(); ?>

    <div id=main>
        <div class="homepageslider">
            <div class="slidepost">
                <!-- <h1>
                <b>MEDICAL TREATMENT</b><br><b>DO NOT WALK OUTISDE THIS AREA</b>
            </h1> -->
                <img src="/assets/_MG_9993.jpg" alt="">
                <img src="/assets/_MG_9992.jpg" alt="">
                <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, sapiente?</h1>

                <!-- <div class="shopimg">
                <img id="button1" src="/assets/button1.png" alt="">
                <img id="button2" src="/assets/button2.png" alt="">
                <div class="imgcontainer">
                    <img src="/assets/MEDICAL.jpg" alt="">
                </div>
            </div> -->
            </div>
        </div>
        <div class="postcontainer">
            <div class="post">
                <img src="/assets/_MG_9995 copia-Recuperado copia.jpg" alt="">
                <h2>Titulo</h2>
                <p>Subtitulo</p>
            </div>
            <div class="post">
                <img src="/assets/_MG_9995 copia-Recuperado copia.jpg" alt="">
                <h2>Titulo</h2>
                <p>Subtitulo</p>
            </div>
        </div>
        <div class="instagramcontainer">
            <p class="follow">FOLLOW US <a href="https://www.instagram.com/crommo__">@crommo__</a></p>
        </div>
    </div>

<?php get_footer(); ?>

<?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="post">
                <?php the_content() ?>
            </div>
            <?php endwhile;?>
            <?php else : ?>
            <?php endif; ?>


            <?php

$args = array(
    'category_name' => ‘shop’,
);

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {

    while ( $the_query->have_posts() ) {
        $the_query->the_post();?>
            <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                <h5><?php the_time('F j, Y'); ?></h5>
                <div>
                <?php if( has_excerpt() ): the_excerpt(); else: the_content(); endif; ?>
                </div>
            <?php  }?>
        <div id="pagenav" class="navigation clearfix">
            <div class="nav-prev alignleft"><?php next_posts_link( '<i class="fa fa-angle-double-left" aria-hidden="true"></i> Older Entries', $the_query->max_num_pages ); ?></div>
            <div class="nav-prev alignright"><?php previous_posts_link( 'Newer Entries <i class="fa fa-angle-double-right" aria-hidden="true"></i>' ); ?></div>
        </div><!-- #pagenav -->
        <?php echo '</div>';

    } else {
        // no posts found
        echo '<h1>No Posts Found</h1>';
    }

// Restore original Post Data
wp_reset_postdata();
?>