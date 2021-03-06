<?php
//投稿者がパスワードで保護されている場合は、コメントを表示しません
if(post_password_required()){
	return;
}
?>

<h3 class="comments-title">コメント&nbsp;(<?php echo get_comments_number(); ?>件)</h4>
<div class="comments-inner">
	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$comments_args = array(
		'fields' => array(
			'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><br> ' .
	            			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p><br>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><br><span style="color:#999999; font-size:0.8em">※メールアドレスは表示されません</span><br> ' .
	            			'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p><br>',
	),
			'must_log_in'   => '',
			'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p><br>',
			'comment_notes_before' => '',
 			'comment_notes_after' => '',
			'label_submit'  => 'コメント送信',
	);
	comment_form($comments_args);
	?><!-- #content -->	
	
	<?php if(have_comments()): ?>
		<ol class="commetns-list">
			<?php
			 wp_list_comments(array(
			 'format' => 'html5'
			 ));
			?>
		</ol>
		
		<?php
		if(get_comment_pages_count() > 1 && get_option('page_comments')):
		?>
		<nav class="comments-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link('&laquo;古いコメントへ'); ?></div>
			<div class="nav-next"><?php next_comments_link('新しいコメントへ&raquo;'); ?></div>
		</nav><!-- .comment navigation -->	
		<?php endif; ?>
	<?php endif; ?>
</div>

<div class="comment-page-link">
<?php paginate_comments_links(); ?>
</div>
