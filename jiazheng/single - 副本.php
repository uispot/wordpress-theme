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
		<div class="hr clearfix">&nbsp;</div>
		<!-- Comment's List -->
		<h3>Comments</h3>
		<div class="hr dotted clearfix">&nbsp;</div>
		<ol class="commentlist">
			<li class="comment">
				<div class="gravatar"> <img alt="" src='images/gravatar.png' height='48' width='48' /> <a class="comment-reply-link" href=''>Reply</a> </div>
				<div class="comment_content">
					<div class="clearfix"> <cite class="author_name"><a href="">Joe Bloggs</a></cite>
						<div class="comment-meta commentmetadata">January 6, 2010 at 6:26 am</div>
					</div>
					<div class="comment_text">
						<p>Donec leo. Aliquam risus elit, luctus vel, interdum vitae, malesuada eget, elit. Nulla vitae ipsum. Donec ligula ante, bibendum sit amet, elementum quis, viverra eu, ante. Fusce tincidunt. Mauris pellentesque, arcu eget feugiat accumsan, ipsum mi molestie orci, ut pulvinar sapien lorem nec dui.</p>
					</div>
				</div>
			</li>
		</ol>
		<div class="hr clearfix">&nbsp;</div>
		<!-- Comment Form -->
		<form id="comment_form" action="" method="post">
			<h3>Add a comment</h3>
			<div class="hr dotted clearfix">&nbsp;</div>
			<ul>
				<li class="clearfix">
					<label for="name">Your Name</label>
					<input id="name" name="name" type="text" />
				</li>
				<li class="clearfix">
					<label for="email">Your Email</label>
					<input id="email" name="email" type="text" />
				</li>
				<li class="clearfix">
					<label for="email">Your Website</label>
					<input id="website" name="website" type="text" />
				</li>
				<li class="clearfix">
					<label for="message">Comment</label>
					<textarea id="message" name="message" rows="3" cols="40"></textarea>
				</li>
				<li class="clearfix">
					<!-- Add Comment Button -->
					<a type="submit" class="button medium black right">Add comment</a> </li>
			</ul>
		</form>
    </div>
    <div class="sidebar">
    	<?php get_sidebar(); ?>
    </div>
</div>
</div>

<?php get_footer(); ?>