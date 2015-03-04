<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php ogp_prefix(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
		
<?php if(preg_match("/Android/", $_SERVER["HTTP_USER_AGENT"])): ?>
			
	<meta name="viewport" content="target-densitydpi=device-dpi, width=1114, maximum-scale=1, user-scalable=yes">
		
<?php else: ?>
			
	<meta name="viewport" content="width=1114">
		
<?php endif; ?><!-- viewport -->
		
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon_today.ico">
						
<?php wp_head(); ?>
		
</head>
	
<body <?php body_class(); ?>>
<div id="page">
			
	<header id="header" role="banner">
		<div class="logo">
			<a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" alt="logo" width="594" height="81"></a>
		</div>
		<nav id="global" role="navigation">
			<div class="nav-wrapper clearfix">
				<div class="nav-inner clearfix">
					<span class="home-buttom">
						<a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_navi.gif" alt="icon_navi" width="27" height="25"></a>
					</span>
					<?php wp_nav_menu( array ( 'theme_location' => 'header-nav' ) ); ?>
				</div>
				<?php get_search_form(); ?>
			</div>
		</nav>
	</header>