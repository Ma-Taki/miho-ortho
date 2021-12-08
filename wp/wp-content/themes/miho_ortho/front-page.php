<?php
/**
Template Name: トップページ
*/
?>
<?php get_header(); ?>

<!-- #mainImg -->
<div id="mainImg">
	<?php
	$args = array(
	  'post_type' => 'mainImg', /* カスタム投稿名が「gourmet」の場合 */
	  'posts_per_page' => 5, /* 表示する数 */
	); ?>
	<?php $my_query = new WP_Query( $args ); ?>
	<ul class="bxslider">
		<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
			<?php
			// SCF::get_post_meta($post->ID, '設定した名前', 画像サイズ)
			 $img = get_post_meta($post->ID, 'mainImg', true);
			?>
			<li style="background-image: url(<?php echo wp_get_attachment_url($img) ?>)"></li>
		<?php endwhile; ?>
	</ul>
	<?php wp_reset_postdata(); ?>

	<div class="textArea">
		<p class="spNone">
			<?php
				$cf_sample = SCF::get('pcImg');
				echo wp_get_attachment_image( $cf_sample , 'full' );
			?>
		</p>

		<p class="pcNone">
			<?php
				$cf_sample = SCF::get('spImg');
				echo wp_get_attachment_image( $cf_sample , 'full' );
			?>
		</p>
		<a href="#topIdea"><span></span></a>
	</div>
</div>
<!-- /#mainImg -->

<!-- #topContent -->
<div id="topContent">

<!-- #topIdea -->
<div id="topIdea" class="wrap">
	<div class="spNone" style="
    position: absolute;
    background: rgba(255,255,255,0.75);
    padding: 20px;
    font-weight: bold;
    color: #e46e7a;
">
    <a class="Link" href="https://www.instagram.com/miho_ortho/" target="_blank" style="
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
"></a>
    <img src="wp/wp-content/themes/miho_ortho/images/instagram_logo.png" style="width: 28px;vertical-align: middle;">
    <span style="
    margin-left: 8px;
">instagramはこちら</span></div>
	<?php
		$img = get_post_meta($post->ID, 'ideaTtl', true);
	?>
	<h2 class="spNone"><img src="<?php echo wp_get_attachment_url($img) ?>" alt="女性院長による細やかな視点で、健康で魅力的な笑顔をあなたにご提案します。"></h2>
	<h2 class="pcNone anzu">
		<?php
			$cf_sample = SCF::get('ideaTtl_text');
			echo nl2br($cf_sample);
		?>
	</h2>
	<div class="inr">
		<p class="tooth">
			<?php
				$cf_sample = SCF::get('ideaTooth');
				echo wp_get_attachment_image( $cf_sample , 'full' );
			?>
		</p>
		<p class="ideaImg">
			<?php
				$cf_sample = SCF::get('ideaImg');
				echo wp_get_attachment_image( $cf_sample , 'full' );
			?>
		</p>

<div style="margin:50px auto;">
		<p class="alignleft" style="width:58%;">
			当院では、矯正歯科専門クリニックとして様々な治療方法を患者さまの希望に沿いながらご提案致します。<br>
			表のブラケット矯正治療をはじめ、裏からの矯正装置（リンガル）取り外しの透明な矯正装置（アライナー・インビザライン）による治療を行っています。患者さまのご希望に出来るだけ添えるよう治療を考えております。ぜひご相談ください。</p>
			<img  class="alignright" style="width:38%;margin:0 2%; padding:0" src="/wp/wp-content/uploads/2021/11/アライナー写真.jpg">
</div>
		<div class="alignleft" style="clear:both;">
			<?php
			$cf_sample = SCF::get('director');
			echo wp_get_attachment_image( $cf_sample , 'full' );
			?>
			<p class="name"><span>歯科医師</span>廣瀬 美帆</p>
<!--			<p class="btn arrow"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/clinic/">院内案内</a></p>-->
		</div>

		<div class="alignright">
			<h1>ごあいさつ</h1>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>

</div>
<!-- /#topIdea -->


<!-- #topNav -->
<div id="topNav" class="bgTooth">
	<div class="wrap fs0">
		<ul class="matchHeight inrBox">
		<?php
			$posts = new WP_Query( array(
					'post_type' => 'topNav',
					'posts_per_page' => 7,
					'orderby' =>  'menu_order',
					'order' =>  'ASC'
				)
			);
			if ( have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post();
		?>
			<li>
				<a href="<?php
					$cf_sample = SCF::get('topNav_link');
					foreach ($cf_sample as $field) {
						echo get_permalink($field);
					}
					?>
				">
					<?php
					 $img = get_post_meta($post->ID, 'topNav_img', true);
					?>
					<img src="<?php echo wp_get_attachment_url($img) ?>">

					<h2><?php the_title(); ?></h2>

					<p><?php
						$cf_sample = SCF::get('topNav_text');
						echo nl2br($cf_sample);
						?>
					</p>

					<p class="btn arrow arrow-w">詳しく見る</p>
				</a>
			</li>
		<?php endwhile; endif; wp_reset_query(); ?>
		</ul>
	</div>
</div>
<!-- /#topNav -->


<!-- #topics -->
<section id="topTopics" class="wrap">
	<h1 class="anzu">お知らせ</h1>
	<dl>
		<?php
		$args = array(
		'posts_per_page' => 5 // 表示件数の指定
		);
		$posts = get_posts( $args );
		foreach ( $posts as $post ): // ループの開始
		setup_postdata( $post ); // 記事データの取得
		?>
		<dt><?php echo get_the_date(); ?></dt>
		<dd>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</dd>
		<?php
		endforeach; // ループの終了
		wp_reset_postdata(); // 直前のクエリを復元する
		?>
	</dl>

<!--	<p class="btn arrow"><a href="#">お知らせ一覧へ</a></p>-->
</section>
<!-- /#topics -->

<!-- #topBnr -->
<div class="linkWrap">
	<ul class="fs0">
	<?php
	//グループ内で回す
	$field_group = SCF::get( 'group-link' );
	foreach ( $field_group as $fields ) {
	 ?>
			<li><a href="<?php echo esc_html( $fields['link_url'] );?>" target="_blank"><?php $image = get_post_meta($post->ID, 'link_bnr', true); echo wp_get_attachment_image($fields['link_bnr'], 'full'); ?></a></li>
	<?php } ?>
	</ul>
</div>
<!-- /#topBnr -->



</div>
<?php get_footer(); ?>
