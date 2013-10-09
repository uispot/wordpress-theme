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

	array(	"name" => "第三方RSS地址：",
			"id" => $shortname."_rss",
			"std" => '',
			"options" => array(),
			"type" => "text"),

	array(	"name" => "首页 关于我们(一行一个)：",
			"id" => $shortname."_tan",
			"std" => '',
			"options" => array(),
			"type" => "textarea"),

	array(	"name" => "作为发现频道的分类(仅可单选)",
			"id" => $shortname."_fx",
			"std" => '',
			"options" => array(),
			"type" => "category_list"),

	array(	"name" => "客服QQ",
			"id" => $shortname."_kfqq",
			"std" => '',
			"options" => array(),
			"type" => "text"),
	
	array(	"name" => "服务专线",
			"id" => $shortname."_fwzx",
			"std" => '',
			"options" => array(),
			"type" => "text"),

	array(	"name" => "网站备案号：",
			"id" => $shortname."_mii",
			"std" => '',
			"options" => array(),
			"type" => "text"),
	
	array(	"name" => "底部站点介绍：",
			"id" => $shortname."_des",
			"std" => '',
			"options" => array(),
			"type" => "textarea"),
	
	array(	"name" => "网站统计",
			"id" => $shortname."_tongji",
			"std" => '',
			"options" => array(),
			"type" => "text"),
			
	array(	"type" => "close"),
	/* END Blogs Settings */

	
);
?>