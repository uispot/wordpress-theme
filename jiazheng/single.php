<?php get_header(); ?>

<div id="cont" class="clearfix">
	<div class="main">
		<!-- place -->
		<div class="place"><b>当前位置:</b> <a href="<?php bloginfo('url');?>"><?php bloginfo('name') ; ?></a>
		<?php if(is_page()){  echo " &gt; "; the_category('&gt;');}else{ echo " &gt; "; the_category('&gt;');echo " &gt; ";the_title();}; ?></div>
		
		
		<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
    	<!-- Blog Post -->
		<div class="post">
			<div class="hr">
			<!-- Post Title -->
			<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<!-- Post Title -->
			<p class="sub"><?php the_tags('标签：', ', ', ''); ?> &bull; <?php the_time('Y年n月j日') ?> &bull; <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
</p>
			</div>
			<!-- Post Title -->

			<!-- Post Content -->
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="360" rowspan="5"><img src="<?php post_thumbnail_src(100); ?>" alt="保姆：<?php the_title(); ?>"  title="保姆：<?php the_title(); ?>"/></td>
    <td>姓名：<?php the_title(); ?> <span><?php echo $xingzhi;?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>学历：<?php echo $xueli;?></td>
    <td>年龄：<?php echo $age;?></td>
  </tr>
  <tr>
    <td>编号：</td>
    <td>籍贯：<?php echo $jiguan;?></td>
  </tr>
  <tr>
    <td>推荐指数：</td>
    <td>聘用状态：</td>
  </tr>
  <tr>
    <td>QQ在线咨询</td>
    <td>&nbsp;</td>
  </tr>
</table>
			<div><strong>保姆详细资料</strong></div>
			<?php the_content(); ?>
			<!-- Post Links -->
			<p class="clearfix"> <a href="<?php echo get_option('home'); ?>" class="button float" >&lt;&lt; 返回首页</a></p>
		</div>

<?php
}else{
?>
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
		
    </div>
    <div class="sidebar">
    	<?php get_sidebar(); ?>
    </div>
</div>


<?php get_footer(); ?>