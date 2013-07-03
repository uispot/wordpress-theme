<?php 
	get_header(); 	
?>

<div class="banner">
    <div class="focus">
        <div id="slide"></div>
    </div>

    <script type="text/javascript">
		$("#slide").jdSlide({
			width:980,height:251,pics:[
			{src:"http://www.jiazheng114.com/wp-content/themes/jiazheng/images/banner1.jpg",href:"#",alt:"图片1",breviary:"#",type:"img"},
			{src:"http://www.jiazheng114.com/wp-content/themes/jiazheng/images/banner2.jpg",href:"#",alt:"图片2",breviary:"#",type:"img"},
			{src:"http://www.jiazheng114.com/wp-content/themes/jiazheng/images/banner3.jpg",href:"#",alt:"图片3",breviary:"#",type:"img"}
			<?php
			/*$tplh = explode("\n",get_option('ir_sm_tplh')); 
			foreach( $tplh as $row ) { 
				//echo "<div>".$row."</div>"; 
				$arr[] = explode("|",$row);
			} 
			//print_r($arr);
			foreach($arr as $row1){			
				echo '{src:"'.bloginfo('template_url').$row1[0].'",href:"'.$row1[1].'",alt:"'.$row1[2].'",breviary:"#",type:"img"},'
			}*/ 
			?>
			]
			})
	</script>
</div>
<div id="cont" class="clearfix">
	<div class="main">
    	<div class="gonggao"><b>活动公告：</b><?php $sa = explode("\n",get_option('ir_sm_tan')); foreach( $sa as $row ) { echo "<span>".$row."</span>"; } ?></div>
        <div class="about clearfix">
        	<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/card-pic.jpg" width="239" height="148" alt="" /></a>
        	<p><?php $about = get_option('ir_sm_about'); echo $about;?></p>
            <a href="<?php bloginfo('url');echo "/about"; ?>" class="more">查看详细&gt;&gt;</a>
        </div>
        <div class="bmtj">
        	
            <div class="hd">
            	<h3>保姆推荐</h3>
                <p class="gz-times"><b>工作时间：</b><span>早8：30（上班） 至 晚18：00点（下班）</span></p>
            </div>
            <div class="box clearfix">
			
				<?php 
						$recent = new WP_Query("cat=13&showposts=6"); 
						while($recent->have_posts()) : $recent->the_post();
						?>
						
            	<ul>
                	
					<?php
					$xingzhi = get_post_meta($post->ID, "xingzhi_value", true);
					$age = get_post_meta($post->ID, "age_value", true);
					$minzu = get_post_meta($post->ID, "minzu_value", true);
					$jiguan = get_post_meta($post->ID, "jiguan_value", true);
					$xueli = get_post_meta($post->ID, "xueli_value", true);
					?>
                    <li class="name">姓名：<a href="<?php the_permalink() ?>"><?php the_title(); ?></a> <br><span><?php echo $xingzhi;?></span></li>
                    <li>年龄：<?php echo $age;?></li>
                    <li>民族：<?php echo $minzu;?></li>
                    <li>籍贯：<?php echo $jiguan;?></li>
                    <li>学历：<?php echo $xueli;?></li>
                    <li></li>
                    <li><a href="<?php the_permalink() ?>">查看详细资料</a></li>
					
					<li class="bm-pic">
						<a href="<?php the_permalink() ?>"><img src="<?php $catch_img=catch_that_image(); echo $catch_img; ?>" width="100" height="130" alt="保姆：<?php get_the_title(); ?>"  title="保姆：<?php get_the_title(); ?>"/></a>                
                    	<br />
                    	推荐：<img src="<?php bloginfo('template_url'); ?>/images/zs-pic-5.gif" width="70" height="15" />
					</li>					
                </ul>
				<?php endwhile; ?>
            </div>
        </div>
        
        <div class="zhishi clearfix">
        	<div class="jzzs lanmu">
            	<div class="hd">
                	<h3>家政知识</h3>
                    <a href="<?php bloginfo('url');?>/?cat=5">更多</a>
                </div>
                <div class="box">
                	<ul>
					<?php 
					$recent = new WP_Query("cat=5&showposts=6"); 
					while($recent->have_posts()) : $recent->the_post();
					?>
                    	<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
                    </ul>
                </div>
            </div>
            
            <div class="myzs lanmu">
            	<div class="hd">
                	<h3>母婴知识</h3>
                    <a href="<?php bloginfo('url');?>/?cat=6">更多</a>
                </div>
                <div class="box">
                	<ul>
                    	<?php 
						$recent = new WP_Query("cat=6&showposts=6"); 
						while($recent->have_posts()) : $recent->the_post();
						?>
							<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="khxq">
        	<div class="hd">
            	<h3>客户需求</h3>
            </div>
            <div class="box">
            	<ul class="clearfix">
                	<?php 
						$recent = new WP_Query("cat=12&showposts=6"); 
						while($recent->have_posts()) : $recent->the_post();
						?>
							<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
                </ul>
            </div>
        </div>
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
            <?php get_links('-1','<li>','</li>'); ?>
        </ul>
    </div>
</div>
<?php get_footer(); ?>