<?php
/**
 * Archive Template
 *
 * The archive template is the default template used for archives pages without a more specific template. 
 *
 * @package Prototype
 * @subpackage Template
 */

get_header(); ?>

<?php
$wenzhang = get_the_category();
//print_r($wenzhang);

foreach($wenzhang as $v){
	$term_id = $v->term_id;
}

?>

<div id="cont" class="clearfix">
	<div class="main">
		<?php
		if($term_id == 13){
		?>
        <div class="bmtj">
        	
            <div class="hd">
            	<h3>优秀保姆信息</h3>
                <p class="gz-times"><b>工作时间：</b><span>早8：30（上班） 至 晚18：00点（下班）</span></p>
            </div>
            <div class="box clearfix">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
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
                    <li><a href="<?php the_permalink() ?>">查看详细</a></li>
					<li class="bm-pic">
                    	<a href="<?php the_permalink() ?>"><img src="<?php post_thumbnail_src(100); ?>" width="100" height="130" alt="保姆：<?php the_title(); ?>"  title="保姆：<?php the_title(); ?>"/></a><br />
                    	推荐：<img src="<?php bloginfo('template_url'); ?>/images/zs-pic-5.gif" width="70" height="15" />
					</li>
                </ul>				
                <?php endwhile;?> 
				<?php else: ?>
				  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
            </div>
			<p style="text-align:center;"><?php pagenavi(); ?> </p>
        </div>
        <?php
		}else{
?>
		<?php if(have_posts()) : ?>
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <h2 class="post-title">
          您正在浏览分类 '<font color="#000000"><?php echo single_cat_title(); ?></font>' 下的文章
        </h2>

        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h2 class="post-title">
          Archive for <?php the_time('F jS, Y'); ?>
        </h2>

        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h2 class="post-title">
          Archive for <?php the_time('F, Y'); ?>
        </h2>

        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h2 class="post-title">
          Archive for <?php the_time('Y'); ?>
        </h2>

        <?php /* If this is a search */ } elseif (is_search()) { ?>
        <h2 class="post-title">Search Results</h2>

        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h2 class="post-title">Author Archive</h2>

        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h2 class="post-title">Blog Archives</h2>

        <?php } ?>
      <?php endif; ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<div class="post post-list" id="post-<?php the_ID(); ?>">
            	<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                <div class="meta">
                    <p class="left"><?php the_tags('标签：', ', ', '&nbsp;&nbsp;'); ?><?php the_time('m') ?>/<?php the_time('d') ?> , <?php the_time('Y') ?>&nbsp;&nbsp;<?php if(function_exists('the_views')) {the_views();} ?><?php edit_post_link(); ?>                   
                    
                    </p>
            	</div>
                 
            </div>
            <?php endwhile;?>
				<p style="text-align:center;"><?php pagenavi(); ?> </p>   
			<?php else: ?>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
           
            

		<?php
		}
		?>
    </div>
    <div class="sidebar">
    	<?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
