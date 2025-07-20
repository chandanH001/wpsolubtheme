<?php
    $video_link = function_exists('get_field') ? get_field('video_url') : '';

?>

<article id="post-<?php the_ID(); ?>"<?php post_class('tp-postbox-item mb-75'); ?>>
    <div class="tp-postbox-thumb p-relative">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail()?>
        </a>
        <div class="tp-postbox-thumb-video">
            <a class="tp-video-btn popup-video text-center" href="<?php echo $video_link ?>">
                <span class="tp-text-theme-primary"><svg width="18" height="22" viewBox="0 0 18 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 11L0 21.3923V0.607696L18 11Z" fill="currentColor"></path>
                    </svg>
                </span>
            </a>
        </div>
    </div>
    <div class="tp-postbox-content">
        <?php get_template_part('template-parts/blog/meta'); ?>
        <h3 class="tp-postbox-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="tp-postbox-text">
            <?php the_excerpt(); ?>
        </div>
        <div class="tp-postbox-read-more">
            <a class="tp-btn btn-text-flip" href="<?php the_permalink(); ?>"><span
                    data-text="<?php echo esc_html__('Read More', 'solub') ?>">Read
                    More</span></a>
        </div>
    </div>
</article>