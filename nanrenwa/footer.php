<div class="footer">
<?php

$defaults = array(
  'theme_location'  => 'footer-menu',
  'menu'            => '', 
  'container'       => 'ul', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => 'menu', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul id="footer" class="header-menu">%3$s</ul>',
  'depth'           => 0,
  'walker'          => '');

wp_nav_menu($defaults); 

?>

	<p>
		&copy; 2013 DaDongZao.com        &nbsp; • &nbsp; <?php echo get_option("ir_sm_mii"); ?>			&nbsp; • &nbsp; 服务专线: <?php echo get_option("ir_sm_fwzx"); ?>	 &nbsp;
		<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo get_option("ir_sm_kfqq"); ?>&amp;site=qq&amp;menu=yes" target="_blank"><img width="23" height="16" title="在线客服" alt="在线客服" src="http://www.nanrenwa.com/_img/qq.gif"></a>			
		<br>
	</p>

	<p><a rel="nofollow" href="http://www.51honest.org/wscredit/detail.credit?action=preLevel&amp;credcode=NO.20000038101" target="_blank"><img src="http://www.nanrenwa.com/_img/logos/aaa.gif" width="128" height="44" alt="信用评价 AAA 级" /></a><a rel="nofollow" href="http://weibo.com/nanrenwa" target="_blank" title="男人袜官方微博"><img src="http://www.nanrenwa.com/_img/logos/weibo.v2.png" width="96" height="42" alt="男人袜官方微博" /></a></p>

	<div id="footer_logos">
		<ul>
			<li><img width="129" height="129" alt="男人袜微信" src="http://www.nanrenwa.com/_img/mail/wx.129.png"></li>
		</ul>
		<?php echo get_option("ir_sm_tongji"); ?>
	</div>

</div>
</div>
</body>
</html>