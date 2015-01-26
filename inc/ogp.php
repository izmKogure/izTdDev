<?php
function ogp_prefix() {
  if (!is_admin()) {
    $ogp_ns = 'og: http://ogp.me/ns#';
    $fb_ns  = 'fb: http://ogp.me/ns/fb#';

    if (!is_singular()) {
      $type_ns = 'website: http://ogp.me/ns/website#';
    } else {
      $type_ns = 'article: http://ogp.me/ns/article#';
    }
    printf('prefix="%1$s %2$s %3$s"', $ogp_ns, $fb_ns, $type_ns);
  }
}

function ogp_meta() {
  if (!is_admin()) {

    global $post;
    $format = '<meta property="%1$s" content="%2$s">';
    $type = 'website';
    $url = esc_url(home_url('/'));
    $site_name = esc_attr(get_option('blogname'));
    $title = $site_name;
    $image = 'http://d3akba2hxt0ogm.cloudfront.net/wp-content/uploads/2014/03/ogp_today_140312-300x300.png';
    $description = esc_attr(get_option('blogdescription'));
    $app_id = '100002986529027';

    if (is_singular()) {
      $type = 'article';
      $url = esc_url(get_permalink($post->ID));
      $title = esc_attr($post->post_title);
      $description  = strip_tags($post->post_excerpt ? $post->post_excerpt : $post->post_content);
      $description  = mb_substr($description, 0, 90) . '...';
      if (function_exists('has_post_thumbnail') AND has_post_thumbnail($post->ID)) {
        $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        $image = esc_url($attachment[0]);
      } elseif (preg_match('/<img\s[^>]*src=["\']?([^>"\']+)/i', $post->post_content, $match)) {
        $image = esc_url($match[1]);
      }
      $publisher = 'https://www.facebook.com/izmaker';
      printf($format, 'article:publisher', $publisher);
    }

    $args = array(
      'og:type'  => $type,
      'og:url'   => $url,
      'og:title' => $title,
      'og:image' => $image,
      'og:site_name' => $site_name,
      'og:description' => $description,
      'fb:app_id'      => $fb_app_id
    );
    foreach ($args as $key => $value) {
      printf($format, $key, $value);
    }
  }
}
add_action('wp_head', 'ogp_meta');
