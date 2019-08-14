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
				<?php kgm_view_post::kgm_pages($paged, $wp_query, null, $range = 5); ?>
			</div>
			<div class="clearfix"></div>
			<div class="col-12">
				<nav style="text-align: center;">
				  <ul class="kgm-pagination" style="text-align: center;">
				    <li class="kgm-pagination-item">
				      <a href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li class="kgm-pagination-item"><a href="#">1</a></li>
				    <li class="kgm-pagination-item"><a href="#">2</a></li>
				    <li class="kgm-pagination-item"><a href="#">3</a></li>
				    <li class="kgm-pagination-item"><a href="#">4</a></li>
				    <li class="kgm-pagination-item"><a href="#">5</a></li>
				    <li class="kgm-pagination-item">
				      <a href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>