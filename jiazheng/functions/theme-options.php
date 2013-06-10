<?php
$themename = "iLoverTheme";
$shortname = "ir_sm";

$options = array (

	array(	"name" => "基本设置",
			"type" => "open"),

	/* General */
	array(	"type" => "tab",
			"tabid" => "1"),

	array(	"name" => "基本设置",
			"type" => "title"),

	array(	"name" => "默认搜索提示词：",
			"id" => $shortname."_skey",
			"std" => '',
			"options" => array(),
			"type" => "text"),

	array(	"name" => "第三方RSS地址：",
			"id" => $shortname."_rss",
			"std" => '',
			"options" => array(),
			"type" => "text"),

	array(	"name" => "顶部公告(一行一个)：",
			"id" => $shortname."_tan",
			"std" => '',
			"options" => array(),
			"type" => "textarea"),

	/*array(	"name" => "作为发现频道的分类(仅可单选)",
			"id" => $shortname."_fx",
			"std" => '',
			"options" => array(),
			"type" => "category_list"),*/

	array(	"name" => "商家直达页面地址",
			"id" => $shortname."_sjzd",
			"std" => '',
			"options" => array(),
			"type" => "text"),

	array(	"name" => "海淘推荐页面地址",
			"id" => $shortname."_httj",
			"std" => '',
			"options" => array(),
			"type" => "text"),

	array(	"name" => "白菜价页面地址",
			"id" => $shortname."_bcj",
			"std" => '',
			"options" => array(),
			"type" => "text"),

	array(	"name" => "关于网站页面地址",
			"id" => $shortname."_about",
			"std" => '',
			"options" => array(),
			"type" => "text"),

	array(	"name" => "友情链接页面地址",
			"id" => $shortname."_link",
			"std" => '',
			"options" => array(),
			"type" => "text"),

	array(	"name" => "底部站点介绍：",
			"id" => $shortname."_des",
			"std" => '',
			"options" => array(),
			"type" => "textarea"),

	array(	"name" => "网站备案号：",
			"id" => $shortname."_mii",
			"std" => '',
			"options" => array(),
			"type" => "text"),
			
	array(	"type" => "close"),
	/* END Blogs Settings */

	
);
?>