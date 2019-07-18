<?php get_header(); ?>

<div class="contentInr singleWrap">
	<!-- パンくず -->
<!--	<?php breadcrumb(); ?>-->
	<!-- /パンくず -->
	
	<div id="inner" class="alignleft">
		<?php while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<div class="entry-content"><?php the_content(); ?></div>
    	<?php endwhile; ?>
		<div class="listCat">
			<?php the_category( $separator, $parents, $post_id ); ?>
		</div>
		
		<!-- prev next -->
		<div id="prev_next" class="clearfix">  
		<?php
			$prevpost = get_adjacent_post(false, '', true); //前の記事
			$nextpost = get_adjacent_post(false, '', false); //次の記事
			if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
		?>
		<?php
			if ( $nextpost ) { //次の記事が存在しているとき
			echo '<a href="' . get_permalink($nextpost->ID) . '" title="'. get_the_title($nextpost->ID) . '" id="prev" class="clearfix">  

			
			<p>'. get_the_title($nextpost->ID) . '</p></a>';
			} else { //次の記事が存在しないとき
			echo '<div id="next_no"><a href="' .home_url('/'). '"><div id="prev_next_home"><i class="fa fa-home"></i>
			</div></a></div>';
			}
				
			if ( $prevpost ) { //前の記事が存在しているとき
			echo '<a href="' . get_permalink($prevpost->ID) . '" title="' . get_the_title($prevpost->ID) . '" id="next" class="clearfix">

			
			<p>' . get_the_title($prevpost->ID) . '</p></a>';
			} else { //前の記事が存在しないとき
			echo  '<div id="prev_no"><a href="' .home_url('/'). '"><div id="prev_next_home"><i class="fa fa-home"></i>
			</div></a></div>';
			}
		?>
		<?php } ?>
		</div>
		<!-- /prev next -->
	</div>
		
	<?php get_sidebar(); ?>
</div>




<?php get_footer(); ?>
