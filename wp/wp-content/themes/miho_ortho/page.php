<?php get_header(); ?>

<div id="pageContent">
	
	
<div class="post_thumbnail" style="background-image: url(
<?php 
// アイキャッチ画像が設定されているかチェック
if(has_post_thumbnail()){
    // アイキャッチ画像を表示する
    the_post_thumbnail_url(full);
}else{
    // 代替画像を表示する
    echo '/wp-content/uploads/2018/11/page_bg-noImg.jpg';
}
?>
)"></div>	

<section>
	<div class="inr">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="headArea">
			<h1 class="ttl"><?php the_title(); ?></h1>
		</div>

		<div class="wrap">
			<div class="contentInr">
				<?php the_content(); ?>
			</div>

			<?php if(is_page( '9' )): ?>
			<!-- 「初めてご来院いただく方へ」のページのみ使用 -->			
			<div class="flowWrap">
				<?php
					//グループ内で回す
					$field_group = SCF::get( 'group-flow' );
					foreach ( $field_group as $fields ) {
					?>

					<div class="flowInr">
						<div class="number alignleft">
							<p><?php echo esc_html( $fields['number'] ); ?></p>
						</div>

						<div class="textArea">
							<h3><?php echo esc_html( $fields['ttl'] ); ?>
								<?php if( $fields['time'] ): ?>
									<span>（<?php echo( $fields['time'] ); ?>）</span>
								<?php endif; ?>
							</h3>
							<div class="detail"><?php echo( $fields['moredetail'] ); ?></div>
						</div>
					</div>
				<?php } ?>
			</div>
			<?php else: ?>
			<?php endif; ?>	
			
			
			
			
			<?php if(is_page( '31' )): ?>
			<!-- 「リンク」ページのみ使用 -->			
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
			<?php else: ?>
			<?php endif; ?>	




			<?php if(is_page( '23' )): ?>
			<!-- 「よくいただくご質問」のページのみ使用 -->
			<h2 id="a01">治療内容について</h2>
			<dl class="faqBox">
				<?php
					//グループ内で回す
					$field_group = SCF::get( 'faq01' );
					foreach ( $field_group as $fields ) {
				?>
				<dt><?php echo esc_html( $fields['question01'] );?></dt>
				<dd><?php echo(wp_kses_post( $fields['answer01'] ));?></dd>
				<?php } ?>
			</dl>
			
			<h2 id="a02">費用について</h2>
			<dl class="faqBox">
				<?php
					//グループ内で回す
					$field_group = SCF::get( 'faq02' );
					foreach ( $field_group as $fields ) {
				?>
				<dt><?php echo esc_html( $fields['question02'] );?></dt>
				<dd><?php echo(wp_kses_post( $fields['answer02'] ));?></dd>
				<?php } ?>
			</dl>
			
			<h2 id="a03">通院期間について</h2>
			<dl class="faqBox">
				<?php
					//グループ内で回す
					$field_group = SCF::get( 'faq03' );
					foreach ( $field_group as $fields ) {
				?>
				<dt><?php echo esc_html( $fields['question03'] );?></dt>
				<dd><?php echo(wp_kses_post( $fields['answer03'] ));?></dd>
				<?php } ?>
			</dl>
			
			<h2 id="a04">こどもの矯正治療について</h2>
			<dl class="faqBox">
				<?php
					//グループ内で回す
					$field_group = SCF::get( 'faq04' );
					foreach ( $field_group as $fields ) {
				?>
				<dt><?php echo esc_html( $fields['question04'] );?></dt>
				<dd><?php echo(wp_kses_post( $fields['answer04'] ));?></dd>
				<?php } ?>
			</dl>
			
			<script>
				$(function(){
					$(".faqBox dt").on("click", function() {
						$(this).next().slideToggle();
						$(this).toggleClass("active");
					});
				});
			</script>
			
			<?php else: ?>
			<?php endif; ?>
			
			
			
			<?php if(is_page( '71' )): ?>
			<!-- 「こどもの矯正歯科」ページのみ使用 -->			
			<h2 id="a04">こどもの矯正治療についてよくある質問をまとめました。</h2>
			<dl class="faqBox">
				<?php
					//グループ内で回す
					$field_group = SCF::get('faq04', get_page_by_path('faq'));
					foreach ( $field_group as $fields ) {
				?>
				<dt><?php echo esc_html( $fields['question04'] );?></dt>
				<dd><?php echo(wp_kses_post( $fields['answer04'] ));?></dd>
				<?php } ?>
			</dl>
			
			<script>
				$(function(){
					$(".faqBox dt").on("click", function() {
						$(this).next().slideToggle();
						$(this).toggleClass("active");
					});
				});
			</script>
			<?php else: ?>
			<?php endif; ?>	

		</div>
		<?php endwhile; ?>
	</div>
</section>



</div>


<?php get_footer(); ?>
