<?php get_header(); ?>
<!-- I am very tiered -->
    <div id=main>
        <div class="postcontainer">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="post">
                <?php the_content() ?>
            </div>
            <?php endwhile;?>
            <?php else : ?>
            <?php endif; ?>
        </div>
        <div class="instagramcontainer">
            <p class="follow">FOLLOW US <a href="https://www.instagram.com/crommo__">@crommo__</a></p>
        </div>
    </div>

<?php get_footer(); ?>

