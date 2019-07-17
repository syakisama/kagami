<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<?php
			$general_options = get_option('ashuwp_kgm_theme_setting');
			$article_boxs = $general_options['kgm_option_article_box'];
		?>
		<div class="row">
			<div class="col-8 kgm-main">
				<?php kgm_view_article_box::show($article_boxs); ?>
			</div>
			<div class="col-4 kgm-sidebar">2</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>