<?php get_header(); ?>

<section class="tp-page-area p-relative pt-130 pb-120">
    <div class="container">

        <div class="tp-page-wrapper">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php get_template_part('/template-parts/content-page')?>
            <?php endwhile;else: ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

        </div>
    </div>
</section>






<?php get_footer(); ?>