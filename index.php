<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<div class="row">
			<div class="col-9 kgm-main">
				<?php kgm_view_post::show_articlebox(kgm_theme_setting::get_option('home_articlebox')); ?>
			</div>
			<div class="col-3 kgm-sidebar">
				<?php dynamic_sidebar('kgm-home-sidebar'); ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>