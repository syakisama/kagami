<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<div class="row">
			<div class="col-12 kgm-main kgm-archive">
				<header class="kgm-archive-header">
					<?php if(is_category()): ?>
						<h2 class="kgm-archive-header-title"><?php echo single_cat_title('', false); ?></h2>
					<?php elseif(is_tag()): ?>
						<h2 class="kgm-archive-header-title"><i class="fa fa-tag" aria-hidden="true"></i><?php echo single_cat_title('', false); ?></h2>
					<?php elseif(is_day()): ?>
						<h2 class="kgm-archive-header-title">文章归档: <?php echo get_the_date() ?></h2>
					<?php elseif(is_month()): ?>
						<h2 class="kgm-archive-header-title">文章归档: <?php echo get_the_date('Y年M'); ?></h2>
					<?php elseif(is_year()): ?>
						<h2 class="kgm-archive-header-title">文章归档: <?php echo get_the_date('Y年'); ?></h2>
					<?php endif; ?>
				</header>
				<?php if(have_posts()): ?>
					<?php kgm_view_post::the_postlist_start(); ?>
					<?php kgm_view_post::the_card($posts); ?>
					<?php kgm_view_post::the_postlist_end(); ?>
				<?php endif; ?>
			</div>
			<div class="clearfix"></div>
			<div class="col-12">
				<nav class="kgm-archive-pagination">
					<?php kgm_view_post::kgm_pages($paged, $wp_query, null, 3); ?>
				</nav>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>