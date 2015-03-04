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
					$users = get_users(array(
						'orderby' => ID,
						'order' => ASC,
						'exclude' => 11,
					));
					echo '<ul class="users">';
					
					foreach($users as $user):
						if($user->ID !==1):
						$uid = $user->ID;
						$userData = get_userdata($uid);
						echo '<li class="author-info">';
						echo '<div class="avatar">';
						echo get_avatar($uid, 100);
						echo '</div>';
						echo '<div class="description">';
						echo '<span class="name"><a href="' . get_bloginfo(url) . '/?author=' . $uid . '">' . $user->display_name . '</a></span>';
						echo '<p>' . $userData->user_description . '</p>';
						echo '</div>';
						echo '</li>';
						endif;
					endforeach;
					echo '</ul>';
				?>
				
				</div>
			</div><!-- #staff-wrapper -->
		
		</div><!-- #main -->
<?php get_sidebar(); ?>
	</div><!-- #content -->
<?php get_footer(); ?>