<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<div class="row">
			<div class="col-8 kgm-main">
				<div class="kgm-post-content">
					<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
						<?php the_content(); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-4 kgm-sidebar">2</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>