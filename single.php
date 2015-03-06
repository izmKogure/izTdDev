<?php get_header(); ?>
	<div id="content" class="site-content clearfix">
		<div id="main" class="site-main" role="main">
			<div id="breadcrumb">
				<?php echo get_breadcrumb_list(); ?>
			</div>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
				
				<header class="entry-header">
					<div class="category <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->category_nicename; } ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon_topics.png" alt="icon_topics" width="16" height="20"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
					</div>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-date">
						<?php echo get_the_date('Y年n月d日'); ?> <?php if ( function_exists('wpp_get_views') ) { echo wpp_get_views( get_the_ID() ); } ?>views
					</div>
					<div class="entry-tags">
						<?php the_tags('','',''); ?>
					</div>
				</header>
				
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				
				<?php endwhile; else: ?>
					<p>記事はありません。</p>
			
				<?php endif; ?>
				
				<footer class="entry-footer">
					<div id="social" class="clearfix">
						<div class="ninja_onebutton">
						<script type="text/javascript">
						//<![CDATA[
						(function(d){
						if(typeof(window.NINJA_CO_JP_ONETAG_BUTTON_a641ec737fba9dd270a31b4aa7a71ce2)=='undefined'){
						    document.write("<sc"+"ript type='text\/javascript' src='http:\/\/omt.shinobi.jp\/b\/a641ec737fba9dd270a31b4aa7a71ce2'><\/sc"+"ript>");
						}else{
						    window.NINJA_CO_JP_ONETAG_BUTTON_a641ec737fba9dd270a31b4aa7a71ce2.ONETAGButton_Load();}
						})(document);
						//]]>
						</script><span class="ninja_onebutton_hidden" style="display:none;"><?php the_permalink(); ?></span><span style="display:none;" class="ninja_onebutton_hidden"><?php the_title(); ?></span>
						</div>
					</div>
						
					<div id="secondary-adsense">
						<?php echo do_shortcode('[sec_ad]'); ?>
					</div><!-- #secondary-adsense -->
					
					<div id="staff">
						<dl>
							<dt><div class="thumb"><?php echo get_avatar(get_the_author_id(), 200); ?></div></dt>
							<dd class="firstChild"><h3>この記事を書いた人</h3></dd>
							<!--<dd class="list"><p><a href="?page_id=23">スタッフ一覧</a></p></dd>-->
							<dd class="worker"><p><?php the_author_meta('worker'); ?>&nbsp;&nbsp;<span class="worker-links"><?php the_author_posts_link(); ?></span></p></dd>
							<dd class="description"><p><?php the_author_meta('user_description'); ?></p></dd>
						</dl>	
					</div><!-- #staff -->
						
					<div id="navigation" class="clearfix">
						<?php if( get_previous_post() ): ?>
							<div class="align-left"><?php previous_post_link('%link','%title',FALSE); ?></div>
						<?php endif; if( get_next_post() ): ?>
							<div class="align-right"><?php next_post_link('%link','%title',FALSE); ?></div>
						<?php endif; ?>
					</div><!-- #navigation -->
						
					<div id="related-article">
						<h3><img src="<?php echo get_template_directory_uri(); ?>/images/icon_related.gif" alt="icon_related" width="16" height="20">関連記事</h3>
						<?php wp_related_posts()?>
					</div><!-- #related-article -->
					
					<div id="update">
						<h3><img src="<?php echo get_template_directory_uri(); ?>/images/icon_related.gif" alt="icon_related" width="16" height="20">新着記事</h3>
						
						<?php global $post; $update = get_posts( array( 'posts_per_page' => 6 ) ); ?>
						<ul>
							<?php if($update) : ?>
								
								<?php foreach( $update as $post ) : setup_postdata($post); ?>
								<li>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(100,100) ); ?></a>
									<a href="<?php the_permalink(); ?>"><?php the_time('Y年n月j日'); ?></a>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</li>
							
								<?php endforeach; ?>
							
							<?php else : ?>
								<p>新着作品はありません</p>
							
							<?php endif; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					</div><!-- #update -->
						
					<div id="comments" class="comments-area">
						<?php comments_template(); ?>
					</div><!-- #comments -->
				</footer>
			</article><!-- #article -->
		
			<div id="fb-like-box">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=232196246918155";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like-box" data-href="https://www.facebook.com/izmaker" data-width="745" data-height="290" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=232196246918155";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="660" data-numposts="5" data-colorscheme="light"></div>			
			</div>
		
		</div><!-- #main -->
<?php get_sidebar(); ?>
	</div><!-- #content -->
<?php get_footer(); ?>