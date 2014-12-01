<?php get_header(); ?>
<!-- sideFixed -->
<script type="text/javascript">
jQuery(function(){
	var contentHeight = jQuery("html, body").height();
	var windowHeight = jQuery(window).height();
	var target = jQuery(".fixBox");
	var targetHeight = target.outerHeight();
	var targetPosition = target.position();
	var footer = jQuery("#snsbutton");
	var footerHeight = footer.outerHeight();
	jQuery(window).resize(function(){
		windowHeight = jQuery(this).height();
	});
	jQuery(window).scroll(function(){
		var scrollTop = jQuery(this).scrollTop();
		var visibleBottom = scrollTop + windowHeight;
		var targetBottom = targetPosition.top + targetHeight;
		if(visibleBottom >= targetBottom) {
			if(footerHeight > contentHeight - visibleBottom) {
				target.css({position:"fixed", bottom: footerHeight - (contentHeight - visibleBottom)});
			} else {
				target.css({position:"fixed"}).css({bottom: 0}).css({"margin-left": 774});
			}
		} else {
			target.css({position:"static", bottom: "auto" ,"margin-left":0});
		}
	});
});
</script>
<!-- /sideFixed -->

<!-- container -->
<div id="container" class="clearfix">
	<!-- contents -->
	<div id="contents">
		<div id="breadcrumb">
		<?php echo get_breadcrumb_list(); ?>
		</div>
		<!-- article -->
		<article>
			<?php if(have_posts()): ?>
			<?php while(have_posts()):the_post(); ?>
			<div id="category" class="<?php $cat = get_the_category(); $cat = $cat[0];{ echo $cat->category_nicename; } ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_topics.png" alt="icon_topics" width="16" height="20"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></div>
			<h2><?php the_title(); ?></h2>
			<div class="date"><?php echo get_the_date('Y年n月d日'); ?> <?php if (function_exists('wpp_get_views')) { echo wpp_get_views( get_the_ID() ); } ?>views</div>
			<div class="tag"><?php the_tags('','',''); ?></div>
			<section>
			<?php the_content(); ?>
			</section>
			<?php endwhile; else: ?>
			<?php endif; ?>
			
			<div id="snsBtn" class="clearfix">
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
				
			<!-- adsense -->
			<div id="adsense">
				<script type="text/javascript">
				google_ad_client = "ca-pub-8972086855511860";
				google_ad_slot = "7285902639";
				google_ad_width = 728;
				google_ad_height = 90;
				</script>
				<script type="text/javascript"
				src="//pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			</div>
			<!-- /adsense -->
				
			<!-- staff -->
			<div id="staff">
			<dl>
				<dt><div class="thumb"><?php echo get_avatar(get_the_author_id(), 200); ?></div></dt>
				<dd class="firstChild"><h3>この記事を書いた人</h3></dd>
				<!--<dd class="list"><p><a href="?page_id=23">スタッフ一覧</a></p></dd>-->
				<dd class="worker"><p><?php the_author_meta('worker'); ?>&nbsp;&nbsp;<span><?php the_author(); ?></span></p></dd>
				<dd class="description"><p><?php the_author_meta('user_description'); ?></p></dd>
			</dl>	
			</div>
			<!-- /staff -->
				
			<!-- pager -->
			<div id="navigation" class="clearfix">
				<?php if( get_previous_post() ): ?>
				<div class="alignLeft"><?php previous_post_link('%link','%title',FALSE); ?></div>
				<?php endif; if( get_next_post() ): ?>
				<div class="alignRight"><?php next_post_link('%link','%title',FALSE); ?></div>
				<?php endif; ?>
			</div>
			<!-- /pager -->
				
			<!-- relatedArticle -->
			<div id="relatedArticle">
				<h3><img src="<?php echo get_template_directory_uri(); ?>/images/icon_related.gif" alt="icon_related" width="16" height="20">関連記事</h3>
				<?php wp_related_posts()?>
			</div>
			<!-- /relatedArticle -->
			
			<!-- update -->
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
			</div>
			<!-- /update -->
				
			<!-- commentForm -->
			<div id="commentForm">
			<?php comments_template(); ?>
			</div>
			<!-- /commentForm -->
		</article>
		<!-- /article -->
		
		<!-- fb-like-box -->
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
		<!-- /fb-like-box -->
	</div>
	<!-- /contents -->
	
	<!-- sidebar -->
	<?php get_sidebar(); ?>

</div>
<!-- /container -->

<!-- footer -->
<?php get_footer(); ?>

