<?php
class Solub_Contact_Info_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'solub_contact_info_widget',
            __('Solub: Contact Info', 'solub'),
            ['description' => __('Displays phone, email, and address with icons and links.', 'solub')]
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo '<div class="solub-contact-info-widget">';

        foreach (['phone', 'email', 'address'] as $key) {

            $value = ! empty($instance["{$key}_value"]) ? esc_html($instance["{$key}_value"]) : '';
            $link  = ! empty($instance["{$key}_link"]) ? esc_url($instance["{$key}_link"]) : '';
            $icon  = ! empty($instance["{$key}_icon"]) ? esc_attr($instance["{$key}_icon"]) : '';

            if ($value && $link) {
                echo '<div class="contact-item">';
                if ($icon) {
                    echo '<i class="' . $icon . '"></i> ';
                }
                echo '<a href="' . $link . '">' . $value . '</a>';
                echo '</div>';
            }
        }

        echo '</div>';
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $fields = [
            'phone'   => 'Phone',
            'email'   => 'Email',
            'address' => 'Address',
        ];

        foreach ($fields as $key => $label) {
            $value_field = ! empty($instance["{$key}_value"]) ? $instance["{$key}_value"] : '';
            $link_field  = ! empty($instance["{$key}_link"]) ? $instance["{$key}_link"] : '';
            $icon_field  = ! empty($instance["{$key}_icon"]) ? $instance["{$key}_icon"] : '';

            echo '<p><label>Value:<br>';
            echo '<input class="widefat" name="' . $this->get_field_name("{$key}_value") . '" type="text" value="' . esc_attr($value_field) . '"></label></p>';

            echo '<p><label>Link:<br>';
            echo '<input class="widefat" name="' . $this->get_field_name("{$key}_link") . '" type="text" value="' . esc_attr($link_field) . '"></label></p>';

            echo '<p><label>Icon Class (Font Awesome):<br>';
            echo '<input class="widefat" name="' . $this->get_field_name("{$key}_icon") . '" type="text" value="' . esc_attr($icon_field) . '" placeholder="fa-solid fa-phone"></label></p>';
        }
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        foreach (['phone', 'email', 'address'] as $key) {
            $instance["{$key}_value"] = sanitize_text_field($new_instance["{$key}_value"]);
            $instance["{$key}_link"]  = esc_url_raw($new_instance["{$key}_link"]);
            $instance["{$key}_icon"]  = sanitize_text_field($new_instance["{$key}_icon"]);
        }
        return $instance;
    }
}

function solub_register_contact_widget()
{
    register_widget('Solub_Contact_Info_Widget');
}
add_action('widgets_init', 'solub_register_contact_widget');
