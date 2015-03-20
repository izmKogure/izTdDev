<?php get_header(); ?>

	<div id="content" class="site-content clearfix">
		<div id="main" class="site-main" role="main">
			<div id="breadcrumb">
				<?php echo get_breadcrumb_list(); ?>
			</div>
		
			<div id="staff-wrapper">
				<h2><img src="<?php echo get_template_directory_uri(); ?>/images/icon_topics.png" alt="icon_topics" width="16" height="20">スタッフ紹介</h2>
				
			   <?php
				$users = get_users(array(
				    'orderby' => ID,
				    'order'   => ASC,
				    'exclude' => 1,
				));
				
				foreach ($users as $user):
				    $uid      = $user->ID;
				    $userData = get_userdata($uid);
					echo '<dl>';
				    echo '<dt><div class="staff-avatar">';
				    echo get_avatar($uid, 60);
				    echo '</div></dt>';
				    echo '<dd class="first-child"><p class="staff-name">' . $user->display_name . '</p></dd>';
					echo '<dd><p class="staff-worker">' . $user->worker . '</p></dd>';
					echo '<dd>' . '投稿数:' .count_user_posts( $user->ID ) . '</dd>';
				    echo '<dd><p>' . $userData->user_description . '</p></dd>';
				    echo '<dd>';
				    if (count_user_posts($uid) > 0):
				        echo '<a class="userposts" href="' . get_bloginfo(url) . '/?author=' . $uid . '">' . $user->display_name . 'の全ての投稿を見る</a>';
				    else:
				        echo '<span class="userposts-noposts">' . $user->display_name . 'の投稿は、まだありません。</span>';
				    endif;
				    echo '</dd>';
					echo '</dl>';
				endforeach;
				?>
			</div><!-- #staff-wrapper -->
		
		</div><!-- #main -->
<?php get_sidebar(); ?>
	</div><!-- #content -->
<?php get_footer(); ?>