<?php get_header(); ?>
<!-- /header -->
			
	<!-- slide -->
	<div id="slide">
		<?php if ( function_exists( "easingsliderlite" ) ) { easingsliderlite(); } ?>
	</div>
	<!-- /slide -->
			
	<!-- content -->
	<div id="content" class="clearfix">
		<!-- main -->
		<div id="main" role="main">
			<?php if(have_posts()): ?>
			<?php while(have_posts()):the_post(); ?>
			<dl class="<?php $cat = get_the_category(); $cat = $cat[0];{ echo $cat->category_nicename; } ?>">
				<dt><div class="thumb"><a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) { the_post_thumbnail();} else {echo '<img src="' . get_template_directory_uri() .'/images/no_image.gif" alt="no_image" width="200" height="140">';}?><?php $days=3; $today=date_i18n('U'); $entry=get_the_time('U'); $sa=date('U',($today - $entry))/86400; if( $days > $sa ){echo '<img class="new" src="' . get_template_directory_uri() .'/images/icon_new.png" alt="new" width="87" height="87">';}?></a></div></dt>
				<dd class="firstChild"><div id="category" class="<?php $cat = get_the_category(); $cat = $cat[0];{ echo $cat->category_nicename; } ?>"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></div></dd>
				<dd class="ttl"><h3><a href="<?php the_permalink(); ?>"><?php if(mb_strlen($post->post_title)>50) { $title= mb_substr($post->post_title,0,50) ; echo $title. '...';} else {echo $post->post_title;}?><?php $days=30; $today=date_i18n('U'); $entry=get_the_time('U'); $sa=date('U',($today - $entry))/86400; if( $days > $sa ){if(has_tag('特集')) { echo('特集');} }?></a></h3></dd>
				<dd class="date"><?php echo get_the_date('Y年n月d日'); ?> ｜ <?php if (function_exists('wpp_get_views')) { echo wpp_get_views( get_the_ID() ); } ?> views</dd>
				<dd class="more"><p><a href="<?php the_permalink(); ?>">≫記事をみる</a></p></dd>
			</dl>
			<?php endwhile; else: ?>
				<p>記事はありません。</p>
			<?php endif; ?>
			<!-- navigation -->
			<div id="navigation">
			<?php wp_pagenavi(); ?>
			</div>
			<!-- /navigation -->
		</div>
		<!-- /main -->
		
		<!-- sidebar -->
		<?php get_sidebar(); ?>
	
	</div>
	<!-- /content -->
			
	<!-- footer -->
	<?php get_footer(); ?>
