<?php
class kgm_view_article_box{
	public static function show($article_boxs){
		if(is_array($article_boxs) && count($article_boxs) > 0){
			foreach($article_boxs as $article_box){
				if(!null == $article_box['category'] && !empty($article_box['category']) && $article_box['category'] > 0){
					if(null == $article_box['number'] || empty($article_box['number']) || $article_box['number'] < 1){
						$article_box['number'] = 8;
					}
					if(null == $article_box['title'] || empty($article_box['number'])){
						$article_box['title'] = get_cat_name($article_box['category']);
					}
					if(null == $article_box['icon']){
						$article_box['icon'] = '';
					}
					self::the_card($article_box['category'], $article_box['icon'], $article_box['number'], $article_box['title']);
				}
			}
		}else{
			//404
		}
	}
	public static function the_card($category = 0, $icon = '', $number = 8, $title = ''){ ?>
		<?php $posts = get_posts('category='.$category.'&numberposts='.$number); ?>
		<?php if($posts): ?>
			<div class="grid-container kgm-post-list">
				<div class="kgm-post-list-header">
					<?php if($title): ?>
					<a class="kgm-post-list-title" href="<?php echo get_category_link($category)?>"><?php echo $title; ?></a>
					<?php endif; ?>
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