<?php get_header(); ?>
<div id="content">
    <div class="wrap">
        <article class="singlePost">
        <?php while ( have_posts() ) : the_post(); ?>
			<div class="archive w640">
				<h1 class="postTtl"><?php the_title(); ?></h1>
					<div class="postMeta">
						<p class="postDate"><?php the_time('Y年m月d日'); ?></p>
					</div>
					<div class="entry-content"><?php the_content(); ?></div>
			</div>
		<?php endwhile; ?>
	</article>
	
    </div>
</div>
<?php get_footer(); ?>
