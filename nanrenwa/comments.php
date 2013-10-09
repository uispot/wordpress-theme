<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('请不要直接加载该页面，谢谢！');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('这篇文章需要密码，请输入密码访问'); ?></p> 
	<?php
		return;
	}
?>

<h3>发表评论</h3>


<?php if ( have_comments() ) : ?>
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=ilover_comment&max_depth=1000'); ?>
	</ol>
	<div class="pagenavi"><?php paginate_comments_links('prev_text=上一页&next_text=下一页');?></div>
 <?php else : ?>
	<?php if ('open' == $post->comment_status) : ?>
	<?php else : ?>
		<p class="nocomments">抱歉，暂停评论。</p>
	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>
<div class="clear"></div>
<div id="respond">
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<h3 class="clearfix"><span id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></span></h3>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('你需要 <a href="%s">登录</a> 才可以回复.'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>

<?php if ( is_user_logged_in() ) : ?>
<p class="smilies"><?php printf(__('当前您登录的用户名为 <a href="%1$s">%2$s</a>，'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account'); ?>"><?php _e('退出 &raquo;'); ?></a></p>
<?php else : ?>
<div id="comment-author-info">
<p style="margin-top:0;"><input type="text" name="author" id="author" value="" size="25" tabindex="1">
<label for="author"><small>昵称:</small></label></p>
<p><input type="text" name="email" id="email" value="" size="25" tabindex="2">
<label for="email"><small>邮箱：</small></label></p>
<p><input type="text" name="url" id="url" value="" size="25" tabindex="3">
<label for="url"><small>网站：</small></label></p>
</div>
<?php endif; ?>
<div id="author_textarea">
<div id="comment_textarea">
<textarea name="comment" id="comment" cols="100%" rows="14" tabindex="4" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
<div id="loading" style="display: none; "><img src="http://snowxh.in/wp-admin/images/loading-publish.gif" style="vertical-align:middle;" alt=""> 正在提交, 请稍后...</div>
<div id="error" style="display: none; ">#</div>
</div>
<input type="submit" id="submit" tabindex="5" value="提交评论(Ctrl+Enter)">

</div>
 <?php comment_id_fields(); ?> 
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
</div>
<?php endif; ?>