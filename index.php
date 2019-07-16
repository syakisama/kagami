<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<?php
			$general_options = get_option('ashuwp_kgm_theme_setting');
			$article_boxs = $general_options['kgm_option_article_box'];
		?>
		<div class="row">
			<div class="col-8 kgm-main">
				<?php if(is_array($article_boxs) && count($article_boxs) > 0): ?>
					<?php foreach($article_boxs as $article_box): ?>
						<?php if($article_box['category'] && $article_box['category']>0):
							  if(!$article_box['number'] || $article_box['number']<1){
							  	$article_box['number'] = 8;
							  }
						?>
						<?php kgm_view_article_box::the_card($article_box['category'], $article_box['icon'], $article_box['number'], $article_box['title']); ?>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php else: ?>
				<?php endif; ?>
			</div>
			<div class="col-4 kgm-sidebar">2</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>