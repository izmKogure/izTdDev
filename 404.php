﻿<?php get_header(); ?>
	<div id="content" class="site-content clearfix">
		<main id="main" class="site-main" role="main">
			<div id="breadcrumb">
				<?php echo get_breadcrumb_list(); ?>
			</div>
			
			<h2><img src="<?php echo get_template_directory_uri(); ?>/images/icon_topics.png" alt="icon_topics" width="16" height="20">指定されたページは存在しませんでした。</h2>
			<p>このページのURL：http://<?php echo esc_html($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?></p>
			<p>現在表示する記事がありません。</p>
			<p><a href="<?php echo home_url(); ?>">トップページへ戻る</a></p> 
		</div><!-- #main -->		
<?php get_sidebar(); ?>		
	</div><!-- #content -->
	<?php get_footer(); ?>