<?php
$kgm_option_info = array(
  'full_name'   => '主题设置',
  'optionname'  => 'kgm_theme_setting',
  'child'       => false,
  'desc'        => '',
  'filename'    => 'kgm_theme_setting'
);
$kgm_option = array();
/*-----------------------------------*/
/*-----------------------------------*/
$kgm_option[] = array(
  'name' => '首页',
  'id'   => 'kgm_option_home',
  'type' => 'open',
);

$kgm_option[] = array(
  'name'      => '文章盒子',
  'id'        => 'kgm_option_article_box',
  'desc'      => '',
  'std'       => '',
  'multiple'  => true,
  'subtype' => array(
    array(
      'name' => '标题',
      'id'   => 'title',
      'desc' => '显示在盒子顶部的标题, 为空则显示分类标题',
      'std'  => '',
      'type' => 'text'
    ),
    array(
      'name' => '图标',
      'id'   => 'icon',
      'desc' => '显示在盒子顶部的图标, 支持FontAwesome图标(例:fa-home), 为空则不显示',
      'std'  => '',
      'button_text' => 'Upload',
      'type' => 'upload'
    ),
    array(
      'name'    => '文章分类',
      'id'      => 'category',
      'desc'    => '盒子将展示该分类下的文章',
      'std'     => '',
      'subtype' => 'category',
      'type'    => 'select',
      'multiple'    => false
    ),
    array(
      'name' => '文章数量',
      'id'   => 'number',
      'desc' => '盒子展示的文章数量',
      'std'  => '',
      'type' => 'text'
    ),
    array(
      'name'    => '盒子视图',
      'id'      => 'style',
      'desc'    => '盒子显示文章的视图样式',
      'std'     => '',
      'subtype' => array(
        'card'  => '卡片视图',
        'list'  => '列表视图',
      ),
    'type'     => 'select',
    'multiple' => false
    ),
  ),
  'type' => 'group' //Look here.
);

$kgm_option[] = array(
  'type' => 'close',
);
$kgm_option_page = new ashuwp_options_feild($kgm_option, $kgm_option_info);
/*-----------------------------------*/
/*-----------------------------------*/
$import_info = array(
  'full_name'   => '数据导入或导出',
  'child'       => true,
  'parent_slug' => 'kgm_theme_setting',
  'filename'    => 'kgm_theme_setting_import',
  'options'     => array('kgm_theme_setting'),
);
$import_page = new ashuwp_option_import_class($import_info);
?>