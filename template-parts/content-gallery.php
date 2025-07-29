<?php
    // $post_id = get_the_ID();
    $gallery = function_exists('acf_photo_gallery') ? acf_photo_gallery('photo_gallery', get_the_ID()) : [];
    // echo var_dump($gallery);
?>

<?php if (is_single()): ?>

<div class="tp-postbox-thumb p-relative fix">
    <div class="tp-blog-post-active swiper">
        <div class="swiper-wrapper">

            <?php

                if (! empty($gallery)) {
                    foreach ($gallery as $image) {
                        $image_url = esc_url($image['full_image_url']);
                        $image_alt = esc_attr($image['title']); // or use $image['alt']
                    ?>
            <div class="swiper-slide">
                <a href="<?php echo $image_url; ?>" target="_blank">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                </a>
            </div>
            <?php
                }
                }
            ?>

        </div>
    </div>
    <div class="tp-postbox-nav">
        <button type="button" class="tp-blog-prev-1">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <button type="button" class="tp-blog-next-1"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 7H13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg></button>
    </div>
</div>
<?php get_template_part('template-parts/blog/meta'); ?>

<div class="postbox-details-content mb-25">
    <h4 class="postbox-details-title"><?php the_title(); ?></h4>
    <?php the_content(); ?>
</div>
<div class="postbox-details tagcloud mb-50">
    <span><?php echo esc_html('Tags:') ?></span>
    <?php solub_tags(); ?>
</div>

</div>
<?php else: ?>


<article id="post-<?php the_ID(); ?>"<?php post_class('tp-postbox-item mb-75'); ?>>
    <div class="tp-postbox-thumb p-relative fix">
        <div class="tp-blog-post-active swiper">
            <div class="swiper-wrapper">

                <?php

                    if (! empty($gallery)) {
                        foreach ($gallery as $image) {
                            $image_url = esc_url($image['full_image_url']);
                            $image_alt = esc_attr($image['title']); // or use $image['alt']
                        ?>
                <div class="swiper-slide">
                    <a href="<?php echo $image_url; ?>" target="_blank">
                        <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                    </a>
                </div>
                <?php
                    }
                    }
                ?>

            </div>
        </div>
        <div class="tp-postbox-nav">
            <button type="button" class="tp-blog-prev-1">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <button type="button" class="tp-blog-next-1"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 7H13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg></button>
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

<?php endif; ?>