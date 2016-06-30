<?php 

/*-------------------------------------------*/
/*	Load CSS & JS
/*-------------------------------------------*/
function lesson_theme_scripts(){

	// 静的HTMLで読み込んでいたCSSを読み込む
	wp_enqueue_style( 'lesson_css_bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
	wp_enqueue_style( 'lesson_css', get_template_directory_uri() . '/css/lesson_style.css', array('lesson_css_bootstrap'), '1.0' );

	// テーマディレクトリ直下にある style.css を出力
	wp_enqueue_style( 'lesson_theme_style', get_stylesheet_uri(), array( 'lesson_css' ),'20160710' );

	// テーマ用のjsを読み込む
	wp_enqueue_script( 'lesson-js-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20160710', true );

}
add_action( 'wp_enqueue_scripts', 'lesson_theme_scripts' );


// add_action( 'wp_print_styles', 'lesson_deregister_styles', 100 );
// function lesson_deregister_styles() {
//     wp_deregister_style('lesson_css');
// }


/*-------------------------------------------*/
/*	Title tag
/*-------------------------------------------*/
function lesson_theme_title() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'lesson_theme_title' );

/*-------------------------------------------*/
/*	Custom menu
/*-------------------------------------------*/
function lesson_theme_custom_menu() {
    register_nav_menus( array( 'Header Navigation' => 'Header Navigation', ) );
}
add_action( 'after_setup_theme', 'lesson_theme_custom_menu' );

/*-------------------------------------------*/
/*	WidgetArea initiate
/*-------------------------------------------*/
function lesson_widgets_init() {
  register_sidebar( array(
    'name' => 'Sidebar',
    'id' => 'sidebar-widget-area',
    'before_widget' => '<aside class="wck_sub_section wck_section %2$s" id="%1$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="wck_sub_section_title">',
    'after_title' => '</h4>',
  ) );
}
add_action( 'widgets_init', 'lesson_widgets_init' );
