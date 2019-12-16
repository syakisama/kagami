<?php
/*
Template Name: Dialog测试
*/
?>
<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<div class="row">
			<div class="col-12 kgm-main" style="min-height: 80vh;"></div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>
<!--dialog-->
<div>
	<div class="kgm-dialog-overlay"></div>
	<div class="kgm-dialog">
		<div class="kgm-dialog-container" style="width: 40rem;">
			<header class="kgm-dialog-header">
				<div class="kgm-dialog-header-title kgm-text-color-gray"><i class="fa fa-comments" aria-hidden="true"></i>发表评论</div>
				<a class="kgm-dialog-header-close"><i class="fa fa-times" aria-hidden="true"></i></a>
			</header>
			<div class="kgm-dialog-content">
				Body
			</div>
			<footer class="kgm-dialog-footer">
				footer
			</footer>
		</div>
	</div>
</div>
<script src="<?php echo get_template_directory_uri().'/static/js/dialog.js'; ?>"></script>