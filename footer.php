<div id="footer-area">
	<div class="social-info container">
		<ul class="sns-button clearfix">
			<li class="fa-icon">
				<div class="fo-facebook">
					<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" usemap="#fbmap" alt="facebook" width="348" height="105">
					<div class="fb-content"><?php echo do_shortcode('[fo_facebook]'); ?></div>
				</div>
			</li>
			<li class="official site"><img src="<?php echo get_template_directory_uri(); ?>/images/izmaker.gif" usemap="#izmap" alt="izmaker" width="348" height="105"></li>
			<li class="tw-icon">
				<div class="fo-twitter">
					<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" usemap="#twmap" alt="twitter" width="348" height="105">
					<div class="tw-content"><?php echo do_shortcode('[fo_twitter]'); ?></div>
				</div>
			</li>
		</ul>
	</div><!-- .social-info -->
</div><!-- #footer-area -->
			
<footer id="footer" role="contentinfo">
	<div class="site-info container clearfix">
		<nav class="navbar-footer" role="navigation"><?php wp_nav_menu( array ( 'theme_location' => 'footer-nav', 'container_class' => 'menu-footer-nav-container clearfix' ) ); ?></nav>
		<p class="copyright"><small>&copy;2014 izmaker Today</small></p>
	</div>
</footer><!-- #footer -->
</div><!-- #page -->

<map name="fbmap" id="fbmap">
	<area href="https://www.facebook.com/izmaker" target="_blank" shape="rect" alt="square" coords="65,26,270,53">
</map>
<map name="izmap" id="izmap">
	<area href="http://izmaker.com/" shape="rect" target="_blank" alt="square" coords="100,27,246,60">
</map>
<map name="twmap" id="twmap">
	<area href="https://twitter.com/iz_izmaker" target="_blank" shape="rect" alt="square" coords="142,15,190,54">
</map><!-- /image-map -->
<?php wp_footer(); ?>
</body>
</html>