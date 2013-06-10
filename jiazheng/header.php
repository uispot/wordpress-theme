<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
	<?php if ( is_home() ) { bloginfo('name'); echo " - "; bloginfo('description'); } elseif ( is_category() ) { single_cat_title(); echo " - "; bloginfo('name'); } elseif (is_single() || is_page() ) { single_post_title(); } elseif (is_search() ) {  echo "搜索结果"; echo " - "; bloginfo('name'); } elseif (is_404() ) {  echo '页面未找到!'; } else { wp_title('',true); } ?>
</title>
<?php
if (is_home() || is_page()) {
    // 将以下引号中的内容改成你的主页description
    $description = "北京家政服务公司提供丰台区家政、保姆、钟点工、北京育儿嫂公司、保洁开荒、医疗陪护等各种家政服务项目.联系电话010—67649401,方庄家政服务、劲松家政服务、双井家政服务、刘家窑家政服务、潘家园家政服务。";

    // 将以下引号中的内容改成你的主页keywords
    $keywords = "北京家政服务公司,家政服务,家政公司,北京丰台区家政公司";
}
elseif (is_single()) {
    $description1 = get_post_meta($post->ID, "description", true);
    $description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));

    // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
    $description = $description1 ? $description1 : $description2;
   
    // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
    $keywords = get_post_meta($post->ID, "keywords", true);
    if($keywords == '') {
        $tags = wp_get_post_tags($post->ID);    
        foreach ($tags as $tag ) {        
            $keywords = $keywords . $tag->name . ", ";    
        }
        $keywords = rtrim($keywords, ', ');
    }
}
elseif (is_category()) {
    $description = category_description();
    $keywords = single_cat_title('', false);
}
elseif (is_tag()){
    $description = tag_description();
    $keywords = single_tag_title('', false);
}
$description = trim(strip_tags($description));
$keywords = trim(strip_tags($keywords));
?>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" rev="stylesheet" type="text/css" media="screen"/>

<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
<SCRIPT type=text/javascript src="<?php bloginfo('template_url'); ?>/js/slider.js"></SCRIPT>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />

<?php wp_head(); ?>
</head>

<body>
<div class="top-head">
	<div class="wrapper">
        <h1>您好，欢迎来到<?php bloginfo('name'); ?></h1>
        <p>北京家政公司服务热线 : 010-56034298 67624599</p>
    </div>
</div>
<div class="wrapper">
<div id="header" class="clearfix">
	<h2><a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.gif" width="354" height="87" alt="" /></a><?php bloginfo('description'); ?></h2>
    <p class="qq-contect">在线咨询</p>
</div>
<div class="nav">
<?php

$defaults = array(
  'theme_location'  => 'header-menu',
  'menu'            => '', 
  'container'       => 'ul', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => 'menu', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul class="clearfix">%3$s</ul>',
  'depth'           => 0,
  'walker'          => '');

wp_nav_menu($defaults); 

?>
</div>