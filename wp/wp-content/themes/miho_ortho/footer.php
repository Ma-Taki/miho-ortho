<!-- #footContent -->
<div id="footContent" class="bgTooth">
	<div class="wrap">
		<h2>当院は予約制です。お手数ですが診療をご希望の場合はお電話または<a href="<?php echo esc_url( home_url( '/' ) ); ?>reservation/">予約フォーム</a>もしくはLINEからご予約くださいませ。</h2>
			<?php
				$posts = new WP_Query( array(
						'post_type' => 'information',
						'posts_per_page' => 1,
					)
				);
				if ( have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post();
			?>
			<p class="tel"><a href="tel:<?php $cf_sample = SCF::get('tel'); echo $cf_sample;?>"><?php $cf_sample = SCF::get('tel'); echo $cf_sample;?></a></p>

			<div class="inr inrTop">

				<div class="alignleft calender">
					<div class="calenderInr">
						<?php
							$cf_sample = SCF::get('calendarDate01');
							echo ($cf_sample);
						?>
					</div>
					<div class="calenderInr">
						<?php
							$cf_sample = SCF::get('calendarDate02');
							echo ($cf_sample);
						?>
					</div>
					<p>■ … 休診日</p>
				</div>

				<div class="alignright">
					<?php
						$cf_sample = SCF::get('time');
						echo $cf_sample;
					?>

					<dl>
						<dt>最終受付</dt>
						<dd>
							<?php
								$cf_sample = SCF::get('last');
								echo $cf_sample;
							?>
						</dd>

						<dt>初診相談のみ</dt>
						<dd>
							<?php
								$cf_sample = SCF::get('consultation');
								echo $cf_sample;
							?>
						</dd>

						<dt>休診日</dt>
						<dd>
							<?php
								$cf_sample = SCF::get('closed');
								echo $cf_sample;
							?>
						</dd>
					</dl>
				</div>
			</div>


			<div class="inr inrBtm">
				<div class="alignleft">
					<?php
					 $img = get_post_meta($post->ID, 'map', true);
					?>
					<img src="<?php echo wp_get_attachment_url($img) ?>">
					<p><a href="
						<?php
							$cf_sample = SCF::get('googleurl');
							echo $cf_sample;
						?>" target="_blank">Google mapを開く</a>
					</p>
				</div>

				<div class="alignright">
					<p class="add">
						<?php
							$cf_sample = SCF::get('add');
							echo $cf_sample;
						?>
					</p>
					<ul>
						<li>
							<h3 class="train">電車でお越しの方</h3>
							<p><?php
							$cf_sample = SCF::get('trainNav');
							echo nl2br($cf_sample);
							?></p>
						</li>
						<li>
							<h3 class="car">お車でお越しの方</h3>
							<p><?php
							$cf_sample = SCF::get('carNav');
							echo nl2br($cf_sample);
							?></p>
						</li>
					</ul>
				</div>
			</div>

			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</div>
</div>
<!-- /#footContent -->

<!-- #footer -->
<footer id="footer" class="wrap">
	<ul class="fs0 footNav">
		<?php wp_nav_menu( array('menu' => 'footNav' )); ?>
	</ul>
	<p class="copy"><small>&copy; Miho Orthodontic Clinic</small></p>
</footer>
<!-- /#footer -->


<!-- page-top -->
<p id="page-top"><a href="#wrap">TOP</a></p>
<!-- /page-top -->

<!--
<?php
global $template;
$template_name = basename($template, '.php');
echo $template_name;
?>
-->

<?php wp_footer(); ?>
</body>
</html>
