<?php
class kgm_theme_setting{
	public static $options;
	public static function backend_init(){
		require_once(get_template_directory().'/include/ashuwp-framework/ashuwp_framework_core.php');
		self::register_setting_page();
		self::register_import_page();
		if(!self::$options){
			self::update_options();
		}
	}
	public static function update_options(){
		self::$options = get_option('ashuwp_kgm_theme_setting');
	}
	public static function get_option($key){
		if(!self::$options){
			self::update_options();
		}
		if(is_array(self::$options)){
			if(array_key_exists($key,self::$options)){
				return self::$options[$key];
			}
		}
		return null;
	}
	public static function get_pjax_config(){
		$pjax = array(
			'pjax_active' => false,
			'progress_active' => false,
			'progress_color' => '#29d',
		);
		$options = self::get_option('global_pjax');
		if(is_array($options)){
			if(array_key_exists('pjax_active', $options)){
				if(in_array('active', $options['pjax_active'])){
					$pjax['pjax_active'] = true;
					if(array_key_exists('progress_active', $options)){
						if(in_array('active', $options['progress_active'])){
							$pjax['progress_active'] = true;
							if(array_key_exists('progress_color', $options)){
								if($options['progress_color']){
									$pjax['progress_color'] = $options['progress_color'];
								}
							}
						}
					}
				}
			}
		}
		return $pjax;
	}
	private static function register_setting_page(){
		$option_info = array(
			'full_name' => '主题设置',
			'optionname' => 'kgm_theme_setting',
			'child' => false,
			'desc' => '',
			'filename' => 'kgm_theme_setting'
		);
		$option = array();
		/*-----------------------------------*/
		/*-----------------------------------*/
		$option[] = array(
			'name' => '显示',
			'id' => 'kgm_option_display',
			'type' => 'open',
		);
		$option[] = array(
			'name' => '全局 - PJAX设置',
			'id' => 'global_pjax',
			'desc' => '实现全站无刷新加载',
			'std' => '',
			'type' => 'group',
			'subtype' => array(
				array(
					'name' => 'PJAX加载',
					'id' => 'pjax_active',
					'desc' => 'PJAX开关, 可根据情况决定是否开启',
					'std'  => array(),
					'subtype' => array(
						'active' => '启用PJAX加载'
					),
					'type' => 'checkbox',
					'multiple' => false,
				) ,
				array(
					'name' => '是否显示页面加载进度条',
					'id' => 'progress_active',
					'desc' => '页面进度条开关, 推荐开启显示',
					'std'  => array('active'),
					'subtype' => array(
						'active' => '显示页面加载进度条'
					),
					'type' => 'checkbox',
					'multiple' => false,
				) ,
				array(
					'name' => '进度条颜色',
					'id' => 'progress_color',
					'desc' => '默认为<span style="color: #29d;">#29d</span>',
					'std' => '#29d',
					'type' => 'color'
				) ,
			),
		);
		$option[] = array(
			'name' => '首页 - 文章盒子',
			'id' => 'home_articlebox',
			'desc' => '',
			'std' => '',
			'type' => 'group',
			'multiple' => true,
			'subtype' => array(
				array(
					'name' => '标题',
					'id' => 'title',
					'desc' => '显示在盒子顶部的标题, 为空则显示分类标题',
					'std' => '',
					'type' => 'text'
				) ,
				array(
					'name' => '图标',
					'id' => 'icon',
					'desc' => '显示在盒子顶部的图标, 支持FontAwesome图标(例:fa-home), 为空则不显示',
					'std' => '',
					'button_text' => 'Upload',
					'type' => 'upload'
				) ,
				array(
					'name' => '文章分类',
					'id' => 'category',
					'desc' => '盒子将展示该分类下的文章',
					'std' => '',
					'subtype' => 'category',
					'type' => 'select',
					'multiple' => false
				) ,
				array(
					'name' => '文章数量',
					'id' => 'number',
					'desc' => '盒子展示的文章数量',
					'std' => '',
					'type' => 'text'
				) ,
				array(
					'name' => '盒子视图',
					'id' => 'style',
					'desc' => '盒子显示文章的视图样式',
					'std' => '',
					'subtype' => array(
						'card' => '卡片视图',
						'list' => '列表视图',
					) ,
					'type' => 'select',
					'multiple' => false
				) ,
			) ,
		);
		$option[] = array(
			'type' => 'close',
		);
		$option_page = new ashuwp_options_feild($option, $option_info);
	}
	private static function register_import_page(){
		$import_info = array(
			'full_name' => '数据导入或导出',
			'child' => true,
			'parent_slug' => 'kgm_theme_setting',
			'filename' => 'kgm_theme_setting_import',
			'options' => array(
				'kgm_theme_setting'
			) ,
		);
		$import_page = new ashuwp_option_import_class($import_info);
	}
}
?>