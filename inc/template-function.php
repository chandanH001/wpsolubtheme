<?php
    /**
     * Generate custom search form
     *
     * @param string $form Form HTML.
     * @return string Modified form HTML.
     */
    function solub_blog_search_form($form)
    {
        $form = '<div class="tp-sidebar-widget-content">
                              <div class="tp-sidebar-search">
                                 <form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '">
                                    <div class="tp-sidebar-search-input p-relative">
                                       <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Enter your keywords...">
                                       <button class="tp-sidebar-search-btn" id="searchsubmit" value="' . esc_attr__('Search') . '"  type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                          <path d="M9.55005 18.1001C14.2721 18.1001 18.1001 14.2721 18.1001 9.55005C18.1001 4.82799 14.2721 1 9.55005 1C4.82799 1 1 4.82799 1 9.55005C1 14.2721 4.82799 18.1001 9.55005 18.1001Z" stroke="#1F2220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M18.9992 19L17.1992 17.2" stroke="#1F2220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg></button>
                                    </div>
                                 </form>
                              </div>
                           </div>

	</form>';

        return $form;
    }
    add_filter('get_search_form', 'solub_blog_search_form');

    // Top bar social info
    if (! function_exists('social_header')) {
        function social_header($settings)
        {
            if (! is_array($settings)) {
                return;
            }

            foreach ($settings as $setting) {
                echo '<a href="' . esc_url($setting['link_url']) . '">';
                echo '<i class="' . esc_attr($setting['social_icon']) . '"></i>';
                echo '</a>';
            }
        }
    }

    // Nav menu function
    if (! function_exists('solub_main_menu')) {
        function solub_main_menu()
        {
            if (has_nav_menu('primary')) {
                wp_nav_menu([
                    'theme_location'  => 'primary',
                    'container'       => 'nav',
                    'container_class' => 'main-navigation',
                    'menu_class'      => 'menu',
                    'fallback_cb'     => 'Solub_Walker_Nav_Menu',
                    'walker'          => new Solub_Walker_Nav_Menu,

                ]);
            }
        }
    }
    // canvas Info
    function render_solub_offcanvas_info()
    {
        $infos = get_theme_mod('solub_info');

        if (! empty($infos) && is_array($infos)) {
            foreach ($infos as $info) {
                $icon_class  = ! empty($info['icon_class']) ? esc_attr($info['icon_class']) : '';
                $canvas_info = ! empty($info['canvas_info']) ? esc_html($info['canvas_info']) : '';
                $info_url    = ! empty($info['info_url']) ? esc_url($info['info_url']) : '';

                // Skip any incomplete data
                if ($icon_class && $canvas_info && $info_url) {
                    echo '<div class="offcanvas__contact-content d-flex">';

                    echo '<div class="offcanvas__contact-content-icon">';
                    echo '<i class="' . $icon_class . '"></i>';
                    echo '</div>';

                    echo '<div class="offcanvas__contact-content-content">';
                    echo '<a href="' . $info_url . '">' . $canvas_info . '</a>';
                    echo '</div>';

                    echo '</div>';
                }
            }
        }
    }

    //canvas Social
    function render_offcanvas_social_icons()
    {
        $fb_url = get_theme_mod('fa_social_offcanvas', 'facebook.com');
        $tw_url = get_theme_mod('tw_social_offcanvas', 'x.com');
        $yt_url = get_theme_mod('yt_social_offcanvas', 'youtube.com');
        $ld_url = get_theme_mod('ld_social_offcanvas', 'linkedin.com');

        if (! empty($fb_url) || ! empty($tw_url) || ! empty($yt_url) || ! empty($ld_url)) {
            echo '<div class="offcanvas__social">';

            if (! empty($fb_url)) {
                echo '<a class="icon facebook" href="' . esc_url($fb_url) . '" target="_blank"><i class="fab fa-facebook-f"></i></a>';
            }

            if (! empty($tw_url)) {
                echo '<a class="icon twitter" href="' . esc_url($tw_url) . '" target="_blank"><i class="fab fa-twitter"></i></a>';
            }

            if (! empty($yt_url)) {
                echo '<a class="icon youtube" href="' . esc_url($yt_url) . '" target="_blank"><i class="fab fa-youtube"></i></a>';
            }

            if (! empty($ld_url)) {
                echo '<a class="icon linkedin" href="' . esc_url($ld_url) . '" target="_blank"><i class="fab fa-linkedin"></i></a>';
            }

            echo '</div>';
        }
    }

    // pagination Function
    function solub_pagination()
    {
        $pages = paginate_links([

            'type'      => 'array',
            'prev_text' => __('<i class="fal fa-long-arrow-left"></i>', 'solub'),
            'next_text' => __('<i class="fal fa-long-arrow-right"></i>', 'solub'),

        ]);
        if ($pages) {
            echo '<nav><ul>';
            foreach ($pages as $page) {
                echo "<li>$page</li>";
            }

            echo '</ul></nav>';

        }

    }

    // exdos_tags
    function solub_tags()
    {
        $post_tags = get_the_tags();
        if ($post_tags) {
            foreach ($post_tags as $tag) {
            ?>
<a href="<?php echo get_tag_link($tag); ?>"><?php echo esc_html($tag->name); ?></a>
<?php
    }
        } else {
        ?>
<i><?php echo esc_html__('No tags found', 'solub'); ?></i>
<?php
    }
    }

    /**
     * Sanitize SVG markup for front-end display.
     *
     * @param  string $svg SVG markup to sanitize.
     * @return string       Sanitized markup.
     */
    function solub_kses($custom_html_tags = '')
    {
        $allowed_html = [
            'svg'        => [
                'class'           => true,
                'aria-hidden'     => true,
                'aria-labelledby' => true,
                'role'            => true,
                'xmlns'           => true,
                'width'           => true,
                'height'          => true,
                'viewbox'         => true, // <= Must be lower case!
            ],
            'path'       => [
                'd'               => true,
                'fill'            => true,
                'stroke'          => true,
                'stroke-width'    => true,
                'stroke-linecap'  => true,
                'stroke-linejoin' => true,
                'opacity'         => true,
            ],
            'a'          => [
                'class'  => [],
                'href'   => [],
                'title'  => [],
                'target' => [],
                'rel'    => [],
            ],
            'b'          => [],
            'blockquote' => [
                'cite' => [],
            ],
            'cite'       => [
                'title' => [],
            ],
            'code'       => [],
            'del'        => [
                'datetime' => [],
                'title'    => [],
            ],
            'dd'         => [],
            'div'        => [
                'class' => [],
                'title' => [],
                'style' => [],
            ],
            'dl'         => [],
            'dt'         => [],
            'em'         => [],
            'h1'         => [],
            'h2'         => [],
            'h3'         => [],
            'h4'         => [],
            'h5'         => [],
            'h6'         => [],
            'i'          => [
                'class' => [],
            ],
            'img'        => [
                'alt'    => [],
                'class'  => [],
                'height' => [],
                'src'    => [],
                'width'  => [],
            ],
            'li'         => [
                'class' => [],
            ],
            'ol'         => [
                'class' => [],
            ],
            'p'          => [
                'class' => [],
            ],
            'q'          => [
                'cite'  => [],
                'title' => [],
            ],
            'q'          => [
                'cite'  => [],
                'title' => [],
            ],
            'span'       => [
                'class' => [],
                'title' => [],
                'style' => [],
                'id'    => [],
            ],
            'iframe'     => [
                'width'       => [],
                'height'      => [],
                'scrolling'   => [],
                'frameborder' => [],
                'allow'       => [],
                'src'         => [],
            ],
            'strike'     => [],
            'br'         => [],
            'strong'     => [],
        ];

    return wp_kses($custom_html_tags, $allowed_html);
}