<?php

new \Kirki\Panel(
    'solub_options',
    [
        'priority'    => 10,
        'title'       => esc_html__('Solub Options', 'solub'),
        'description' => esc_html__('My Solub Options Description.', 'solub'),
    ]
);
// Top Bar
new \Kirki\Section(
    'solub_topbar',
    [
        'title'       => esc_html__('TopBar', 'solub'),
        'description' => esc_html__('My TopBar Description.', 'solub'),
        'panel'       => 'solub_options',
        'priority'    => 160,
    ]
);

// Top Bar Switcher

new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'topbar_switch',
        'label'       => esc_html__('Top Switch', 'solub'),
        'description' => esc_html__('Enable Or Disable Top Bar', 'solub'),
        'section'     => 'solub_topbar',
        'default'     => 'off',
        'choices'     => [
            'on'  => esc_html__('Enable', 'solub'),
            'off' => esc_html__('Disable', 'solub'),
        ],
    ]
);

// Opening Hours
new \Kirki\Field\Text(
    [
        'settings' => 'solub_opening_hours',
        'label'    => esc_html__('Opening Hours', 'solub'),
        'section'  => 'solub_topbar',
        'default'  => esc_html__('E.G. Monday - Friday : 8:30 AM to 6:30 PM', 'solub'),
        'priority' => 10,
    ]
);

// Social  Link  for topbar and canvas and footer
new \Kirki\Field\Repeater(
    [
        'settings'     => 'social_info',
        'label'        => esc_html__('Social Info For Top Bar And Footer', 'solub'),
        'section'      => 'solub_topbar',
        'priority'     => 10,
        'row_label'    => [
            'type'  => 'field',
            'value' => esc_html__('Your Social Info', 'solub'),
            'field' => 'link_text',
        ],
        'button_label' => esc_html__('Add New Info', 'solub'),
        'default'      => [
            [
                'link_text' => esc_html__('Kirki Site', 'solub'),
                'link_url'  => 'https://facebook.com/',
            ],

        ],
        'fields'       => [
            'social_icon' => [
                'type'     => 'select',
                'settings' => 'my_icon_select',
                'label'    => __('Choose an Icon', 'solub'),
                'default'  => 'fas fa-star',
                'choices'  => [
                    'fa-brands fa-facebook'  => 'Facebook',
                    'fa-brands fa-instagram' => 'Instagram',
                    'fa-brands fa-pinterest' => 'Pinterest',
                    'fas fa-check'           => 'Check',
                    'fas fa-coffee'          => 'Coffee',
                ],
            ],
            'link_url'    => [
                'type'        => 'text',
                'label'       => esc_html__('Social URL', 'solub'),
                'description' => esc_html__('Add Your Social Info Url', 'solub'),
                'default'     => '',
            ],

        ],
    ]
);
// Main Header

new \Kirki\Section(
    'solub_header',
    [
        'title'       => esc_html__('Header', 'solub'),
        'description' => esc_html__('My Header Description.', 'solub'),
        'panel'       => 'solub_options',
        'priority'    => 160,
    ]
);

//Right Header Switcher
new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'solub_right_header_switch',
        'label'       => esc_html__('Header Right Switch', 'solub'),
        'description' => esc_html__('Enable Or Disable Header Right', 'solub'),
        'section'     => 'solub_header',
        'default'     => 'off',
        'choices'     => [
            'on'  => esc_html__('Enable', 'solub'),
            'off' => esc_html__('Disable', 'solub'),
        ],
    ]
);

new \Kirki\Field\Upload(
    [
        'settings'    => 'logo_upload',
        'label'       => esc_html__('Upload Logo', 'solub'),
        'description' => esc_html__('The saved value will the URL.', 'solub'),
        'section'     => 'solub_header',
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'phone_number',
        'label'    => esc_html__('Button Phone Number', 'solub'),
        'section'  => 'solub_header',
        'default'  => esc_html__('+8801601515354', 'solub'),
        'priority' => 10,
    ]
);

// offcanvas options
// Top Bar
new \Kirki\Section(
    'solub_offcanvas',
    [
        'title'       => esc_html__('Off Canvas', 'solub'),
        'description' => esc_html__('My Off Canvas Description.', 'solub'),
        'panel'       => 'solub_options',
        'priority'    => 160,
    ]
);

new \Kirki\Field\Upload(
    [
        'settings'    => 'offcanvas_logo_upload',
        'label'       => esc_html__('Upload White Logo', 'solub'),
        'description' => esc_html__('The saved value will the URL.', 'solub'),
        'section'     => 'solub_offcanvas',
    ]
);
// Off Canvas Info
new \Kirki\Field\Repeater(
    [
        'settings' => 'solub_info',
        'label'    => esc_html__('Solub Info', 'solub'),
        'section'  => 'solub_offcanvas',
        'priority' => 10,
        'default'  => [
            [
                'icon_class'  => esc_html__('fa-sharp fa-solid fa-location-dot', 'solub'),
                'canvas_info' => esc_html__('86 Road Broklyn Street, 600', 'solub'),
                'info_url'    => 'https://www.google.com/maps/search/86+Road+Broklyn+Street,+600+New+York,+USA/@40.6897806,-74.0278086,12z/data=!3m1!4b1',

            ],
            [
                'icon_class'  => esc_html__('fa-solid fa-envelope', 'solub'),
                'canvas_info' => esc_html__('Needhelp@company.com', 'solub'),
                'info_url'    => 'mailto:needhelp@company.com',

            ],

            [
                'icon_class'  => esc_html__('fa-solid fa-phone', 'solub'),
                'canvas_info' => esc_html__('+92 666 888 0000', 'solub'),
                'info_url'    => 'tel:01310-069824',

            ],
        ],
        'fields'   => [
            'icon_class'  => [
                'type'        => 'text',
                'label'       => esc_html__('Icon Class', 'solub'),
                'description' => esc_html__('Only Font Awesome Icon Class Allowed', 'solub'),
                'default'     => '',
            ],

            'canvas_info' => [
                'type'        => 'text',
                'label'       => esc_html__('Add Your Info', 'solub'),
                'description' => esc_html__('Only Font Awesome Icon Class Allowed', 'solub'),
                'default'     => '',
            ],

            'info_url'    => [
                'type'        => 'text',
                'label'       => esc_html__('Link URL', 'solub'),
                'description' => esc_html__('Description', 'solub'),
                'default'     => '',
            ],
        ],
    ],
);

// Off Canvas Social

new \Kirki\Field\URL(
    [
        'settings' => 'fa_social_offcanvas',
        'label'    => esc_html__('Facebook URL', 'solub'),
        'section'  => 'solub_offcanvas',
        'default'  => 'https://facebook.com/',
        'priority' => 10,
    ]
);
new \Kirki\Field\URL(
    [
        'settings' => 'tw_social_offcanvas',
        'label'    => esc_html__('Twitter URL', 'solub'),
        'section'  => 'solub_offcanvas',
        'default'  => 'https://facebook.com/',
        'priority' => 10,
    ]
);
new \Kirki\Field\URL(
    [
        'settings' => 'yt_social_offcanvas',
        'label'    => esc_html__('Youtube URL', 'solub'),
        'section'  => 'solub_offcanvas',
        'default'  => 'https://youtube.com/',
        'priority' => 10,
    ]
);

new \Kirki\Field\URL(
    [
        'settings' => 'ld_social_offcanvas',
        'label'    => esc_html__('Linkedin URL', 'solub'),
        'section'  => 'solub_offcanvas',
        'default'  => 'https://linkedin.com/',
        'priority' => 10,
    ]
);

// Footer

new \Kirki\Section(
    'solub_footer',
    [
        'title'       => esc_html__('Footer', 'solub'),
        'description' => esc_html__('Footer Info', 'solub'),
        'panel'       => 'solub_options',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Text(
    [
        'settings' => 'copyright_footer',
        'label'    => esc_html__('CopyRight Text', 'solub'),
        'section'  => 'solub_footer',
        'default'  => esc_html__('Copyright © 2024 All Rights Reserved. ', 'solub'),
        'priority' => 10,
    ]
);
