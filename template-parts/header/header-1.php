<?php
    $opening_hours             = get_theme_mod('solub_opening_hours');
    $settings                  = get_theme_mod('social_info');
    $button_phone              = get_theme_mod('phone_number');
    $topbar_switch             = get_theme_mod('topbar_switch', 'off');
    $solub_header_right_switch = get_theme_mod('solub_right_header_switch', 'off');

    $solub_right_header_empty = ($solub_header_right_switch == 'on') ? 'justify-content-between' : 'justify-content-end';
    get_template_part('/template-parts/header/offcanvas');

    // logo function
    function headerLogo()
    {
        $header_logo = get_theme_mod('logo_upload', '');

    ?>
<a href="<?php echo home_url() ?>">
    <img data-width="130" src="<?php

                                       printf(esc_html__('%s', 'solub'), $header_logo);

                                   ?>" alt="<?php echo bloginfo() ?>">
</a>

<?php
    }
?>

<!-- header area start -->
<header class="tp-header-4-ptb">



    <?php if ($topbar_switch == 'on'): ?>

    <div class="tp-header-3-top d-none d-md-block">
        <div class="container container-1320">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <?php if (! empty($opening_hours)): ?>

                    <div class="tp-header-2-date">
                        <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 3.8V8L10.8 9.4M15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>                                   <?php echo esc_html($opening_hours) ?></span>
                    </div>
                    <?php endif?>

                </div>

                <div class="col-md-6">
                    <div class="tp-header-2-right">
                        <div class="tp-header-2-social border-0">
                            <?php echo social_header($settings); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif?>

    <div class="tp-header-main-sticky tp-header-4-main p-relative">
        <div class="container container-1320">
            <div class="d-flex justify-content-between align-items-center">
                <div class="tp-header-logo">

                    <?php headerLogo()?>

                </div>
                <div class="tp-header-box d-flex align-items-center
                    <?php echo esc_attr($solub_right_header_empty) ?>">
                    <div class="tp-header-2-menu">
                        <div class="tp-main-menu d-none d-xl-block">
                            <nav class="tp-mobile-menu-active">
                                <?php solub_main_menu(); ?>
                            </nav>
                        </div>
                    </div>
                    <div class="tp-header-main-right d-flex align-items-center">
                        <?php if ($solub_header_right_switch): ?>
                        <div class="tp-header-2-right-search d-none d-lg-flex align-items-center">
                            <div id="tp-header-search" class="p-relative">
                                <form action="#">
                                    <div class="tp-header-search-input">
                                        <input type="text" placeholder="Search...">
                                    </div>
                                    <div class="tp-header-search-icon">
                                        <span>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.88888 18.7778C14.7981 18.7778 18.7778 14.7981 18.7778 9.88888C18.7778 4.97969 14.7981 1 9.88888 1C4.97969 1 1 4.97969 1 9.88888C1 14.7981 4.97969 18.7778 9.88888 18.7778Z"
                                                    stroke="currentcolor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M21 21L16.1666 16.1666" stroke="currentcolor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php if ($button_phone): ?>

                        <div class="tp-header-2-main-right-btn d-none d-lg-block">
                            <a href="tel:<?php echo esc_html($button_phone) ?>" class="tp-btn orange">
                                <span><svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.111 1C12.111 1 14.5554 1.22222 17.6665 4.33332C20.7776 7.44442 20.9998 9.88886 20.9998 9.88886M12.3411 4.92811C12.3411 4.92811 13.4411 5.24238 15.091 6.89229C16.7409 8.5422 17.0552 9.64214 17.0552 9.64214M7.7941 9.69955C7.79398 9.69967 6.55095 10.9429 8.80499 13.197C11.0584 15.4503 12.3016 14.2087 12.3024 14.2079M7.7941 9.69955C8.81906 8.67458 9.08031 7.14487 8.42954 5.97878L7.70841 4.68665C6.72573 2.92584 4.25638 2.71789 2.70867 4.2656C1.77867 5.1956 1.05502 6.33489 1.00728 7.59432C0.926905 9.71447 1.46347 13.315 5.07521 16.9267C8.68695 20.5385 12.2875 21.0751 14.4076 20.9947C15.6671 20.9469 16.8064 20.2233 17.7364 19.2933C19.2841 17.7456 19.0761 15.2762 17.3153 14.2935L16.0232 13.5724C14.8571 12.9217 13.3274 13.1829 12.3024 14.2079M7.7941 9.69955C7.7941 9.69955 7.79409 9.69956 7.7941 9.69955ZM12.3024 14.2079C12.3024 14.2078 12.3024 14.2079 12.3024 14.2079Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg></span><?php echo esc_html($button_phone) ?>
                            </a>
                        </div>
                        <?php endif?>
<?php endif?>

                        <div class="tp-header-2-hamburger d-xl-none offcanvas-open-btn">
                            <button class="hamburger-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- header area end -->