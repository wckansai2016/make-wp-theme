<?php 

function lesson_theme_scripts(){
	// テーマディレクトリにある style.css を出力
	wp_enqueue_style( 'lesson_theme_style', get_stylesheet_uri() );

	// テーマ用のCSSを読み込む
	wp_enqueue_style( 'lesson-css-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
	wp_enqueue_style( 'lesson-css', get_template_directory_uri() . '/css/wck_style.css', array('lesson-css-bootstrap'), '1.0' );

	// テーマ用のjsを読み込む
	wp_enqueue_script( 'lesson-js-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20160710', true );
}
add_action( 'wp_enqueue_scripts', 'lesson_theme_scripts' );


function lesson_theme_title() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'lesson_theme_title' );


function lesson_theme_custom_menu() {
    register_nav_menus( array( 'Header Navigation' => 'Header Navigation', ) );
}
add_action( 'after_setup_theme', 'lesson_theme_custom_menu' );
