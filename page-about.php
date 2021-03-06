<?php get_header(); ?>
	<div id="content" class="site-content clearfix">
		<div id="main" class="site-main" role="main">
			<div id="breadcrumb">
				<?php echo get_breadcrumb_list(); ?>
			</div>
		
			<div id="about-wrapper">
				<h2><img src="<?php echo get_template_directory_uri(); ?>/images/icon_topics.png" alt="icon_topics" width="16" height="20">このサイトについて</h2>
				
				<section id="about-izmaker">
					<h3>映像業界をもっと、izmakerを便利に利用してほしい</h3>
					<p>izmaker Todayは映像業界やizmakerのお得な情報を発信する情報メディアです。<br>映像業界のニュース、イベントレポートや、izmakerでのPickup商品、お得なキャンペーン情報、運営スタッフのブログ等を主に配信しています。</p>
				</section>
				
				<section id="about-link">
					<h3>リンクについて</h3>
					<p>izmaker Todayは基本的にリンクフリーです。<br>ただし、当サービスの趣旨に合わない場合や、その他の事情によってはお断りする場合がございますのであらかじめご了承のほど、よろしくお願い致します。<br></p>
				</section>
				
				<section id="about-mail">
				<h3>お問合わせ</h3>
					<p>サービスに関する事、記事のご意見・ご要望等ございましたら、お気軽にお問合せください。</p>
					<?php echo do_shortcode( '[contact-form-7 id="349" title="コンタクトフォーム 1"]' ); ?>
				</section>
			</div><!-- #about-wrapper -->
		
		</div><!-- #main -->
<?php get_sidebar(); ?>
	</div><!-- #content -->
<?php get_footer(); ?>