<?php get_header(); ?>

	<div id="content" class="site-content clearfix">
		<div id="main" class="site-main" role="main">
			<div id="breadcrumb">
				<?php echo get_breadcrumb_list(); ?>
			</div>
		
			<div id="staff-wrapper">
				<h2><img src="<?php echo get_template_directory_uri(); ?>/images/icon_topics.png" alt="icon_topics" width="16" height="20">スタッフ紹介</h2>
				
				<div class="staff-content clearfix">
					<?php
						$blogusers = get_users(array(
						        'orderby' => ID,
						        'order'   => ASC,
						        'exclude' => 1,
						    )
						);
						
						foreach ( $blogusers as $user ) {
							echo '<div class="avatar">' . get_avatar( $user->ID, 200 ) . '</div>';
						    echo '<div class="name">' . esc_html( $user->display_name ) . '</div>';
							echo '<div class="worker">' . esc_html( $user->worker ) . '</div>';
							echo '<p>' . '投稿数:' .count_user_posts( $user->ID ) . '</p>';
							echo '<p>' . esc_html( $user->user_description ) . '</p>';
						}
					?>
				</div>
			</div><!-- #staff-wrapper -->
		
		</div><!-- #main -->
<?php get_sidebar(); ?>
	</div><!-- #content -->
<?php get_footer(); ?>