<?php get_header(); ?>

<div id="cont" class="clearfix">
	<div class="main">
		<!-- place -->
		<div class="place">当前位置：首页 - 家政知识</div>
		
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
			<?php the_content(); ?>
			<!-- Post Links -->
			<p class="clearfix"> <a href="<?php echo get_option('home'); ?>" class="button float" >&lt;&lt; 返回首页</a> <a href="#commentform" class="button float right" >发表评论</a> </p>
		</div>
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
</div>

<?php get_footer(); ?>