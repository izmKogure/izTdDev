<?php
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
