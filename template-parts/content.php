<?php if (is_single()): ?>

<div class="postbox-details-wrapper">
    <div class="postbox-details-thumb mb-30">
        <?php the_post_thumbnail()?>
        <div class="tp-postbox-meta mt-30">
            <?php get_template_part('template-parts/blog/meta'); ?>
        </div>
    </div>
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

    <div class="tp-postbox-thumb p-relative">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
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