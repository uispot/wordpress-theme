<?php
/**
 * 
 *
 * 说明：文章内容页
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<h2 class="title"><?php the_title(); ?></h2>
				   <div class="info"> <small>时间:</small><?php the_time("m-d G:h"); ?> <small>作者:</small><?php the_author(); ?> <small>点击:</small>  次 <small>评论：</small><?php comments_popup_link('0', '1', '%','', 'OFF'); ?></div> 

				<div class="con">
					<?php the_content(); ?>
				</div>
				<footer class="entry-meta">
					<?php edit_post_link( __( 'Edit', 'qiye' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-meta -->
				
				<div class="context">
					<ul>
						<li><?php next_post_link('<span class="grey">上一篇：</span>&nbsp;%link',"%title"); ?></li>
						<li><?php previous_post_link('<span class="grey">下一篇：</span>&nbsp;%link',"%title"); ?></li>
					</ul>
				</div>
</article><!-- #post -->
