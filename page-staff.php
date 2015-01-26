<?php get_header(); ?>
	<!-- powertip control -->
	<script type="text/javascript">
	jQuery(function() {
	  jQuery('.mishiro').powerTip({placement: 'sw-alt'});
	  jQuery('.doi').powerTip({placement: 's'});
	  jQuery('.kogure').powerTip({placement: 'se-alt'});
	  jQuery('.ishii').powerTip({placement: 'sw-alt'});
	  jQuery('.miyawaki').powerTip({placement: 's'});
	  jQuery('.itou').powerTip({placement: 'se-alt'});
	  jQuery('.nakae').powerTip({placement: 'sw-alt'});
	  jQuery('.kimura').powerTip({placement: 's'});
	  jQuery('.izmaker').powerTip({placement: 'se-alt'});
	  jQuery('.kawacho').powerTip({placement: 'sw-alt'});
	  jQuery('.shinagawa').powerTip({placement: 's'});
	});
	</script>

<!-- container -->
<div id="container" class="clearfix">
	<!-- main -->
	<div id="main" role="main">
		<div id="breadcrumb">
		<?php echo get_breadcrumb_list(); ?>
		</div>
		<!-- mainWrap -->
		<div id="mainWrap">
			<h2><img src="<?php echo get_template_directory_uri(); ?>/images/icon_topics.png" alt="icon_topics" width="16" height="20">スタッフ紹介</h2>
			<div class="clearfix">
				<dl>
				  <dt><img class="mishiro" src="<?php echo get_template_directory_uri(); ?>/images/figure_mishiro.png" alt="三代和久" width="240" height="220" title="島根県出身。野球の松坂世代、サッカーのゴールデンエイジ、<br>バスケの田臥世代という日本を代表する豪華アスリートと同じ世代。<br>本人は神のいたずらにより極普通の運動神経で育つ。<br>趣味は日曜大工とバスケットボール。特技はどんな状況でも眠りにつける事。<br>主におもしろ映像ネタやクリエイティブヒントを執筆。"></dt>
				  <dd class="worker">izmaker運営責任者</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(4); ?>">三代 和久</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '4'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="doi" src="<?php echo get_template_directory_uri(); ?>/images/figure_doi.png" alt="土井一樹" width="240" height="220" title="デザイン・マーケティング担当の土井と申します。<br>漫画家を目指していたはずが、いつの間にかwebの世界にたどり着きました。<br>好きな回転寿司のネタは「コーン」です。"></dt>
				  <dd class="worker">デザイナー</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(5); ?>">土井 一樹</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '5'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="kogure" src="<?php echo get_template_directory_uri(); ?>/images/figure_kogure.png" alt="小暮哲也" width="240" height="220" title="web系各種コーディングが好き、特にActionScriptやJavaScriptを使用したアニメーション作成が好き。<br>映像知識がほとんど無いですが、なんかそっち系の記事が書けたらいいかなと思います。"></dt>
				  <dd class="worker">izmaker開発担当</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(3); ?>">小暮 哲也</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '3'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="ishii" src="<?php echo get_template_directory_uri(); ?>/images/figure_ishii.png" alt="石井智子" width="240" height="220" title="イラレ、フォトショで和生地の柄を作るのが好きです。<br>布感を出したり刺繍っぽく加工したり、そんなテクニックに関することも書けたらいいな。<br>とりあえずは色彩に関することや雑記をアップします。"></dt>
				  <dd class="worker">運営担当</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(6); ?>">石井智子</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '6'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="miyawaki" src="<?php echo get_template_directory_uri(); ?>/images/figure_miyawaki.png" alt="宮脇克彦" width="240" height="220" title="穏やかな方の関西人、または、スケールの大きな話が大好きな小心者。<br>洋楽インディーズをこよなく愛し「Pitchfork」をチェックすることで日々やり過ごす。<br>Nirvanaの来日公演と第1回目のFuji Rockを体験した事が自己アイデンティティの支え。<br>最近はAmazonの「欲しいものリスト」を整理してる時が至福の時間。<br>ココロスイッチの情報を随時配信中。"></dt>
				  <dd class="worker">ココロスイッチ</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(10); ?>">宮脇克彦</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '10'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="itou" src="<?php echo get_template_directory_uri(); ?>/images/figure_itou.png" alt="伊藤賢" width="240" height="220" title="ノンリニアとAEを何とか駆使して、日々業務中。<br>映画を見るのが好きなので、このサイトで映画について書かせてもらっています。<br>面白い映画をたくさん見たい。それだけです。"></dt>
				  <dd class="worker">映像編集者</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(7); ?>">伊藤賢</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '7'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="nakae" src="<?php echo get_template_directory_uri(); ?>/images/figure_nakae.png" alt="中江 正人" width="240" height="220" title="1986年生まれ。主にAfterEffects、Cinema4Dを扱います。<br>音と映像と空間を調和させるのが楽しいです。"></dt>
				  <dd class="worker">&nbsp;</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(8); ?>">中江 正人</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '8'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="kimura" src="<?php echo get_template_directory_uri(); ?>/images/figure_kimura.png" alt="Satoshi Kimura" width="240" height="220"></dt>
				  <dd class="worker">&nbsp;</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(9); ?>">Satoshi Kimura</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '9'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="izmaker" src="<?php echo get_template_directory_uri(); ?>/images/figure_izmaker.png" alt="izmaker" width="240" height="220" title="izmaker中の人です。"></dt>
				  <dd class="worker">&nbsp;</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(11); ?>">izmaker 公式</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '11'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="kawacho" src="<?php echo get_template_directory_uri(); ?>/images/figure_kawacho.jpg" alt="kawacho" width="240" height="220" title="デザインやWeb制作や映像制作などが好きです。<br>After Effects Styleを運営。 http://ae-style.net/"></dt>
				  <dd class="worker">&nbsp;</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(14); ?>">kawacho</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '14'"); echo $result;?></dd>
				</dl>
				<dl>
				  <dt><img class="shinagawa" src="<?php echo get_template_directory_uri(); ?>/images/figure_shinagawa.jpg" alt="品川敦" width="240" height="220" title="フリーランスのディレクター。モーショングラフィックデザイナー。<br>CMや音楽ライブビジョン映像などをAfterEffectsにて制作。<br>七尾旅人MVコンテスト審査員特別賞。<br>近年の仕事に「テイルズウィーバーCM」「ナオト・インティライミ ライブ ビジョン映像」など。<br>HP：www.umotiongraphics.com"></dt>
				  <dd class="worker">&nbsp;</dd>
				  <dd class="name"><a href="<?php echo get_author_posts_url(15); ?>">品川敦</a></dd>
				  <dd class="number">記事数 ： <?php $result = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_author = '15'"); echo $result;?></dd>
				</dl>
			</div>
		</div>
		<!-- /mainWrap -->
	</div>
	<!-- /main -->
	
	<!-- sidebar -->
	<?php get_sidebar(); ?>
	
</div>
<!-- /container -->
	
<!-- footer -->
<?php get_footer(); ?>

