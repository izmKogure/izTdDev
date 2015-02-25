	<!-- footer-area -->
	<div id="footer-area">
		<div class="sns-buttom clearfix">
			<ul>
				<li>
					<div class="facebook">
						<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" usemap="#fbmap" alt="facebook" width="348" height="105">
						<div id="fb-root">
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=232196246918155";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
							<div class="fb-like" data-href="https://www.facebook.com/izmaker" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
						</div>	
					</div>
				</li>
				<li class="center"><img src="<?php echo get_template_directory_uri(); ?>/images/izmaker.gif" usemap="#izmap" alt="izmaker" width="348" height="105"></li>
				<li>
					<div class="twitter">
						<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" usemap="#twmap" alt="twitter" width="348" height="105">
						<div id="tw-root">
							<a href="https://twitter.com/iz_izmaker" class="twitter-follow-button" data-show-count="false" data-lang="ja" data-show-screen-name="false">@iz_izmakerさんをフォロー</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /footer-area -->
			
	<footer id="footer" class="clearfix"  role="contentinfo">
		<nav class="global clearfix" role="navigation"><?php wp_nav_menu( array ( 'theme_location' => 'footer-nav' ) ); ?></nav>
		<p><small>&copy;2014 izmaker Today</small></p>
	</footer>
	<!-- /footer -->
</div>	
<!-- /page -->

	<!-- imageMap -->
	<map name="fbmap" id="fbmap">
	<area href="https://www.facebook.com/izmaker" target="_blank" shape="rect" alt="四角形" coords="65,26,270,53">
	</map>
	<map name="izmap" id="izmap">
	<area href="http://izmaker.com/" shape="rect" target="_blank" alt="四角形" coords="100,27,246,60">
	</map>
	<map name="twmap" id="twmap">
	<area href="https://twitter.com/iz_izmaker" target="_blank" shape="rect" alt="四角形" coords="142,15,190,54">
	</map>
	<!-- /imageMap -->
	<?php wp_footer(); ?>
	</body>
</html>