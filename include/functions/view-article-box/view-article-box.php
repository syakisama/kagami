<?php
class kgm_view_article_box{
	public static function the_card($category = 0, $icon = '', $number = 8, $title = ''){ ?>
		<?php $posts = get_posts('category='.$category.'&numberposts='.$number); ?>
		<?php if($posts) : ?>
			<div class="grid-container kgm-post-list">
				<div class="kgm-post-list-header">
					<a class="kgm-post-list-title" href="<?php echo get_category_link($category)?>"><?php echo $title; ?></a>
					<a class="kgm-post-list-more" href="<?php echo get_category_link($category)?>">更多<i class="fa fa-angle-right" aria-hidden="true"></i></a>
				</div>
				<div class="row">
					<?php foreach($posts as $post): setup_postdata($post); ?>
						<div class="col-3 kgm-post-list-card">
							<a class="kgm-post-list-card-link" href="<?php echo get_permalink($post->ID); ?>" title="<?php echo esc_html($post->post_title);?>">
								<div class="kgm-post-list-card-img" style="background-image:url(<?php echo kgm_get_thumbnail_url($post); ?>);">
									<div class="kgm-post-list-card-meta">
										<div class="kgm-post-list-card-meta-view"><i class="fa fa-eye" aria-hidden="true"></i>12341</div>
										<div class="kgm-post-list-card-meta-like"><i class="fa fa-heart-o" aria-hidden="true"></i>2141</div>
									</div>
								</div>
								<div class="kgm-post-list-card-title"><?php echo $post->post_title;?></div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="clearfix"></div>
		<?php endif;
	}
}
?>