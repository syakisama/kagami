<!DOCTYPE html>
<html lang="zh-CN">
<head>
<?php get_header(); ?>
</head>
<body>
<header id="kgm-header" style="height: 170px;">
	<div class="kgm-header-bg" style="background-image:url(https://s2.ax1x.com/2019/06/13/VhEcNQ.png);"></div>
	<nav class="kgm-primary-menu kgm-primary-menu-white">
		<div class="grid-container">
			<div class="row">
				<h1 class="kgm-primary-menu-logo"><a href="<?php home_url(); ?>">网站标题</a></h1>
				<?php
					if(has_nav_menu('kgm-primary-menu-logout')){
						$args = array(
							'theme_location'  => 'kgm-primary-menu-logout',
							'container_class' => 'kam-nav-container kgm-fl',
						);
						wp_nav_menu($args);
						unset($args);
					}
				?>
				<div class="kgm-fr">
					<a class="kgm-primary-menu-user kgm-fl"><img src="https://s2.ax1x.com/2019/06/30/Zl0bHe.jpg"></a>
					<a class="kgm-primary-menu-button kgm-fl">登录</a>
				</div>
			</div>
		</div>
	</nav>
</header>
<div class="grid-container">
123135
</div>
<?php get_footer(); ?>
</body>
</html>