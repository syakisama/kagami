<?php
define('kgm_version', '2019');
/**加载css及javascript**/
function kgm_scripts(){
	wp_enqueue_style('kgm_awesome','https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css',array(),'4.7.0');
	wp_enqueue_style('kgm_style',get_template_directory_uri().'/style.css',array(),kgm_version);
	wp_enqueue_script('kgm_jquery','https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js',array(),'3.3.1',true);
	wp_enqueue_script('gym_function',get_template_directory_uri().'/static/js/app.js',array(),kgm_version,true);
	wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts','kgm_scripts');

/**移除window._wpemojiSettings**/
remove_action( 'admin_print_scripts', 'print_emoji_detection_script');
remove_action( 'admin_print_styles', 'print_emoji_styles');
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'wp_print_styles', 'print_emoji_styles');
remove_filter( 'the_content_feed', 'wp_staticize_emoji');
remove_filter( 'comment_text_rss', 'wp_staticize_emoji');
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email');

/**移除用户默认顶部工具条**/
add_filter('show_admin_bar', '__return_false');

/**移除wp_embed功能**/
require_once(get_template_directory().'/include/functions/disable-wp-embed/disable-wp-embed.php');

/**菜单注册**/
function kagm_register_menus() {
	register_nav_menus([
		'kgm-primary-menu-logout' => __('kagami - 顶部菜单(登陆前)'),
		'kgm-primary-menu-login' => __('kagami - 顶部菜单(登陆后)'),
	]);
}
add_action('after_setup_theme','kagm_register_menus');

require_once(get_template_directory().'/include/functions/custom-navwalker/custom-navwalker.php');
?>