<?php get_header(); ?>
<div id="kgm-app">
	<div class="grid-container">
		<div class="row">
			<div class="col-8 kgm-main">
				<?php $posts = get_posts( "category=2&numberposts=6" ); ?>
				<?php if( $posts ) : ?>
					<div class="grid-container kgm-post-list">
						<h2 class="kgm-post-list-title">分类标题</h2>
						<div class="row">
							<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
								<div class="col-3 kgm-post-list-card">
									<a class="kgm-post-list-card-link" href="#">
										<div class="kgm-post-list-card-img" style="background-image:url(https://img.pic-imges.com/pic/upload/vod/2019-01/15464435286.jpg);">
											<div class="kgm-post-list-card-meta">
												<div class="kgm-post-list-card-meta-view"><i class="fa fa-heart-o" aria-hidden="true"></i>12341</div>
												<div class="kgm-post-list-card-meta-like"><i class="fa fa-eye" aria-hidden="true"></i>2141</div>
											</div>
										</div>
										<div class="kgm-post-list-card-title">12356</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-4 kgm-sidebar">2</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>