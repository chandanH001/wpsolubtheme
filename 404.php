<?php get_header();?>
<!-- error area start -->
<section class="tp-error-ptb pt-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="tp-error-content pt-100">
                    <h3 class="tp-error-title">404</h3>
                    <h4 class="tp-error-subtitle"><?php echo esc_html__('Oops! Page not found','solub')?></h4>
                    <p><?php echo solub_kses("Whoops, this is embarassing. Looks like the page you <br>
                        were looking for wasn't found.")?></p>
                    <a class="tp-btn btn-text-flip" href="<?php echo home_url();?>">
                        <span data-text="Back to Home">Back to Home</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tp-error-thumb text-center">
                    <img src="<?php echo get_template_directory_uri()?>/assets/img/others/error.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- error area end -->
<?php get_footer();?>