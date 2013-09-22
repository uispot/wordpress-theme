<?php
add_filter( 'show_admin_bar', '__return_false' );
add_theme_support( 'nav-menus' );
add_theme_support( 'post-thumbnails' );
register_nav_menus(array('header-menu' => __( '顶部自定义菜单' )));
register_nav_menus(array('leftbar-menu' => __( '左侧推荐类别菜单项' )));
register_nav_menus(array('1-menu' => __( '商家直达菜单项' )));
register_nav_menus(array('2-menu' => __( '热门分类菜单项' )));
register_nav_menus(array('3-menu' => __( '海淘推荐菜单项' )));
?>