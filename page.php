<?php get_header(); if(have_posts()) : while(have_posts())  : the_post();
    $enable_page_title = get_post_meta(get_the_ID(), 'enable_page_title', true);
    $default_padding = get_post_meta(get_the_ID(), 'default_padding', true);
?> 



    <section style="overflow:hidden;" class="<?php if($default_padding == true) : ?>content-block elementor-section elementor-section-boxed<?php endif; ?>">
        <div class="elementor-container">
            <div class="internal-content-wrap">
                <?php if($enable_page_title == true) : ?>
                    <h2 class="internal-page-title"><?php the_title(); ?></h2>
                <?php endif; ?>

                <?php the_content(); ?>
            </div>
        </div>
    </section>

<?php endwhile; endif; get_footer(); ?>