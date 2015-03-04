<?php
// favicon表示(管理画面)
function admin_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_stylesheet_directory_uri().'/images/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon');

//プロフィール項目を追加
function my_new_contactmethods( $contactmethods ) {
$contactmethods['worker'] = '担当';
return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);

//カテゴリー選択の制限
add_action( 'admin_print_footer_scripts', 'limit_category_select' );
function limit_category_select() {
	?>
	<script type="text/javascript">
		jQuery(function($) {
			// 投稿画面のカテゴリー選択を制限
			var cat_checklist = $('.categorychecklist input[type=checkbox]');
			cat_checklist.click( function() {
				$(this).parents('.categorychecklist').find('input[type=checkbox]').attr('checked', false);
				$(this).attr('checked', true);
			});
			
			// クイック編集のカテゴリー選択を制限
			var quickedit_cat_checklist = $('.cat-checklist input[type=checkbox]');
			quickedit_cat_checklist.click( function() {
				$(this).parents('.cat-checklist').find('input[type=checkbox]').attr('checked', false);
				$(this).attr('checked', true);
			});
		    
			$('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before('<p>カテゴリーは1つしか選択できません</p>');
		});
	</script>
	<?php
}

//親カテゴリーのチェックボックスを非表示
require_once(ABSPATH . '/wp-admin/includes/template.php');
class Danda_Category_Checklist extends Walker_Category_Checklist {
 
     function start_el( &$output, $category, $depth, $args, $id = 0 ) {
        extract($args);
        if ( empty($taxonomy) )
            $taxonomy = 'category';
 
        if ( $taxonomy == 'category' )
            $name = 'post_category';
        else
            $name = 'tax_input['.$taxonomy.']';
 
        $class = in_array( $category->term_id, $popular_cats ) ? ' class="popular-category"' : '';
        //親カテゴリの時はチェックボックス表示しない
        if($category->parent == 0){
               $output .= "\n<li id='{$taxonomy}-{$category->term_id}'$class>" . '<label class="selectit">' . esc_html( apply_filters('the_category', $category->name )) . '</label>';
        }else{
            $output .= "\n<li id='{$taxonomy}-{$category->term_id}'$class>" . '<label class="selectit"><input value="' . $category->term_id . '" type="checkbox" name="'.$name.'[]" id="in-'.$taxonomy.'-' . $category->term_id . '"' . checked( in_array( $category->term_id, $selected_cats ), true, false ) . disabled( empty( $args['disabled'] ), false, false ) . ' /> ' . esc_html( apply_filters('the_category', $category->name )) . '</label>';
        }
    }
 
}
function lig_wp_category_terms_checklist_no_top( $args, $post_id = null ) {
    $args['checked_ontop'] = false;
    $args['walker'] = new Danda_Category_Checklist();
    return $args;
}
add_action( 'wp_terms_checklist_args', 'lig_wp_category_terms_checklist_no_top' );

//サイト内検索の対象を投稿記事のみ（固定ページを除外）にする
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','SearchFilter');

//記事内のリンクをすべて新しいタブで開く
function autoblank($text) {
$return = str_replace('<a', '<a target="_blank"', $text);
return $return;
}
add_filter('the_content', 'autoblank');

//nofollow属性をつける
function no_follow($text) {
$return = str_replace('<a', '<a rel="nofollow external"', $text);
return $return;
}
add_filter('the_content', 'no_follow');

//body_class()にページスラッグを追加する
function pagename_class($classes = '') {
    if (is_page()) {
        $page = get_page(get_the_ID());
        $classes[] = 'page-' . $page->post_name;
        if ($page->post_parent) {
            $classes[] = 'page-' . get_page_uri($page->post_parent) . '-child';
       }
  }
  return $classes;
}
add_filter('body_class', 'pagename_class');

//Newアイコンを画像で表示する
function add_new($date,$days){
	$today = date_i18n('U');
	$elapsed = date('U',($today - $date)) / 86400;
	if( $days > $elapsed ){
		echo '<img class="add_new" src="' . get_template_directory_uri() .'/images/icon_new.png">';
	}
}
