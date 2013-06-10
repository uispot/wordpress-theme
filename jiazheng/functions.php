<?php

add_filter( 'show_admin_bar', '__return_false' );//禁用admin_bar


if ( function_exists('register_sidebar') )
    register_sidebar();


add_theme_support( 'nav-menus' );
add_theme_support( 'post-thumbnails' );

register_nav_menus(
	array(
		'header-menu' => __( '网站头部导航' ),
		'jzfw-menu' => __( '家政服务类别菜单项' ),
		'bjfw-menu' => __( '保洁服务类别菜单项' ),
		)
	);

/* 定义 外观 → 小工具 */
/*if ( function_exists('register_sidebar') ){
    register_sidebar(array(
		'name'=>'sidebar 侧边栏',
        'before_widget' => '<div class="rightBox widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="titleStyle">',
        'after_title' => '</div>',
    ));
}*/

include_once (TEMPLATEPATH . "/functions/theme-options.php");
include_once (TEMPLATEPATH . "/functions/optionpanel.php");

 
function getImage($num) {
	global $more,$post;
	$more = 1;
	$content = get_the_content();
	$count = substr_count($content, '<img');
	$start = 0;
	
	for($i=1;$i<=$count;$i++) {
		$imgBeg = strpos($content, '<img', $start);
		$post = substr($content, $imgBeg);
		$imgEnd = strpos($post, '>');
		$postOutput = substr($post, 0, $imgEnd+1);
		$image[$i] = $postOutput;
		$start=$imgEnd+1; 

		$cleanF = strpos($image[$num],'src="')+5;
		$cleanB = strpos($image[$num],'"',$cleanF)-$cleanF;
		$imgThumb = substr($image[$num],$cleanF,$cleanB);

	}
	
	if(stristr($image[$num],'<img')) { return $imgThumb; }
	$more = 0;
}

function catch_that_image() {
	global $post; 
	$first_img = getImage('1'); 
	if(empty($first_img)){ 
	$first_img = get_bloginfo('template_url'). '/images/default-thumb.jpg';
	}
	return $first_img;
}

function ir_timthumb($array,$quality,$zc) {
	global $post; 
	$sa = get_bloginfo('template_url').'/timthumb.php?src='.catch_that_image();
	if ( isset($array) ) { $sa = $sa."&w=".$array[0]."&h=".$array[1]; }		
	if ( isset($quality) ) { $sa = $sa."&q=$quality"; }	
	if ( isset($zc) ) {	$sa = $sa."&zc=$zc";}
	return $sa;
}


function post_thumbnail( $width,$height ){ 
    global $post; 
    if( has_post_thumbnail() ){ //有缩略图，则显示缩略图 
        $timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); 
        $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" />'; 
        echo $post_timthumb; 
        } else{ 
            $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.catch_that_image().'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" />'; 
			        echo $post_timthumb; 
        } 
} 

function post_thumbnail_src( $width,$height = '' ){ 
    global $post; 
    if( has_post_thumbnail() ){ //有缩略图，则显示缩略图 
        $timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); 
        $post_timthumb = get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1'; 
        echo $post_timthumb; 
        } else{ 
            $post_timthumb = get_bloginfo("template_url").'/timthumb.php?src='.catch_that_image().'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1'; 
			        echo $post_timthumb; 
        } 
} 


function pagenavi( $p = 2 ) {
	if ( is_singular() ) return;
	global $wp_query, $paged;
	$max_page = $wp_query->max_num_pages;
	if ( $max_page == 1 ) return;
	if ( empty( $paged ) ) $paged = 1;
	echo '<span class="page-numbers">' . $paged . ' / ' . $max_page . ' </span> ';
	if ( $paged > 1 ) p_link( $paged - 1, '上一页', '上一页' );
	if ( $paged > $p + 1 ) p_link( 1, '最前页' );
	if ( $paged > $p + 2 ) echo '<a>...</a>';
	for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
	if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : p_link( $i );
	}
	if ( $paged < $max_page - $p - 1 ) echo '<span class="page-numbers">...</span>';
	if ( $paged < $max_page - $p ) p_link( $max_page, '最末页' );
	if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '下一页' );
	//echo '<span>共['.$max_page.']页</span>';
}

function p_link( $i, $title = '', $linktype = '' ) {
	if ( $title == '' ) $title = "第 {$i} 页";
	if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }
	echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a> ";
}

function ilover_year() {
	global $wpdb;
	$post_datetimes = $wpdb->get_row($wpdb->prepare("SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970"));
	if ($post_datetimes) {
			$firstpost_year = $post_datetimes->firstyear;
			$lastpost_year = $post_datetimes->lastyear;

			$copyright = __('Copyright &copy; ') . $firstpost_year;
			if($firstpost_year != $lastpost_year) {
					$copyright .= '-'. $lastpost_year;
			}
			$copyright .= ' ';

			echo $copyright;
	}

}

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

function get_info($name){
	global $post;
    $ilover = get_post_meta($post->ID, $name.'_value', true); 
	echo $ilover; 
	}	


function get_meta($name){
	global $post;
    $ilover = get_post_meta($post->ID, $name, true); 
	return $ilover; 
	}	


$new_meta_boxes =
array(
    "xingming" => array(
        "name" => "xingzhi",
        "std" => "",
        "title" => "工作性质(就是原站标题后面的红色字)"),

    "age" => array(
        "name" => "age",
        "std" => "",
        "title" => "年龄"),

    "minzu" => array(
        "name" => "minzu",
        "std" => "",
        "title" => "民族"),
		
	"jiguan" => array(
        "name" => "jiguan",
        "std" => "",
        "title" => "籍贯"),
	
	"xueli" => array(
        "name" => "xueli",
        "std" => "",
        "title" => "学历"),
		
	"状态" => array(
        "name" => "zhuangtai",
        "std" => "",
        "title" => "状态(是否聘用)"),
);

function new_meta_boxes() {
    global $post, $new_meta_boxes;

    foreach($new_meta_boxes as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		echo "<div><ul>";
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
		echo '<li>';
        echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

        // 自定义字段标题
        echo'<h4>'.$meta_box['title'].'</h4>';

        // 自定义字段输入框
        echo '<textarea cols="60" rows="3" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea></li>';
    }
}

function create_meta_box() {
    global $theme_name;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '个人资料信息', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
}

function save_postdata( $post_id ) {
    global $post, $new_meta_boxes;

    foreach($new_meta_boxes as $meta_box) {
        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        } 
        else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }

        $data = $_POST[$meta_box['name'].'_value'];

        if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
            add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
            update_post_meta($post_id, $meta_box['name'].'_value', $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
    }
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');



function ilover_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
   global $commentcount;$page = ( !empty($in_comment_loop) ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args );$cpp=get_option('comments_per_page');if(!$commentcount) {if ($page > 1) {$commentcount = $cpp * ($page - 1);} else {$commentcount = 0;}}
?>
			<div id="comment-<?php comment_ID(); ?>" class="comment odd alt thread-odd thread-alt depth-1 self-clear p3comment">
				<div class="comment-top">
                	<span class="comment-author">
                        <a href="<?php comment_author_link(); ?>" rel="external nofollow" class="url"><?php comment_author(); ?></a>
                        <span> - </span>
                    </span>
                    <span class="comment-time"><?php comment_time('Y-m-d G:H'); ?></span>
                </div> 		
				<div class="comment-text">
				<?php comment_text(); ?>
				</div>
            </div>
<?php
} 
class description_walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
        $class_names = $value = '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
 
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
        $output .= $indent . '<li ' . $id . $value . $class_names .'>';
 
        //$prepend = '<strong>';
        //$append = '</strong>';
        $description  = ! empty( $item->attr_title ) ? '<span>' . esc_attr( $item->attr_title ) . '</span>' : '';
 
        if($depth != 0) {
            $description = $append = $prepend = "";
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        }
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
        $item_output = $args->before;
        $item_output .= '<a '. $attributes .'>';
        $item_output .= $args->link_before . $prepend . apply_filters( 'the_title', $item->title, $item->ID ) . $append;
        $item_output .= $description . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
  
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}?>