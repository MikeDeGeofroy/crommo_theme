    <div class="instagramcontainer">
        <p class="follow">FOLLOW US <a style="color: blue;" target="_blank" href="https://www.instagram.com/crommo__">@crommo__</a></p>
        <div class="instagram_posts_container">
        <?php
        $data = file_get_contents('https://www.instagram.com/crommo__/?__a=1');
        $data = json_decode($data);
        // var_dump($data);
        $number_of_posts = $data->graphql->user->edge_owner_to_timeline_media->count;

        $posts = $data->graphql->user->edge_owner_to_timeline_media->edges;

        foreach($data->graphql->user->edge_owner_to_timeline_media->edges as $value){

            $image_url = $value->node->display_url;

            $post_url = $value->node->shortcode;

            $post_url = "https://www.instagram.com/p/{$post_url}/"
            // var_dump($value);
            ?>
            <div class="instagram_single_posts_container">
                <a target="_blank" href="<?php echo $post_url; ?>"><img src="<?php echo $image_url; ?>" alt=""></a>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
    <div class="footer">
        <img src="<?php echo get_template_directory_uri()?>/assets/logo.png" alt="">
        <div class="info">
            <a target="_blank" href="https://www.google.com/maps/place/ISHVARA+FORMENTERA/@38.7053523,1.4285514,15z/data=!4m2!3m1!1s0x0:0x99c3188030e7dff1?sa=X&ved=2ahUKEwi3rKnE5JrsAhXnkIsKHTxSDJYQ_BIwCnoECBIQBQ">Av. Porto Saler, 4 San Francesc Javier Formentera</a>
            <br>
            <a href="mailto:contact@crommo.es">contact@crommo.es</a>
            <br>
            <a href="tel:+34 635 03 58 71">+34 635 03 58 71</a>
            <br>
        </div>
    </div>
</body>