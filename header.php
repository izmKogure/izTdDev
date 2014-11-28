<!DOCTYPE html>
<html lang="ja">
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
		<meta name="keyword" content="ニュース, 映像, 映画, サウンド, クリエイター">
		<?php if(preg_match("/Android/", $_SERVER["HTTP_USER_AGENT"])): ?>
		<meta name="viewport" content="target-densitydpi=device-dpi, width=1114, maximum-scale=1, user-scalable=yes">
		<?php else: ?>
		<meta name="viewport" content="width=1114">
		<?php endif; ?>
		<meta name="google-site-verification" content="Dkjj6-ldyY-rhPQmTu0QgcYkOa5VUAdcRluu_tUY8o8">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon_today.ico">
    	<!-- Open Graph Protocol -->
		<meta property="fb:admins" content="100002986529027">
		<meta property="og:locale" content="ja_JP">
		<meta property="og:type" content="blog">
		<?php
		if (is_single()){
		     if(have_posts()): while(have_posts()): the_post();
		          echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'">';echo "\n";
		     endwhile; endif;
		     echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";
		     echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";
		} else {
		     echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";
		     echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";
		     echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";
		}
		?>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
		<?php
		$str = $post->post_content;
		$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
		if (is_single() or is_page()){
		if (has_post_thumbnail()){
		     $image_id = get_post_thumbnail_id();
		     $image = wp_get_attachment_image_src( $image_id, 'full');
		     echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
		} else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {
		     echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
		} else {
		     echo '<meta property="og:image" content="http://today.izmaker.com/wp-content/uploads/2014/03/ogp_today_140312-e1394618014355.png">';echo "\n";
		}
		} else {
		     echo '<meta property="og:image" content="http://today.izmaker.com/wp-content/uploads/2014/03/ogp_today_140312-e1394618014355.png">';echo "\n";
		}
		?>
		<!-- /Open Graph Protocol -->
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
		<!-- Start of StatCounter Code for Default Guide -->
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
		<!-- End of StatCounter Code for Default Guide -->
		<?php if(is_single()): ?>
		<link href="<?php bloginfo('template_directory'); ?>/css/default.css" rel="stylesheet" media="all">
		<link href="<?php bloginfo('template_directory'); ?>/css/single.css" rel="stylesheet" media="all">
		<?php elseif(is_page(25)): ?>
		<link href="<?php bloginfo('template_directory'); ?>/css/default.css" rel="stylesheet" media="all">
		<link href="<?php bloginfo('template_directory'); ?>/css/privacypolicy.css" rel="stylesheet" media="all">
		<?php elseif(is_page(23)): ?>
		<link href="<?php bloginfo('template_directory'); ?>/css/default.css" rel="stylesheet" media="all">
		<link href="<?php bloginfo('template_directory'); ?>/css/staff.css" rel="stylesheet" media="all">
		<link href="<?php bloginfo('template_directory'); ?>/css/jquery.powertip.css" rel="stylesheet" media="all">
		<?php elseif(is_page(21)): ?>
		<link href="<?php bloginfo('template_directory'); ?>/css/default.css" rel="stylesheet" media="all">
		<link href="<?php bloginfo('template_directory'); ?>/css/about.css" rel="stylesheet" media="all">
		<?php else: ?>
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
		<?php endif; ?>
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- wrapper -->
		<div id="wrapper">
			<!-- header -->
			<header>
				<h1><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" alt="logo" width="594" height="81"></a></h1>
				<nav>
					<div id="navWrap" class="clearfix">
						<div id="navInner" class="clearfix">
							<a id="homeButtom" href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_navi.gif" alt="icon_navi" width="27" height="25"></a>
							<?php wp_nav_menu( array ( 'theme_location' => 'header-nav' ) ); ?>
						</div>
						<?php get_search_form(); ?>
					</div>
				</nav>
			</header>