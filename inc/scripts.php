<?php
//JavaScript
if (!is_admin()) {
	function register_script(){
		wp_register_script('sticky-scroll', get_bloginfo('template_directory').'/js/sticky-scroll.js');
	}
	function add_script() {
		register_script();
		if (is_single()) {
			wp_enqueue_script('sticky-scroll');
		}
	}
	add_action('wp_print_scripts', 'add_script');
}

//css
function register_style() {
	wp_register_style('single', get_bloginfo('template_directory').'/css/single.css');
	wp_register_style('privacypolicy', get_bloginfo('template_directory').'/css/privacypolicy.css');
	wp_register_style('about', get_bloginfo('template_directory').'/css/about.css');
	wp_register_style('staff', get_bloginfo('template_directory').'/css/staff.css');
}
	function add_stylesheet() {
		register_style();
		// 個別投稿 (ID=single)
		if (is_single()) {
			wp_enqueue_style('single');
		}
		// 個人情報保護方針 (ID=privacypolicy)
		elseif (is_page(array('privacypolicy'))) {
			wp_enqueue_style('privacypolicy');
		}
		// お問い合わせ (ID=about)
		elseif (is_page(array('about'))) {
			wp_enqueue_style('about');
		}
		// スタッフ紹介(ID=staff)
		elseif (is_page(array('staff'))) {
			wp_enqueue_style('staff');
		}
	}
add_action('wp_print_styles', 'add_stylesheet');
