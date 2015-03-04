<?php
// カスタムメニューを有効化
add_theme_support( 'menus' );
// カスタムメニューの「場所」を設定するコード
register_nav_menu( 'header-nav', 'ヘッダーのメニュー' );
register_nav_menu( 'footer-nav', 'フッターのメニュー' );

//アイキャッチ画像 
add_theme_support( 'post-thumbnails' );
add_image_size( 'thum-entry', 200, 140, true );
add_image_size( 'thum-feature', 164, 115, true );

//投稿一覧にサムネイルの項目を追加
function add_thumbnail_column( $columns ) {
	$post_type = isset( $_REQUEST['post_type'] ) ? $_REQUEST['post_type'] : 'post';
	if ( post_type_supports( $post_type, 'thumbnail' ) ) {
		$columns['thumbnail'] = __( 'Featured Images' );
	}
	return $columns;
}

function display_thumbnail_column( $column_name, $post_id ) {
	if ( $column_name == 'thumbnail' ) {
		if ( has_post_thumbnail( $post_id ) ) {
			echo get_the_post_thumbnail( $post_id, array( 50, 50 ) );
		} else {
			_e( 'none' );
		}
	}
}

add_filter( 'manage_posts_columns', 'add_thumbnail_column' );
add_action( 'manage_posts_custom_column', 'display_thumbnail_column', 10, 2 );

//ビジュアルリッチエディター
add_editor_style();
