		
		<ul class="lanmu">
        	<li class="widget widget_recent_entries">
			<h2>家政服务项目</h2>
			<ul>
<?php

$jzfw = array(
  'theme_location'  => 'jzfw-menu',
  'menu'            => '', 
  'container'       => '', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => 'lanmu', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<li>%3$s</li>',  //看不明白
  'depth'           => 0,
  'walker'          => '');

wp_nav_menu($jzfw); 

?>		
				</ul>
			</li>
        	<li class="widget widget_recent_entries">
				<h2>保洁服务项目</h2>
				<ul>
<?php

$bjfw = array(
  'theme_location'  => 'bjfw-menu',
  'menu'            => '', 
  'container'       => '', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => '', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<li>%3$s</li>',
  'depth'           => 0,
  'walker'          => '');

wp_nav_menu($bjfw); 

?>					
				</ul>
			</li>

				<li class="widget widget_recent_entries">		<h2 class="widgettitle">家政服务常识</h2>
		<ul>
					<?php 
					$recent = new WP_Query("cat=3,5,6&showposts=10"); 
					while($recent->have_posts()) : $recent->the_post();
					?>
                    	<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>

				</ul>
		</li>
		</ul>
		<ul>	
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>    	
		<?php endif; ?>
		</ul>
        