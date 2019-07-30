<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<?php
			$general_options = get_option('ashuwp_kgm_theme_setting');
			$article_boxs = $general_options['kgm_home_article_box'];
		?>
		<div class="row">
			<div class="col-9 kgm-main">
				<?php kgm_view_post::show_articlebox($article_boxs); ?>
			</div>
			<div class="col-3 kgm-sidebar">
				<?php dynamic_sidebar('kgm-home-sidebar'); ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>