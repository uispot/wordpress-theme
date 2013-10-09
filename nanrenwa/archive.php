<?php
/**
 * Archive Template
 *
 * 说明：分类和日期存档页文件
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
				<?php if ( have_posts() ) : ?>
				<div class="crumbs">当前位置:<?php ir_breadcrumbs(); ?></div>
				
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/* Include the post format-specific template for the content. If you want to
						 * this in a child theme then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					endwhile;

					//qiye_content_nav( 'nav-below' );
					?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				
				<?php endif; ?>
			</div>

			<?php get_sidebar(); ?>

        </div>
    </div>
	
</div>

<?php get_footer(); // Loads the footer.php template. ?>