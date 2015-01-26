<div id="sidebar" class="fixBox">
	<aside role="complementary">
		<!-- adsense -->
		<div id="adsense">
			<div style="float:left; margin-right:20px;">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
     			style="display:inline-block;width:160px;height:600px"
     			data-ad-client="ca-pub-8972086855511860"
     			data-ad-slot="2949017436"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			</div>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:120px;height:600px"
			     data-ad-client="ca-pub-8972086855511860"
			     data-ad-slot="1472284234"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
		<!-- /adsense -->
		<!-- ranking -->
		<div id="PopularPosts">
			<h3><img src="<?php echo get_template_directory_uri(); ?>/images/icon_star.gif" alt="スター" width="29" height="29">人気の記事</h3>
			<?php if (function_exists('wpp_get_mostpopular')): ?>
		        <?php
		            $args = array(
		                'limit' => 10,
		                'range' => 'weekly',
		                'post_type' => post,
		                'pid' => "21,22,23,24,25,26", 
		                'title_length' => 20, 
		                'thumbnail_width' => 80,
		                'thumbnail_height' => 80, 
		                'stats_comments' => 0,
		                'stats_views' => 0, 
		                'stats_category' => 1,
		                'wpp_start' => "<ol>", 
		                'wpp_end' => "</ol>", 
		                'post_html' => 
		                "
		                <li class='clearfix'>
		                {thumb}
		                <div class='description'>
					    	<div class='rankCategory'>{category}</div>
		                	<a href='{url}'>{text_title}</a>
		                </div>
		                </li>
		                "
		            );
		            wpp_get_mostpopular($args);
		        ?>
			<?php endif; ?>
		</div>
		<!-- /ranking -->
		<!-- facebook -->
		<div id="facebook">
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=758942267458537&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-like-box" data-href="https://www.facebook.com/izmaker" data-width="300" data-height="642" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="true"></div>
		</div>
		<!-- /facebook -->
		<a class="sinagawa" href="http://www.umotiongraphics.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/banner_sinagawa_site.png" alt="raitankblog" width="300" height="140" rel="nofollow"></a>
		<a class="raitank" href="http://www.raitank.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/banner_raitankblog.png" alt="raitankblog" width="300" height="140" rel="nofollow"></a>
		<div class="adwrap">
			<a href="http://videosonic.co.jp/recruit/detail.html?empType=shoot&jobType=shoot" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/banner_today_cameraman.png" alt="cameraman" width="140" height="140"></a><a href="http://fukidashi.web.fc2.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/bunner_aestudy.png" alt="aestudy" width="140" height="140"></a><a href="http://ae-style.net/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/bunner_aftereffects.jpg" alt="aftereffects" width="140" height="140"></a><a href="http://baaaf.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/bunner_bakaafter.png" alt="bakaafter" width="140" height="140"></a>
		</div>
		<a class="izmaker" href="http://izmaker.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/banner_today_izmaker.png" alt="izmaker" width="300" height="300"></a>
	</aside>
</div>
<!-- /sidebar -->
