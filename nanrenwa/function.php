<?php
add_filter('show_admin_bar','__return_false'); //禁用admin_bar

if(function_exists('register_sidebar'))
	register_sidebar();

if(function_exists('register_nav_menus')){  
	register_nav_menus( array( 
		'header-menu' => __( '导航自定义菜单' ), 
		'footer-menu' => __( '页角自定义菜单' ), 
		'sider-menu' => __('侧边栏菜单') 
		) 
	); 
}

?>