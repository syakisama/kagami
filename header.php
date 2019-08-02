<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Cache-Control" content="no-transform"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<meta name="renderer" content="webkit"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
<meta name="author" content="SCALA"/>
<link rel="profile" href="http://gmpg.org/xfn/11"/>
<title></title>
<?php wp_head(); ?>
</head>
<body>
<header id="kgm-header" style="height: 170px;">
	<div class="kgm-header-bg" style="background-image:url(https://s2.ax1x.com/2019/07/31/eYP3X4.jpg);"></div>
	<div class="kgm-header-bg-blur" style="background-image:url(https://s2.ax1x.com/2019/07/31/eYP3X4.jpg);"></div>
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