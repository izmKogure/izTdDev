<aside role="complementary">
	<div class="aside-wrapper">
		<div id="primary-adsense">
			<?php echo do_shortcode('[prim_ad]'); ?>
		</div>
			
		<div id="popular-posts">
			<h3><img src="<?php echo get_template_directory_uri(); ?>/images/icon_star.gif" alt="スター" width="29" height="29">人気の記事</h3>
			<?php if (function_exists('wpp_get_mostpopular')): ?>
				<?php
					$args = array(
						'limit' => 10,
			            'range' => 'weekly',
			            'post_type' => post,		        		        
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
			            <div class='pop-content'>
							<div class='pop-category'>{category}</div>
			                <a href='{url}'>{text_title}</a>
			            </div>
			            </li>
			            "
					);
					wpp_get_mostpopular($args);
				?>
			<?php endif; ?>
		</div><!-- #popular-posts -->
			
		<div id="widget-facebook">
			<?php echo do_shortcode('[wi_facebook]'); ?>
		</div>
			
		<div class="sinagawa">
			<a href="http://www.umotiongraphics.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/banner_sinagawa_site.png" alt="raitankblog" width="300" height="140" rel="nofollow"></a>
		</div>
		<div class="raitank">
			<a href="http://www.raitank.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/banner_raitankblog.png" alt="raitankblog" width="300" height="140" rel="nofollow"></a>
		</div>
		<div class="ads-wrapper">
			<a href="http://videosonic.co.jp/recruit/detail.html?empType=shoot&jobType=shoot" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/banner_today_cameraman.png" alt="cameraman" width="140" height="140"></a><a href="http://fukidashi.web.fc2.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/bunner_aestudy.png" alt="aestudy" width="140" height="140"></a><a href="http://ae-style.net/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/bunner_aftereffects.jpg" alt="aftereffects" width="140" height="140"></a><a href="http://baaaf.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/bunner_bakaafter.png" alt="bakaafter" width="140" height="140"></a>
		</div>
		<div class="izmaker">
			<a href="http://izmaker.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/banner_today_izmaker.png" alt="izmaker" width="300" height="300"></a>
		</div>
	</div><!-- .aside-wrapper -->
</aside>