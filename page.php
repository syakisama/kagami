<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<div class="row">
			<div class="col-9 kgm-main">
				<article class="kgm-post-content">
					<h1 class="kgm-post-content-title"><?php echo $post->post_title; ?></h1>
					<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
						<?php the_content(); ?>
					<?php endif; ?>
				</article>
				<?php comments_template(); ?>
			</div>
			<div class="col-3 kgm-sidebar">
				<?php dynamic_sidebar('kgm-page-sidebar'); ?>
			</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>