<?php
    function solub_breadcrumb(){
    
     global $post;

   if ( is_front_page() && is_home() ) {
      $title = __('Blog','solub');
   }
   elseif ( is_front_page() ) {
         $title =  __('Blog','solub');
   }
   elseif ( is_home() ) {
      if ( get_option( 'page_for_posts' ) ) {
         $title = get_the_title( get_option( 'page_for_posts') );
      }
   }

   elseif ( is_single() && 'post' == get_post_type() ) {
      $title = get_the_title();
   } 
   elseif ( is_single() && 'service' == get_post_type() ) {
      $title = get_the_title();
   } 
   elseif ( is_single() && 'product' == get_post_type() ) {
         $title = get_theme_mod( 'breadcrumb_product_details', __( 'Shop', 'solub' ) );
   } 
   elseif ( is_search() ) {
         $title = esc_html__( 'Search Results for : ', 'solub' ) . get_search_query();
   } 
   elseif ( is_404() ) {
         $title = esc_html__( '404 Page not Found', 'solub' );
   } 
   elseif ( is_archive() ) {
         $title = get_the_archive_title();
   } 
   else {
         $title = get_the_title();
   }
    
    
    
    
    ?>



<!-- beadcrumb area start -->
<div class="tp-breadcrumb__ptb tp-breadcrumb__bg p-relative z-index-1 fix"
    data-background="<?php echo get_template_directory_uri() . '/assets/img/breadcrumb/breadcrumb-10.jpg' ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="tp-breadcrumb__content p-relative">
                    <h3 class="tp-breadcrumb__title white"><?php echo solub_kses($title)?></h3>
                    <div class="tp-breadcrumb__list white">

                        <?php bcn_display();?>
                        <!-- <span><a href="index.html">Home</a></span>
                        <span class="dvdr"></span>
                        <span>Blog sidebar</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- beadcrumb area end -->
<?php
    }

?>