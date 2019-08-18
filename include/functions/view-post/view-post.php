<?php
class kgm_view_post{
	public static function show_articlebox($article_boxs){
		if(is_array($article_boxs) && count($article_boxs) > 0){
			foreach($article_boxs as $article_box){
				if(!null == $article_box['category'] && !empty($article_box['category']) && $article_box['category'] > 0){
					$more_link = get_category_link($article_box['category']);
					if(null == $article_box['number'] || empty($article_box['number']) || $article_box['number'] < 1){
						$article_box['number'] = 8;
					}
					if(null == $article_box['title'] || empty($article_box['number'])){
						$article_box['title'] = get_cat_name($article_box['category']);
					}
					if(null == $article_box['icon']){
						$article_box['icon'] = '';
					}
					$posts = get_posts('category='.$article_box['category'].'&numberposts='.$article_box['number']);
					if($posts){
						self::the_postlist_start($article_box['title'], $article_box['icon'], $more_link);
						if($article_box['style'] == 'card'){
							self::the_card($posts);
						}else{
							self::the_list($posts);
						}
						self::the_postlist_end();
					}
				}
			}
		}else{
			//404
		}
	}
	public static function the_postlist_start($title = '', $icon = '', $more_link = ''){?>
		<div class="grid-container kgm-postlist">
			<?php if($title || $icon || $more_link): ?>
				<header class="kgm-postlist-header">
					<?php if($title): ?>
						<a class="kgm-postlist-title" href="<?php echo $more_link; ?>"><?php echo $title; ?></a>
					<?php endif; ?>
					<?php if($more_link): ?>
						<a class="kgm-postlist-more" href="<?php echo $more_link; ?>">更多<i class="fa fa-angle-right" aria-hidden="true"></i></a>
					<?php endif; ?>
				</header>
			<?php endif;?>
			<div class="row">
	<?php
	}
	public static function the_postlist_end(){?>
			</div>
		</div>
		<div class="clearfix"></div>
	<?php
	}
	public static function the_card($posts){ ?>
		<?php if($posts): ?>
			<?php foreach($posts as $post): setup_postdata($post); ?>
				<div class="col-3 kgm-postlist-card-contiainer">
					<div class="kgm-postlist-card">
						<a class="kgm-postlist-card-link" href="<?php echo get_permalink($post->ID); ?>" title="<?php echo esc_html($post->post_title);?>">
							<div class="kgm-postlist-card-img" style="background-image:url(<?php echo self::kgm_get_thumbnail_url($post); ?>);">
								<div class="kgm-postlist-card-meta">
									<div class="kgm-postlist-card-meta-view"><i class="fa fa-play-circle-o" aria-hidden="true"></i>12341</div>
									<div class="kgm-postlist-card-meta-comment"><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo $post->comment_count; ?></div>
									<div class="kgm-postlist-card-meta-author"><i class="fa fa-user" aria-hidden="true"></i><?php echo get_the_author_meta('nickname',$post->author); ?></div>
								</div>
							</div>
							<div class="kgm-postlist-card-title"><?php echo $post->post_title;?></div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif;
	}
	public static function the_list($posts){?>
		<?php if($posts): ?>
			<?php foreach($posts as $post): setup_postdata($post); ?>
				<div class="col-6 kgm-postlist-list-container">
					<div class="kgm-postlist-list row">
						<a class="col-3 kgm-postlist-list-img-link" href="<?php echo get_permalink($post->ID); ?>" title="<?php echo esc_html($post->post_title);?>">
							<div class="kgm-postlist-list-img" style="background-image:url(<?php echo self::kgm_get_thumbnail_url($post); ?>);"></div>
						</a>
						<div class="col-9 kgm-postlist-list-right">
							<a class="kgm-postlist-list-title" href="<?php echo get_permalink($post->ID); ?>" title="<?php echo esc_html($post->post_title);?>"><?php echo $post->post_title;?></a>
							<div class="kgm-postlist-list-desc"><?php if(!post_password_required($post)){ echo self::kgm_get_excerpt($post); }?></div>
							<div class="kgm-postlist-list-meta">
								<span class="kgm-postlist-list-meta-view"><i class="fa fa-play-circle-o" aria-hidden="true"></i>12345</span>
								<span class="kgm-postlist-list-meta-comment"><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo $post->comment_count; ?></span>
								<span class="kgm-postlist-list-meta-time"><i class="fa fa-clock-o" aria-hidden="true"></i><span class="kgm_timeago_render" datetime="<?php echo $post->post_date; ?>"></span></span>
								<a class="kgm-postlist-list-meta-author" href="<?php echo get_the_author_meta('user_url',$post->author); ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo get_the_author_meta('nickname',$post->author); ?></a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif;
	}
	public static function kgm_get_excerpt($post){
		if (has_excerpt($post->ID)){
			return get_the_excerpt($post->ID);
		}else{
			if(!empty($post->post_content)){
				return mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"...");
			}
		}
		return '';
	}
	public static function kgm_get_thumbnail_url($post){
		if (has_post_thumbnail($post->ID)) {
			$post_thumbnail_id = get_post_thumbnail_id( $post );
			$img = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
			$img = $img[0];
		}else{
			$content = $post->post_content;
			preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
			if (!empty($strResult[1])) {
				$img = $strResult[1][0];
			}else{
				$img = 'https://img.pic-imges.com/pic/upload/vod/2019-01/15464435286.jpg';
			}
		};
		return $img;
	}
	public static function kgm_pages($paged, $wp_query, $max_page, $range = 3){
		if (!$max_page){
			$max_page = $wp_query->max_num_pages;
		}
		if($max_page > 0){
			if(!$paged){$paged = 1;}
			echo '<ul class="kgm-pagination">';
			//prev
			if($paged > 1){
				self::kgm_pages_button('prev','default',0,get_pagenum_link($paged-1));
			}else{
				self::kgm_pages_button('prev','disabled');
			}
			//num
			if($max_page > ($range * 2 + 1)){
				if($paged > ($range + 2)){
					self::kgm_pages_button('num','default',1,get_pagenum_link(1));
					self::kgm_pages_button('ellipsis');
				}
				if($paged <= $range){
					for($i = 1; $i <= ($range * 2 + 1); $i++){
						if($paged == $i){
							self::kgm_pages_button('num','active',$i);
						}else{
							self::kgm_pages_button('num','default',$i,get_pagenum_link($i));
						}
					}
				}else{
					if($paged <= ($max_page - $range)){
						for($i = ($paged - $range); $i <= ($paged + $range); $i++){
							if($paged == $i){
								self::kgm_pages_button('num','active',$i);
							}else{
								self::kgm_pages_button('num','default',$i,get_pagenum_link($i));
							}
						}
					}else{
						for($i = ($max_page - $range*2); $i <= $max_page; $i++){
							if($paged == $i){
								self::kgm_pages_button('num','active',$i);
							}else{
								self::kgm_pages_button('num','default',$i,get_pagenum_link($i));
							}
						}
					}
				}
				if($paged < ($max_page - $range - 1)){
					self::kgm_pages_button('ellipsis');
					self::kgm_pages_button('num','default',$max_page,get_pagenum_link($max_page));
				}
			}else{
				for($i = 1; $i <= $max_page; $i++){
					if($paged == $i){
						self::kgm_pages_button('num','active',$i);
					}else{
						self::kgm_pages_button('num','default',$i,get_pagenum_link($i));
					}
				}
			}
			//next
			if($paged < $max_page){
				self::kgm_pages_button('next','default',0,get_pagenum_link($paged+1));
			}else{
				self::kgm_pages_button('next','disabled');
			}
			echo '</ul>';
		}
	}
	static function kgm_pages_button($type = 'num', $stat = 'default', $num = 0, $link = ''){
		if($type == 'ellipsis'){
			echo '<li class="kgm-pagination-ellipsis"></li>';
			return;
		}

		$class = 'kgm-pagination-item';
		if($stat == 'active'){
			$class = $class.' kgm-pagination-item-active';
		}elseif($stat == 'disabled'){
			$class = $class.' kgm-pagination-item-disabled';
		}
		echo '<li ';
		echo 'class="'.$class.'">';

		if($type == 'prev'){
			$title = '上一页';
			$text = '&laquo;';
		}elseif($type == 'next'){
			$title = '下一页';
			$text = '&raquo;';
		}elseif($type == 'num'){
			$title = '第'.$num.'页';
			$text = $num;
		}

		if(!empty($link)){
			echo '<a href="'.$link.'" title="'.$title.'">'.$text.'</a>';
		}else{
			echo '<span title="'.$title.'">'.$text.'</span>';
		}
		echo '</li>';
	}
}
?>