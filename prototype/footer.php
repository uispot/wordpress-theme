<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 *
 * @package Prototype
 * @subpackage Template
 */
?>
				<div style="width:430px; float:right">
					<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
				
					<?php get_sidebar( 'secondary' ); // Loads the sidebar-secondary.php template. ?>
					<?php do_atomic( 'close_main' ); // prototype_close_main ?>
					<div class="clear"></div>
				</div>
			</div><!-- .wrap -->

		</div><!-- #main -->

		<?php do_atomic( 'after_main' ); // prototype_after_main ?>

		

		<?php do_atomic( 'before_footer' ); // prototype_before_footer ?>

<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>

		<div id="footer">
			
			<?php get_template_part( 'menu', 'subsidiary' ); // Loads the menu-subsidiary.php template. ?>
			
			<?php do_atomic( 'open_footer' ); // prototype_open_footer ?>

			<div class="wrap">
				<?php echo apply_atomic_shortcode( 'footer_content', hybrid_get_setting( 'footer_insert' ) ); ?>

				<?php do_atomic( 'footer' ); // prototype_footer ?>

			</div><!-- .wrap -->

			<?php do_atomic( 'close_footer' ); // prototype_close_footer ?>
<a href="http://www.uispot.com/sitemap.html">网站地图</a>
<!-- 51.la -->
<script language="javascript" type="text/javascript" src="http://js.users.51.la/3234015.js"></script>
<noscript><a href="http://www.51.la/?3234015" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/3234015.asp" style="border:none" /></a></noscript>


		</div><!-- #footer -->

		<?php do_atomic( 'after_footer' ); // prototype_after_footer ?>

	</div><!-- #container -->

	<?php do_atomic( 'close_body' ); // prototype_close_body ?>

	<?php wp_footer(); // wp_footer ?>


<!-- 钓鱼岛 -->
<div style="left:0px; bottom:20px; position:fixed;_position:absolute;_top: expression(documentElement.scrollTop + documentElement.clientHeight-this.offsetHeight); overflow:visible;"><a target="_blank" href="http://weibo.com/uispot"><img src="/wp-content/uploads/pic/diaoyudao.png"></a></div>
<img alt="Home" src="http://turbo.themezilla.com/scope/files/2012/02/Design_Museum_A4-A5-A6_bg.jpg" id="background" class="bgwidth">

<!-- 浮动 -->
<script type="text/javascript">
var oDaohang;

window.onscroll = function() {
        var st;
        if(document.documentElement.scrollTop){
            st = document.documentElement.scrollTop;
        }else{
            st = document.body.scrollTop
        }

        oDaohang = document.getElementById("fdNav");

        if(st >= 160) {
            oDaohang.className = "place fd-nav";
        }else{
            oDaohang.className = 'place';
        }
}
        
</script>

<script type="text/javascript">
	jquery(".wp-tag-cloud a").append("<span></span>");
	jquery(".wp-tag-cloud a").find("span").html(function(){
		var s = jquery(this).parent().attr("title").replace(/[^0-9]/ig,"");
		return "["+parselnt(s)+"]";
	})

</script>
</body>
</html>