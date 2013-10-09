<?php
add_filter( 'show_admin_bar', '__return_false' ); //禁用admin_bar

add_theme_support( 'nav-menus' );
add_theme_support( 'post-thumbnails' );

if(function_exists('register_nav_menus')){  
	register_nav_menus( array( 
		'header-menu' => __( '导航自定义菜单' ), 
		'footer-menu' => __( '页角自定义菜单' ), 
		'sider-menu' => __('侧边栏菜单') 
		) 
	); 
}

if ( function_exists('register_sidebar') ){
    register_sidebar(array(
		'name'=>'侧边栏',
        'before_widget' => '<div class="rightBox widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="titleStyle">',
        'after_title' => '</div>',
    ));
	
	}
	
include_once (TEMPLATEPATH . "/functions/theme-options.php");
include_once (TEMPLATEPATH . "/functions/optionpanel.php");

//文章样式
add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

//当前位置
function ir_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $name = get_bloginfo('title'); //text for the 'Home' link
  $currentBefore = '<span>';
  $currentAfter = '</span>';	
	
  if (is_home() || is_front_page()) { 
  echo '<a href="' . $home . '">' . $name . '</a>';
  
  } else {
	  if ( !is_home() && !is_front_page() || is_paged() ) {
	 
		
	 
		global $post;
		$home = get_bloginfo('url');
		echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
	 
		if ( is_category() ) {
		  global $wp_query;
		  $cat_obj = $wp_query->get_queried_object();
		  $thisCat = $cat_obj->term_id;
		  $thisCat = get_category($thisCat);
		  $parentCat = get_category($thisCat->parent);
		  if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		  echo $currentBefore;
		  single_cat_title();
		  echo $currentAfter;
	 
		} elseif ( is_day() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		  echo $currentBefore . get_the_time('d') . $currentAfter;
	 
		} elseif ( is_month() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo $currentBefore . get_the_time('F') . $currentAfter;
	 
		} elseif ( is_year() ) {
		  echo $currentBefore . get_the_time('Y') . $currentAfter;
	 
		} elseif ( is_single() ) {
		  $cat = get_the_category(); $cat = $cat[0];
		  echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		  echo $currentBefore;
		  the_title();
		  echo $currentAfter;
	 
		} elseif ( is_page() && !$post->post_parent ) {
		  echo $currentBefore;
		  the_title();
		  echo $currentAfter;
	 
		} elseif ( is_page() && $post->post_parent ) {
		  $parent_id  = $post->post_parent;
		  $breadcrumbs = array();
		  while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id  = $page->post_parent;
		  }
		  $breadcrumbs = array_reverse($breadcrumbs);
		  foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
		  echo $currentBefore;
		  the_title();
		  echo $currentAfter;
	 
		} elseif ( is_search() ) {
		  echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
	 
		} elseif ( is_tag() ) {
		  echo $currentBefore . 'Posts tagged &#39;';
		  single_tag_title();
		  echo '&#39;' . $currentAfter;
	 
		} elseif ( is_author() ) {
		   global $author;
		  $userdata = get_userdata($author);
		  echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
	 
		} elseif ( is_404() ) {
		  echo $currentBefore . 'Error 404' . $currentAfter;
		}
	 
		if ( get_query_var('paged') ) {
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		  echo __('Page') . ' ' . get_query_var('paged');
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
	 

	 
	  }
  }

}
?>