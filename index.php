<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<?php
			$general_options = get_option('ashuwp_kgm_theme_setting');
			$article_boxs = $general_options['kgm_option_article_box'];
			var_dump($article_boxs);
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
							<?php $posts = get_posts('category='.$article_box['category'].'&numberposts='.$article_box['number']); ?>
							<?php if( $posts ) : ?>
								<div class="grid-container kgm-post-list">
									<h2 class="kgm-post-list-title"><?php echo $article_box['title']; ?></h2>
									<div class="row">
										<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
											<div class="col-3 kgm-post-list-card">
												<a class="kgm-post-list-card-link" href="<?php echo $post->guid;?>">
													<div class="kgm-post-list-card-img" style="background-image:url(<?php echo kgm_get_thumbnail_url(); ?>);">
														<div class="kgm-post-list-card-meta">
															<div class="kgm-post-list-card-meta-view"><i class="fa fa-heart-o" aria-hidden="true"></i>12341</div>
															<div class="kgm-post-list-card-meta-like"><i class="fa fa-eye" aria-hidden="true"></i>2141</div>
														</div>
													</div>
													<div class="kgm-post-list-card-title"><?php echo $post->post_title;?></div>
												</a>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php else: ?>
				<?php endif; ?>
			</div>
			<div class="col-4 kgm-sidebar">2</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>