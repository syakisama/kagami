<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<div class="row">
			<div class="col-9 kgm-main">
				<article class="kgm-post-content">
					<h1 class="kgm-post-content-title"><?php echo $post->post_title; ?></h1>
					<header class="kgm-post-content-header">
						<span class="kgm-post-content-header-category"><i class="fa fa-folder-open" aria-hidden="true"></i><?php the_category(',');?></span>
						<span class="kgm-post-content-header-time"><i class="fa fa-clock-o" aria-hidden="true"></i><time class="kgm_timeago_render" datetime="<?php echo $post->post_date; ?>"></time></span>
						<a class="kgm-post-content-header-author" href="<?php echo get_the_author_meta('user_url',$post->author); ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo get_the_author_meta('nickname',$post->post_author); ?></a>
						<span class="kgm-post-content-header-view"><i class="fa fa-play-circle-o" aria-hidden="true"></i>12345</span>
						<span class="kgm-postlist-list-meta-comment"><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo $post->comment_count; ?></span>
						<span class="kgm-post-content-header-like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>1234</span>
					</header>
					<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
						<?php the_content(); ?>
					<?php endif; ?>
				</article>
				<?php comments_template(); ?>
			</div>
			<div class="col-3 kgm-sidebar">
				<?php dynamic_sidebar('kgm-post-sidebar'); ?>
			</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>