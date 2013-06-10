<?php get_header(); ?>

<?php
$wenzhang = get_the_category();
//print_r($wenzhang);

foreach($wenzhang as $v){
	$term_id = $v->term_id;
}

?>

<div id="cont" class="clearfix">
	<div class="main">
    	<div class="gonggao"><b>活动公告：</b><a href="#">月嫂、育儿嫂培训进行中、火热报名......</a></div>
		<?php
		if($term_id == 2){
		?>
        <div class="bmtj">
        	
            <div class="hd">
            	<h3>保姆推荐</h3>
                <p class="gz-times"><b>工作时间：</b><span>早8：30（上班） 至 晚18：00点（下班）</span></p>
            </div>
            <div class="box clearfix">
			
				<?php 
						$recent = new WP_Query("cat=2&showposts=6"); 
						while($recent->have_posts()) : $recent->the_post();
						?>
							<li><a href=""></a></li>
						
            	<ul>
                	<li class="bm-pic">
                    	<a href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_url'); ?>/images/pic-1.jpg" width="100" height="130" alt="保姆：<?php the_title(); ?>" /></a><br />
                    	推荐：<img src="<?php bloginfo('template_url'); ?>/images/zs-pic-5.gif" width="70" height="15" />
					</li>
					<?php
					$xingzhi = get_post_meta($post->ID, "xingzhi_value", true);
					$age = get_post_meta($post->ID, "age_value", true);
					$minzu = get_post_meta($post->ID, "minzu_value", true);
					$jiguan = get_post_meta($post->ID, "jiguan_value", true);
					$xueli = get_post_meta($post->ID, "xueli_value", true);
					?>
                    <li class="name">姓名：<?php the_title(); ?> <span><?php echo $xingzhi;?></span></li>
                    <li>年龄：<?php echo $age;?></li>
                    <li>民族：<?php echo $minzu;?></li>
                    <li>籍贯：<?php echo $jiguan;?></li>
                    <li>学历：<?php echo $xueli;?></li>
                    <li></li>
                    <li><a href="<?php the_permalink() ?>" class="more">查看详细</a></li>
                </ul>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
		}else{
			echo "其他文章";
		}
		?>
    </div>
    <div class="sidebar">
    	<?php get_sidebar(); ?>
    </div>
</div>
</div>
<div class="links wrapper">
	<div class="hd">
    	<h4>友情链接</h4>
        <p>诚招 >= PR3 以上家政服务行业网站优先</p>
    </div>
    <div class="box">
        <ul class="clearfix">
            <li><a href="#">北京家政网</a></li>
            <li><a href="#">北京家政网</a></li>
            <li><a href="#">北京家政网</a></li>
            <li><a href="#">北京家政网</a></li>
            <li><a href="#">北京家政网</a></li>
        </ul>
    </div>
</div>
<?php get_footer(); ?>
