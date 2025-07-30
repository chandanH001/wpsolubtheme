 <?php

    // Get the post author ID
    $author_id = get_the_author_meta('ID');

    // Get the author's avatar
    $author_avatar =  80;

    // Get the author's name
    $author_name = get_the_author_meta('display_name');

    // Get the author's bio/description
    $author_bio = get_the_author_meta('description');

    $facebook_url = get_the_author_meta('facebook_url');
    $linkedin_url = get_the_author_meta('linkedin_url');
    $viemo_url = get_the_author_meta('vimeo_url');

?>


 <div class="postbox-details-author-box mb-55 d-flex align-items-start">
     <div class="postbox-details-author-avatar">
         <?php echo get_avatar( get_the_author_meta( 'user_email' ), $author_avatar, '', '', [ 'class' => 'media-object img-circle' ] );?>
     </div>
     <div class="postbox-details-author-content">
         <h5 class="postbox-details-author-title"><?php echo esc_attr($author_name);?></h5>
         <p><?php echo esc_html($author_bio);?></p>
         <div class="postbox-details-author-social">
             <a href="<?php echo esc_url( $facebook_url)?>"><i class="fab fa-facebook-f"></i></a>
             <a href="<?php echo esc_url($linkedin_url )?>"><i class="fab fa-linkedin-in"></i></a>
             <a href="<?php echo esc_url( $viemo_url)?>"><i class="fab fa-vimeo-v"></i></a>
         </div>
     </div>
 </div>