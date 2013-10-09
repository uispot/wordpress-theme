<?php
/**
 * header-hp Template
 *
 * 说明：首页头部文件
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
	if(is_home()){
		bloginfo('name');
		echo " - ";
		bloginfo("description");
	}elseif(is_category()){
		single_cat_title();
		echo " - ";
		bloginfo("name");
	}elseif(is_single() || is_page()){
		single_post_title();
	}elseif(is_search()){
		echo "搜索结果";
		echo " - ";
		bloginfo('name');
	}elseif(is_404()){
		echo "页面未找到";
	}else{
		wp_title('',true);
	}
?>
</title>
<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" rev="stylesheet" type="text/css" />
</head>

<body>
<div class="headwrap">
	<div class="header">
		<a id="head_link" title="大冬枣网DaDongZao首页" href="http://www.dadongzao.com">大冬枣网DaDongZao首页</a>
	</div>
</div>



