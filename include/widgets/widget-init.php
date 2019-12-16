<?php
function kgm_widgets_init(){
	register_sidebar(array(
		'name' => '首页侧边栏',
		'id' => 'kgm-home-sidebar',
		'before_widget' => '<aside id="kgm-%1$s" class="kgm-widget kgm-%2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="kgm-widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => '文章侧边栏',
		'id' => 'kgm-post-sidebar',
		'before_widget' => '<aside id="kgm-%1$s" class="kgm-widget kgm-%2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="kgm-widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => '页面侧边栏',
		'id' => 'kgm-page-sidebar',
		'before_widget' => '<aside id="kgm-%1$s" class="kgm-widget kgm-%2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="kgm-widget-title">',
		'after_title' => '</h2>'
	));
}
add_action('widgets_init','kgm_widgets_init');
function kgm_remove_default_widgets(){
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Media_Audio');
	unregister_widget('WP_Widget_Media_Image');
	unregister_widget('WP_Widget_Media_Video');
	unregister_widget('WP_Widget_Media_Gallery');
	unregister_widget('WP_Widget_Text');
}
add_action('widgets_init','kgm_remove_default_widgets');
?>