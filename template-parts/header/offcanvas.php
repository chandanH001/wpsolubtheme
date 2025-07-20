<?php
    $solub_canvas_logo = get_theme_mod('offcanvas_logo_upload');
?>

<!-- offcanvas area start -->
<div class="offcanvas__area">
    <div class="offcanvas__close">
        <button class="offcanvas__close-btn offcanvas-close-btn">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <div class="offcanvas__wrapper">
        <div class="offcanvas__content">
            <div class="offcanvas__top mb-40">
                <div class="offcanvas__logo">
                    <a href="index.html">
                        <img data-width="120" src="<?php echo esc_url($solub_canvas_logo) ?>" alt="logo">
                    </a>
                </div>
            </div>

            <div class="tp-offcanvas-menu fix d-xl-none mb-30">
                <nav class="tp-mobile-menu-active">
                    <?php solub_main_menu(); ?>
                </nav>
            </div>

            <div class="offcanvas__contact d-none d-xl-block">
                <div class="offcanvas__text mb-30">
                    <p>The design readable content of a page hen looking at its layout The point our of using Movie
                        template</p>
                </div>
                <div class="offcanvas__gallery mb-30">
                    <h4 class="offcanvas__title">Gallery</h4>

                </div>
            </div>
            <div class="offcanvas-info mb-30">
                <h4 class="offcanvas__title">Contacts</h4>
                <?php render_solub_offcanvas_info(); ?>
                <!-- <div class="offcanvas__contact-content d-flex">
                    <div class="offcanvas__contact-content-icon">
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                    </div>
                    <div class="offcanvas__contact-content-content">
                        <a
                            href="https://www.google.com/maps/search/86+Road+Broklyn+Street,+600+New+York,+USA/@40.6897806,-74.0278086,12z/data=!3m1!4b1">86
                            Road Broklyn Street, 600 </a>
                    </div>
                </div> -->
            </div>
            <?php echo render_offcanvas_social_icons(); ?>

            <!-- <div class="offcanvas__social">
                <a class="icon facebook" href="<?php echo esc_url($fb_url) ?>"><i class="fab fa-facebook-f"></i></a>
                <a class="icon twitter" href="<?php echo esc_url($tw_url) ?>"><i class="fab fa-twitter"></i></a>
                <a class="icon youtube" href="<?php echo esc_url($yt_url) ?>"><i class="fab fa-youtube"></i></a>
                <a class="icon linkedin" href="<?php echo esc_url($ld_url) ?>"><i class="fab fa-linkedin"></i></a>
            </div> -->
        </div>
    </div>
</div>
<div class="body-overlay"></div>
<!-- offcanvas area end -->