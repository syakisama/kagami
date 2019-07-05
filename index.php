<!DOCTYPE html>
<html lang="zh-CN">
<head>
<?php get_header(); ?>
</head>
<body>
<header id="kgm-header" style="height: 170px;">
	<div class="kgm-header-bg" style="background-image:url(https://s2.ax1x.com/2019/06/13/VhEcNQ.png);"></div>
	<div class="kgm-header-bg-blur" style="background-image:url(https://s2.ax1x.com/2019/06/13/VhEcNQ.png);"></div>
	<nav class="kgm-primary-menu kgm-primary-menu-white">
		<div class="grid-container">
			<div class="row">
				<h1 class="kgm-primary-menu-logo"><a href="<?php home_url(); ?>">网站标题</a></h1>
				<?php
					if(has_nav_menu('kgm-primary-menu-logout')){
						$args = array(
							'theme_location'  => 'kgm-primary-menu-logout',
							'container_class' => 'kgm-fl kgm-nav-container',
							'walker'          => new custom_navwalker
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
<div id="kgm-app">
	<div class="grid-container">
		<div class="row">
			<div class="col-12 col-md-8 kgm-main">1</div>
			<div class="col-12 col-md-4 kgm-sidebar">2</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
</body>
</html>