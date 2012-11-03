<?php 
/*
	template name: example
*/
$pid = $_GET['pid'];
$values = get_post_custom_values('example_code',$pid);
if(empty($values)){
	Header('Location:/');
}else{
	foreach($values as $value){
		$theCode = $value;
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>DEMO实例预览：<?php echo get_the_title($pid); ?></title>
<style>
@charset "utf-8";
body,h1,h2,h3,h4,p,ul,li,ol,dl,dt,dd,input,textarea,figure,form{margin:0;padding:0}
body,input,textarea{font-size:12px;font-family:microsoft yahei}
body{text-align:center;color:#33383D;background:#f1f1f1}
ul,ol{list-style:none}
img{border:0}
button,input {line-height:normal;*overflow:visible}
input,textarea{outline:none}
a{color:#3B8DD1;text-decoration:none}
a:hover{color:#8CAC52}
.demo-header{position:relative;height:22px;background-color:#33363B;line-height:22px;padding:2px 10px;text-align: left;}
.demo-name{color: #ccc;}
.demo-title{display: none;}
.demo-container{clear: both;padding:40px 10px 20px;text-align:left;margin:0 auto;line-height: 18px;}
.demo h2{font-size: 15px;padding-bottom: 6px;margin-bottom: 20px;border-bottom: solid 1px #ddd;}
</style>
</head>
<body>
<h1 class="demo-title"><?php echo get_the_title($pid); ?>- DEMO实例预览 - <?php echo get_option('blogname'); ?></h1>
<div class="demo-header">
	<a class="demo-name" href="<?php echo get_permalink($pid); ?>">&laquo; <?php echo get_the_title($pid); ?></a>
</div>
<div class="demo-container demo">
	<?php echo $theCode; ?>
</div>
</body>
</html>