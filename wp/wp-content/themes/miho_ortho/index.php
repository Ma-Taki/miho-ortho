<?php get_header(); ?>
<div id="content">
    <div id="inner">
        <?php if(have_posts()): while(have_posts()):the_post(); ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span><?php the_time('Y.m.d'); ?></span>
            <div><?php the_content('Read more'); ?></div>
            <?php //the_category(', '); ?>
        <?php endwhile; endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
