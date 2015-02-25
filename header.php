<!DOCTYPE html>
<html lang="ja">
	<head <?php ogp_prefix(); ?>>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
		<!-- viewport -->
		<?php if(preg_match("/Android/", $_SERVER["HTTP_USER_AGENT"])): ?>
		<meta name="viewport" content="target-densitydpi=device-dpi, width=1114, maximum-scale=1, user-scalable=yes">
		<?php else: ?>
		<meta name="viewport" content="width=1114">
		<?php endif; ?>
		<!-- /viewport -->
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon_today.ico">
		<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-48454064-1', 'izmaker.com');
		  ga('require', 'displayfeatures');
		  ga('send', 'pageview');
		</script>
		<!-- /Google Analytics -->
		<!-- StatCounter Code for Default Guide -->
		<script type="text/javascript">
			var sc_project=9930169; 
			var sc_invisible=1; 
			var sc_security="e1d8e4cc"; 
			var scJsHost = (("https:" == document.location.protocol) ?
			"https://secure." : "http://www.");
			document.write("<sc"+"ript type='text/javascript' src='" +
			scJsHost+
			"statcounter.com/counter/counter.js'></"+"script>");
		</script>
		<!-- /StatCounter Code for Default Guide -->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- page -->
		<div id="page">
			<!-- header -->
			<header id="header" role="banner">
				<h1 class="logo"><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" alt="logo" width="594" height="81"></a></h1>
				<nav id="global" role="navigation">
					<div class="nav-wrapper clearfix">
						<div class="nav-inner clearfix">
							<a class="home-buttom" href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_navi.gif" alt="icon_navi" width="27" height="25"></a>
							<?php wp_nav_menu( array ( 'theme_location' => 'header-nav' ) ); ?>
						</div>
						<?php get_search_form(); ?>
					</div>
				</nav>
			</header>