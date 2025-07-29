<?php $settings = get_theme_mod('social_info');
    $copyright      = get_theme_mod('copyright_footer', 'default');

?>

<!-- footer area start -->
<footer class="tp-footer-ptb p-relative pt-90" data-bg-color="#1F2220">
    <div class="container">
        <div class="tp-footer-widget-border">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">

                    <?php dynamic_sidebar('solub-footer1-widgets'); ?>

                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                    <?php dynamic_sidebar('solub-footer2-widgets'); ?>

                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <?php dynamic_sidebar('solub-footer3-widgets'); ?>


                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <?php dynamic_sidebar('solub-footer4-widgets'); ?>


                </div>
            </div>
        </div>
        <div class="tp-footer-copyright-ptb pt-20 pb-20">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="tp-footer-copyright">

                        <?php echo solub_kses($copyright) ?>
                        <!-- <p>Copyright © 2024 <span>Solub.</span> All Rights Reserved.</p> -->
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="tp-footer-widget-social text-lg-end">
                        <?php echo social_header($settings); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->