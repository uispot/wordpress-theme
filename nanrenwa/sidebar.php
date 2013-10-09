<?php
/*
* Sidebar
*
* 说明：侧边栏
*/
?>

<div class="about_right right_line">
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	<?php echo "111";?>
    	
	<?php endif; ?>

    <div id="right_sliding">

        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
		<?php echo "2222";?>
        <?php endif; ?>
        
    </div>

	<h2 class="y">联系我们</h2>

		<h3>武汉的卢科技有限公司</h3>
		<b>客服邮箱: </b><a href="mailto:service@nanrenwa.com">service@nanrenwa.com</a><br>
		<b>商务合作: </b><a href="mailto:info@nanrenwa.com">info@nanrenwa.com</a>
		<br><b>客服电话: </b> 4006-822-806     &nbsp;<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=821333650&amp;site=qq&amp;menu=yes"><img src="http://www.nanrenwa.com/_img/qq.gif" alt="QQ" title="QQ在线联系" /></a>


		<br><br>
		<h2>订阅男人袜</h2>
		<form autocomplete="on" accept-charset="utf-8" name="subform" method="post" action="/edm/sub">    <input type="text" placeholder="请输入您的邮箱" class="txtinput lgtblue" name="email">    &nbsp;
		<button class="button" name="submit" id="btn_s" type="submit">订阅</button>    </form>


	<div class="clearit">&nbsp;</div>

	<script>
	$(document).ready(function() {
		$('form[name="subform"]').submit(function() {
			if (/^\w+([\\+\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val()) == false) {
				jAlert('请输入正确的邮箱', '错误');
				return false;
			}

			return true;
		});
	});
	</script>
</div>