<?php get_header(); ?>

<div id="cont" class="clearfix">
	<div class="main">
		<!-- place -->
		<div class="place"><b>当前位置:</b> <a href="<?php bloginfo('url');?>"><?php bloginfo('name') ; ?></a>
		<?php if(is_page()){  echo " &gt; "; the_category('&gt;');}else{ echo " &gt; "; the_category('&gt;');echo " &gt; ";the_title();}; ?></div>
		
		
		<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
    	<!-- Blog Post -->
		<div class="post">
<?php

$wenzhang = get_the_category();

//$arr = get_object_vars($wenzhang);

//print_r($wenzhang);
foreach($wenzhang as $v){
	$term_id = $v->term_id;
}

if($term_id == '13'){

$xingzhi = get_post_meta($post->ID, "xingzhi_value", true);
$age = get_post_meta($post->ID, "age_value", true);
$minzu = get_post_meta($post->ID, "minzu_value", true);
$jiguan = get_post_meta($post->ID, "jiguan_value", true);
$xueli = get_post_meta($post->ID, "xueli_value", true);
?>

<script type="text/javascript">
//图片等比例缩放
var scaleImage = function(o, w, h){ 
	var img = new Image(); 
	img.src = o.src; 
	if(img.width >0 && img.height>0){ 
		if(img.width/img.height >= w/h){ 
			if(img.width > w){ 
			o.width = w; 
			o.height = (img.height*w) / img.width; 
			} else { 
			o.width = img.width; 
			o.height = img.height; 
			} 
		o.alt = img.width + "x" + img.height; 
		}else { 
			if(img.height > h){ 
			o.height = h; 
			o.width = (img.width * h) / img.height; 
			} else { 
			o.width = img.width; 
			o.height = img.height; 
			} 
			o.alt = img.width + "x" + img.height; 
		} 
	} 
} 
</script>
			<div class="hr">
				<!-- Post Title -->
				<h3 class="title"><?php the_title();  echo "&nbsp;&nbsp;".$xingzhi; ?></h3>
				<!-- Post Title -->
				<p class="sub"><?php the_tags('标签：', ', ', ''); ?> &bull; <?php the_time('Y年n月j日') ?> &bull; <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?></p>
			</div>
			<!-- Post Title -->
			<table width="690" cellspacing="0" cellpadding="0" border="0" height="213" class="baomu-table">
			  <tbody>
				  <tr>
					 <td width="300" rowspan="5" align="center" valign="middle" bgcolor="#f5f5f5"><img src="<?php post_thumbnail_src(100); ?>"alt="保姆："  title="保姆：" onload="scaleImage(this,120,160)"/></td>
					<td width="140" height="42">姓名：<?php the_title(); ?> <span><?php echo $xingzhi;?></span></td>
					<td width="250">年龄：<?php echo $age;?></td>
					
				  </tr>
				  <tr>
					<td>学历：<?php echo $xueli;?></td>
					<td>籍贯：<?php echo $jiguan;?></td>
					</tr>
				  <tr>
					<td>聘用状态：</td>
					<td></td>
					</tr>
				  <tr>
					<td>聘用状态：</td>
					<td>&nbsp;</td>
					</tr>
				  <tr>
					<td><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1057053943&amp;site=qq&amp;menu=yes"><img width="113" height="30" src="../../images/qqzx.gif"></a></td>
					<td>&nbsp;</td>
				   </tr>
				</tbody>
			</table>
			<div><strong><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>保姆详细资料</strong></div>
			
			<div>
				<p>姓名：<?php the_title(); ?> <span><?php echo $xingzhi;?></span></p>
				<p>学历：<?php echo $xueli;?></p>
				<p>年龄：<?php echo $age;?></p>
				<p>籍贯：<?php echo $jiguan;?></p>
				<p>聘用状态：</p>
			</div>
			
			<?php the_content(); ?>
			
			<!-- Post Links -->
			<p class="clearfix"> <a href="<?php echo get_option('home'); ?>" class="button float" >&lt;&lt; 返回首页</a></p>
		</div>

<?php
}else{
?>
			<div class="hr">
				<!-- Post Title -->
				<h3 class="title"><?php the_title(); ?></h3>
				<!-- Post Title -->
				<p class="sub"><?php the_tags('标签：', ', ', ''); ?> &bull; <?php the_time('Y年n月j日') ?> &bull; <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?></p>
			</div>
			<!-- Post Title -->
			
			<?php the_content(); ?>
			<!-- Post Links -->
			<p class="clearfix"> <a href="<?php echo get_option('home'); ?>" class="button float" >&lt;&lt; 返回首页</a></p>
		</div>

<?php
}
?>	
		<?php else : ?>
		<div class="post errorbox">
			没有文章！
		</div>
		<?php endif; ?>
		<div class="fuwuNews">
			<div class='hd'>
				<b>服务信息</b>
			</div>
			<div class='box'>
				<p>
					  <a target="_blank" href="http://www.jiazheng114.com">北京保姆公司</a>价格 请参照 <br>
					  <a target="_blank" href="http://www.jiazheng114.com" rel="nofollow">北京华夏中青家政连锁第三分公司&mdash; 保姆收费标准</a>（请点击） <br>
					  联系我们：让我们优质的服务，给您带来无限的欢乐。
		
					  <br>
					  服务热线: 010-52126636 13261990196 
		
					  <br>
					  QQ ：1057053943<br>
					  		
					  <br>
					  <a target="_blank" href="http://www.jiazheng114.com">北京家政公司，北京保姆公司</a> 网址：http://www.jiazheng114.com <br>
					  地址：北京市丰台区三环新城7号院13号楼704室  （地铁10号线丰台站C2出口）
		
					  <br>
					联系人：魏老师 
				</p>
			</div>
		</div>
    </div>
    <div class="sidebar">
    	<?php get_sidebar(); ?>
    </div>
</div>


<?php get_footer(); ?>