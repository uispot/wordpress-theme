<?php
/**
 * Single Template
 *
 * 说明：日志单页文件
 */

get_header(); // Loads the header.php template. ?>

<div class="container">
	<h1 id="about">大冬枣网DaDongZao<!-- / {dede:field.title/}--></h1>
	
	<div class="about_wrap" style="border-top-left-radius: 8px; border-top-right-radius: 8px;">
		<div class="about_padding">

            <?php
				$defaults = array(
				  'theme_location'  => 'footer-menu',
				  'menu'            => '', 
				  'container'       => 'div', 
				  'container_class' => 'about_nav', 
				  'container_id'    => '',
				  'menu_class'      => 'menu', 
				  'menu_id'         => '',
				  'echo'            => true,
				  'fallback_cb'     => 'wp_page_menu',
				  'before'          => '',
				  'after'           => '',
				  'link_before'     => '',
				  'link_after'      => '',
				  'items_wrap'      => '<ul id=”%1$s”>%3$s</ul><div class="clearit"></div>',
				  'depth'           => 0,
				  'walker'          => '');
				wp_nav_menu($defaults); 
				?>

        	<div class="about_left">
				<div class="crumbs">当前位置:<?php ir_breadcrumbs(); ?></div>
				<?php while(have_posts() ) : the_post(); ?>
					<?php get_template_part('content' , get_post_format() ); ?>
					
					<?php comments_template('', true); ?>
				<?php endwhile; //end of the loop. ?>
			</div>

			<?php get_sidebar();?>

        </div>
    </div>
	
</div>		

<?php get_footer(); // Loads the footer.php template. ?>