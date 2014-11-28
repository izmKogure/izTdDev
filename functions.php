<?php
//ナビゲーション 
add_theme_support( 'menus' );
register_nav_menu( 'header-nav', 'ヘッダーのナビゲーション' );
register_nav_menu( 'footer-nav', 'フッターのナビゲーション' );

//アイキャッチ
add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 200, 140, true );

// 投稿記事一覧にアイキャッチ画像を表示
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

// フィルタの登録
add_filter('content_save_pre','test_save_pre');
 
function test_save_pre($content){
    global $allowedposttags;
 
    // iframeとiframeで使える属性を指定する
    $allowedposttags['iframe'] = array('class' => array () , 'src'=>array() , 'width'=>array(),
    'height'=>array() , 'frameborder' => array() , 'scrolling'=>array(),'marginheight'=>array(),
    'marginwidth'=>array());
 
    return $content;
}

//ビジュアルリッチエディター
add_editor_style();

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

//新規カテゴリーを追加とよく使うものを削除
function hide_category_tabs_adder() {
	global $pagenow;
	global $post_type;
	if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')){
		echo '<style type="text/css">
		#category-tabs, #category-adder {display:none;}
		#xxx-tabs, #xxx-adder {display:none;}
		
		.categorydiv .tabs-panel {padding: 0 !important; background: none; border: none !important;}
		</style>';
	}
}
add_action( 'admin_head', 'hide_category_tabs_adder' );


//カテゴリーのスクロールバーを非表示にする
function my_head() {
echo <<< EOF
<style type="text/css">
div.tabs-panel{
    max-height: 100% !important;
}
</style>
EOF;
}
add_action('admin_head', 'my_head');

//管理画面のロゴを変更
function my_custom_logo() {
	echo '<style type="text/css">#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before { content: ""; display: block; width: 18px; height: 18px; background: url('.get_bloginfo('template_directory').'/images/icon_izmaker.png) no-repeat 0 0;}</style>';
}
add_action('admin_head', 'my_custom_logo');

//アバターの画像説明を非表示
add_action('admin_print_styles', 'admin_th_css_custom');
function admin_th_css_custom() {
   echo '<style>table.form-table:nth-of-type(5) tr:nth-child(2) th[scope="row"] {display: none;}</style>';
}

add_action('admin_print_styles', 'admin_td_css_custom');
function admin_td_css_custom() {
   echo '<style>table.form-table:nth-of-type(5) tr:nth-child(2) td[colspan="2"] {display: none;}</style>';
}

//管理画面のファビコンを変更
function admin_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('template_url').'/images/favicon_today.ico" />';
}
add_action('admin_head', 'admin_favicon');

//サイト内検索の対象を投稿記事のみ（固定ページを除外）にする
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','SearchFilter');

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

// リッチテキストエディタに表示項目を追加する
function ilc_mce_buttons($buttons){
    // 背景・コピー・カット・ペースト・フォントサイズを追加
    array_push($buttons, "backcolor", "copy", "cut", "paste", "fontsizeselect");
    return $buttons;
}
add_filter("mce_buttons", "ilc_mce_buttons");

// ポストタイプ別に複数のCSSを使用
function custom_editor_style() {
    global $current_screen;
    switch ($current_screen->post_type) {
    // 投稿ページ
    case 'post':
        add_editor_style('css/editor_style_post.css');
        break;
    }
}
add_action('admin_head', 'custom_editor_style');

//管理者以外にアップデートのお知らせ非表示
if (!current_user_can('edit_users')) {
  function wphidenag() {
    remove_action( 'admin_notices', 'update_nag');
  }
  add_action('admin_menu','wphidenag');
}

//コメントフォーム内の注意書きを削除
add_filter( "comment_form_defaults", "my_comment_notes_after");
function my_comment_notes_after( $defaults){
    $defaults['comment_notes_after'] = '';
    return $defaults;
}

// 「コメントを残す」を削除
add_filter( 'comment_form_defaults', 'my_title_reply');
function my_title_reply( $defaults){
    $defaults['title_reply'] = '';
    return $defaults;
}

//「メールアドレスが公開されることはありません。 * が付いている欄は必須項目です」を削除
add_filter( "comment_form_defaults", "my_comment_notes_before");
function my_comment_notes_before( $defaults){
    $defaults['comment_notes_before'] = '';
    return $defaults;
}

//自動リンクを無効化する
remove_filter( 'comment_text', 'make_clickable', 9);

//head要素を削除
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);

//コンテンツ幅を設定
if ( ! isset( $content_width ) ) $content_width = 1074;

//RSS2のフィードリンク
add_theme_support( 'automatic-feed-links' );

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

//パンくずリスト
function get_breadcrumb_list($include_category = 1, $include_tag = 1, $include_taxonomy = 1)
{
    $base_breadcrumb = '<li><a href="'.get_home_url().'">izmaker Today</a></li>';
    $top_url = get_home_url(null,'/');
    global $query_string;
    global $post;
    query_posts($query_string);
    if (have_posts()) : while(have_posts()) : the_post();
    endwhile; endif;
    wp_reset_query();
    if(get_query_var('paged') == 0): $page = 1; else: $page = get_query_var('paged') ; endif;
    if(is_singular() && !is_attachment())
    {      
        $categories = get_the_category();       
        if(!empty($categories))
        {
            $category_count = count($categories);
            $loop = 1;
            $category_list = '';
            foreach($categories as $category)
            {             
                if($include_category === 1)
                {
                    $category_list .= '<a href="'.$top_url.esc_html($category->taxonomy).'/'.esc_html($category->slug).'/">'.esc_html($category->name).'</a>';
                }            
                else
                {
                    $category_list .= '<a href="'.$top_url.esc_html($category->slug).'/">'.esc_html($category->name).'</a>';
                }              
                if($loop != $category_count)
                {
                    $category_list .= ' / ';
                }
                ++$loop;
            }
        }       
        else
        {
            $category_list = null;
        }       
        $tags = get_the_tags();       
        if(!empty($tags))
        {
            $tags_count = count($tags);
            $loop=1;
            $tag_list = '';
            foreach($tags as $tag)
            {               
                if($include_tag === 1)
                {
                    $tag_list .= '<a href="'.$top_url.esc_html($tag->taxonomy).'/'.esc_html($tag->slug).'/">'.esc_html($tag->name).'</a>';
                }             
                else
                {
                    $tag_list .= '<a href="'.$top_url.esc_html($tag->slug).'/">'.esc_html($tag->name).'</a>';
                }               
                if($loop !== $tags_count)
                {
                    $tag_list .= ' / ';
                }
                ++$loop;
            }
        }      
        else
        {
            $tag_list = null;
        }       
        $taxonomies = get_the_taxonomies();       
        if(!empty($taxonomies))
        {
            $term_list = '';
            $taxonomies_count = count($taxonomies);
            $taxonomies_loop = 1;
            foreach(array_keys($taxonomies) as $key)
            {               
                $terms = get_the_terms($post->ID, $key);
                $terms_count = count($terms);
                $loop = 1;
                foreach($terms as $term)
                {                  
                    if($include_taxonomy === 1)
                    {
                        $term_list .= '<a href="'.$top_url.esc_html($term->taxonomy).'/'.esc_html($term->slug).'/">'.esc_html($term->name).'</a>';
                    }                  
                    else
                    {
                        $term_list .= '<a href="'.$top_url.esc_html($term->slug).'/">'.esc_html($term->name).'</a>';
                    }                 
                    if($loop != $terms_count)
                    {
                        $term_list .= ' / ';
                    }
                    ++$loop;
                }          
                if($taxonomies_loop != $taxonomies_count)
                {
                    $term_list .= ' / ';
                }
                ++$taxonomies_loop;
            }
        }
        else
        {
            $term_list = null;
        }
    }
    $breadcrumb_lists = $base_breadcrumb;
 
    if(is_home())
    {
        $breadcrumb_lists = '<li>izmaker Today</li>';
    }
    elseif(is_post_type_archive())
    {       
        if($page > 1)
        {
            $breadcrumb_lists .= '<li>'.esc_html(get_post_type_object( get_post_type() )->label).'の記事一覧('.$page.'ページ目)</li>';
        }       
        else
        {
            $breadcrumb_lists .= '<li>'.esc_html(get_post_type_object( get_post_type() )->label).'の記事一覧</li>';
        }
    }
    elseif(is_archive())
    {
        if(is_year())
        {
            if($page > 1)
            {
                $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年")).'の記事一覧('.$page.'ページ目)</li>';
            }            
            else
            {
                $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年")).'の記事一覧</li>';
            }
        }     
        elseif(is_month())
        {           
            if($page > 1)
            {
                $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年m月")).'の記事一覧('.$page.'ページ目)</li>';
            }          
            else
            {
                $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年m月")).'の記事一覧</li>';
            }
        }      
        elseif(is_day())
        {          
            if($page > 1)
            {
                $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年m月d日")).'の記事一覧('.$page.'ページ目)</li>';
            }            
            else
            {
                $breadcrumb_lists .= '<li>'.esc_html(get_the_time("Y年m月d日")).'の記事一覧</li>';
            }
        }      
        elseif(is_category())
        {          
            if($page > 1)
            {
                $breadcrumb_lists .= '<li>'.esc_html(single_cat_title('',false)).'の記事一覧('.$page.'ページ目)</li>';
            }           
            else
            {
                $breadcrumb_lists .= '<li>'.esc_html(single_cat_title('',false)).'の記事一覧</li>';
            }
        }        
        elseif(is_tag())
        {         
            if($page > 1)
            {
                $breadcrumb_lists .= '<li>'.esc_html(single_tag_title('',false)).'の記事一覧('.$page.'ページ目)</li>';
            }          
            else
            {
                $breadcrumb_lists .= '<li>'.esc_html(single_tag_title('',false)).'の記事一覧</li>';
            }
        }      
        elseif(is_tax())
        {           
            if($page > 1)
            {
                $breadcrumb_lists .= '<li>'.esc_html(single_term_title('',false)).'の記事一覧('.$page.'ページ目)</li>';
            }           
            else
            {
                $breadcrumb_lists .= '<li>'.esc_html(single_term_title('',false)).'の記事一覧</li>';
            }
        }
    }  
    elseif(is_single())
    {        
        if(get_query_var('page') == 0): $page = 1; else: $page = get_query_var('page') ; endif;      
        if(get_post_type() === 'post')
        {         
            $seo_title = esc_html(get_post_meta($post->ID, 'seo_title', true));           
            if(!empty($category_list))
            {
                $breadcrumb_lists .= '<li>'.$category_list.'</li>';
            }           
            if($page > 1)
            {              
                if(!empty($seo_title))
                {
                    $breadcrumb_lists .= '<li>'.$seo_title.'</li>';
                }             
                else
                {                  
                    if(function_exists('get_current_split_string'))
                    {
                        $split_title = esc_html(get_current_split_string($page));
                    }
                    else
                    {
                        $split_title = null;
                    }                   
                    if(!empty($split_title))
                    {
                        $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'【'.$split_title.'】</li>';
                    }                  
                    else
                    {
                        $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'('.$page.'ページ目)</li>';
                    }
                }
            }          
            else
            {              
                if(!empty($seo_title))
                {
                    $breadcrumb_lists .= '<li>'.$seo_title.'</li>';
                }      
                else
                {
                    $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'</li>';
                }
            }
        }
        else
        {
            if(!empty($term_list))
            {
                $breadcrumb_lists .= '<li>'.$term_list.'</li>';
            }
            $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'</li>';
        }
    }
    elseif(is_page())
    {
        $breadcrumb_lists .= '<li>'.esc_html(get_the_title()).'</li>';
    }
    elseif(is_search())
    {
        if($page > 1)
        {
            $breadcrumb_lists .= '<li>「'.esc_html(get_search_query()).'」で検索した結果一覧('.$page.'ページ目)</li>';
        }
        else
        {
            $breadcrumb_lists .= '<li>「'.esc_html(get_search_query()).'」で検索した結果一覧</li>';
        }
    }
    elseif(is_404())
    {
        $breadcrumb_lists .= '<li>お探しのページは見つかりませんでした</li>';
    }
    else
    {
        $breadcrumb_lists = $base_breadcrumb;
    }
    if(!empty($breadcrumb_lists))
    {
        $breadcrumb_lists = '<ul>'.$breadcrumb_lists.'</ul>';
    }
 
    return $breadcrumb_lists;
}
