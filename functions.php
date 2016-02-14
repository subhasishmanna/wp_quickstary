<?php 

function test_themecustom_theme_setup() {
	add_theme_support('menus' );
}
add_action( 'after_setup_theme', 'test_themecustom_theme_setup' );

/**
 * Proper way to enqueue scripts and styles
 */
function testtheme_theme_name_scripts() {
     wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'themestyle', get_template_directory_uri() . '/style.css', array(),'1.0.0', 'all' );
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );

	}
add_action( 'wp_enqueue_scripts', 'testtheme_theme_name_scripts' );
//Activate menu
add_action( 'after_setup_theme', 'testtheme_register_my_menu' );
function testtheme_register_my_menu() {
  register_nav_menu( 'primary', 'Primary Navigation Menu' );
}