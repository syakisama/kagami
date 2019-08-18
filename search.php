<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<div class="row">
			<div class="col-12 kgm-main kgm-search">
				<header class="kgm-search-header">
					<h2 class="kgm-search-header-title"><i class="fa fa-search" aria-hidden="true"></i>搜索</h2>
					<?php global $wp_query;?>
					<span class="kgm-search-header-count">关键词[<?php echo(esc_html($wp_query->query_vars['s']));?>]共找到<?php echo $wp_query->found_posts; ?>个结果</span>
				</header>
				<?php if(have_posts()): ?>
					<?php kgm_view_post::the_postlist_start(); ?>
					<?php kgm_view_post::the_card($posts); ?>
					<?php kgm_view_post::the_postlist_end(); ?>
				<?php endif; ?>
			</div>
			<div class="clearfix"></div>
			<div class="col-12">
				<nav class="kgm-search-pagination">
					<?php kgm_view_post::kgm_pages($paged, $wp_query, null, 3); ?>
				</nav>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>