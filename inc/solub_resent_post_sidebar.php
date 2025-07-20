<?php
    class Solub_Recent_Posts_Widget extends WP_Widget
    {

        public function __construct()
        {
            parent::__construct(
                'solub_recent_posts_widget',
                __('Solub Recent Posts', 'solub'),
                ['description' => __('Displays recent posts in Solub style.', 'solub')]
            );
        }

        public function widget($args, $instance)
        {
            $title = apply_filters('widget_title', $instance['title']);
            $count = ! empty($instance['count']) ? absint($instance['count']) : 3;
            $order = ($instance['order'] === 'ASC') ? 'ASC' : 'DESC';

            echo $args['before_widget'];

            if (! empty($title)) {
                echo $args['before_title'] . esc_html($title) . $args['after_title'];
            }

            $recent_posts = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => $count,
                'post_status'    => 'publish',
                'order'          => $order,
                'orderby'        => 'date',
            ]);

            if ($recent_posts->have_posts()) {
                while ($recent_posts->have_posts()) {
                    $recent_posts->the_post();

                    $post_id   = get_the_ID();
                    $thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
                    $title     = get_the_title();
                    $permalink = get_permalink();
                    $date      = get_the_date('F j, Y');
                ?>
<div class="tp-recent-post-item d-flex align-items-center">
    <div class="tp-recent-post-thumb mr-20">
        <a href="<?php echo esc_url($permalink); ?>">
            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>">
        </a>
    </div>
    <div class="tp-recent-post-content">
        <h3 class="tp-recent-post-title">
            <a href="<?php echo esc_url($permalink); ?>">
                <?php echo esc_html($title); ?>
            </a>
        </h3>
        <div class="tp-recent-post-meta">
            <span><i class="fa-regular fa-clock"></i>                                                      <?php echo esc_html($date); ?></span>
        </div>
    </div>
</div>
<?php
    }
                wp_reset_postdata();
            }

            echo $args['after_widget'];
        }

        public function form($instance)
        {
            $title = isset($instance['title']) ? $instance['title'] : __('Recent Posts', 'solub');
            $count = isset($instance['count']) ? absint($instance['count']) : 3;
            $order = isset($instance['order']) ? $instance['order'] : 'DESC';
        ?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
        value="<?php echo esc_attr($title); ?>">
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php _e('Number of posts to show:'); ?></label>
    <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('count')); ?>"
        name="<?php echo esc_attr($this->get_field_name('count')); ?>" type="number" step="1" min="1"
        value="<?php echo esc_attr($count); ?>" size="3">
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php _e('Order:'); ?></label>
    <select id="<?php echo esc_attr($this->get_field_id('order')); ?>"
        name="<?php echo esc_attr($this->get_field_name('order')); ?>">
        <option value="DESC"                             <?php selected($order, 'DESC'); ?>>Descending (newest first)</option>
        <option value="ASC"                            <?php selected($order, 'ASC'); ?>>Ascending (oldest first)</option>
    </select>
</p>
<?php
    }

        public function update($new_instance, $old_instance)
        {
            $instance          = [];
            $instance['title'] = (! empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
            $instance['count'] = (! empty($new_instance['count'])) ? absint($new_instance['count']) : 3;
            $instance['order'] = ($new_instance['order'] === 'ASC') ? 'ASC' : 'DESC';
            return $instance;
        }
    }

    // Register the widget
    function register_solub_recent_posts_widget()
    {
        register_widget('Solub_Recent_Posts_Widget');
}
add_action('widgets_init', 'register_solub_recent_posts_widget');