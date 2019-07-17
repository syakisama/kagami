<footer id="kgm-footer">
	<div class="grid-container">
		<div class="row">
			<?php
			$stat = sprintf(  '%d 次查询, 耗时%.3fs, 使用 %.2fMB 内存',
				get_num_queries(),
				timer_stop( 0, 3 ),
				memory_get_peak_usage() / 1024 / 1024
			);
			echo $stat;
			echo '<br/>';
			global $article_boxs;
			var_dump($article_boxs);
			?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>