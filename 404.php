<?php get_header(); ?>
	<!-- container start-->
	<div id="container" class="clearfix">
		<!-- contents start-->
		<div id="contents">
			<div id="breadcrumb">
			<?php echo get_breadcrumb_list(); ?>
			</div>
			<h2><img src="<?php echo get_template_directory_uri(); ?>/images/icon_topics.png" alt="アイコン" width="16" height="20">指定されたページは存在しませんでした。</h2>
			<p>このページのURL：http://<?php echo esc_html($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?></p>
			<p>現在表示する記事がありません。</p>
			<p><a href="<?php echo home_url(); ?>">トップページへ戻る</a></p> 
		</div>
		<!-- contents end-->
		
		<!-- sidebar start-->
		<?php get_sidebar(); ?>
		
	</div>
	<!-- /container -->
			
	<!-- footer start-->
	<?php get_footer(); ?>