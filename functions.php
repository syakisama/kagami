<?php
define('kgm_version', '2019');
/**加载css及javascript**/
function kgm_scripts(){
	wp_enqueue_style('kgm_awesome','https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css',array(),'4.7.0');
	wp_enqueue_style('kgm_style',get_template_directory_uri().'/style.css',array(),kgm_version);
	wp_enqueue_script('kgm_jquery','https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js',array(),'3.3.1',true);
	wp_enqueue_script('kgm_timeago','https://cdn.jsdelivr.net/npm/timeago.js@4.0.0-beta.2/dist/timeago.min.js',array(),'4.0.0',true);
	wp_enqueue_script('kgm_app',get_template_directory_uri().'/static/js/app.js',array(),kgm_version,true);
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
function kgm_register_menus() {
	register_nav_menus([
		'kgm-primary-menu-logout' => __('kagami - 顶部菜单(登陆前)'),
		'kgm-primary-menu-login' => __('kagami - 顶部菜单(登陆后)'),
	]);
}
add_action('after_setup_theme','kgm_register_menus');

require_once(get_template_directory().'/include/functions/custom-navwalker/custom-navwalker.php');

require_once(get_template_directory().'/include/ashuwp-framework/ashuwp_framework_core.php');
require_once(get_template_directory().'/include/functions/theme-setting/theme-setting.php');

require_once(get_template_directory().'/include/widgets/widget-init.php');
require_once(get_template_directory().'/include/functions/view-post/view-post.php');

function simple_comment($comment, $args, $depth) {?>
	<section id="kgm-comment-item-<?php echo $comment->comment_ID; ?>" class="grid-container kgm-comment-item">
		<div class="kgm-comment-item-avatar">
			<?php echo get_avatar($comment, 48, '', '', array('class'=>'kgm-comment-item-avatar-img')); ?>
		</div>
		<div class="kgm-comment-item-body">
			<header class="kgm-comment-item-header">
				<span class="kgm-comment-item-header-author"><?php echo $comment->comment_author; ?></span>
				<date class="kgm_timeago_render kgm-comment-item-header-time" datetime="<?php echo $comment->comment_date; ?>"></date>
				<?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="fa fa-comments-o" aria-hidden="true"></i>','depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
			</header>
			<div class="clearfix"></div>
			<div class="kgm-comment-item-content">
				<?php echo $comment->comment_content; ?>
			</div>
			<?php if($comment->comment_parent): $parent_comment=get_comment($comment->comment_parent);?>
				<div class="gird-container kgm-comment-item-parent">
					<a class="kgm-comment-item-parent-author">@<?php echo $parent_comment->comment_author; ?>:</a>
					<span class="kgm-comment-item-parent-content"><?php echo $parent_comment->comment_content; ?></span>
					<?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="fa fa-comments-o" aria-hidden="true"></i>','depth' => $depth, 'max_depth' => $args['max_depth'])),$parent_comment); ?> 
				</div>
			<?php endif; ?>				
		</div>
	</section>
<?php
}
?>