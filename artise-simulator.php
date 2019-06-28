<?php
/**
* @package TileSimulator
*/
/*
Plugin Name: Tile Simulator
Description: Tile Simulator is a custom plugin for Lili Cement Tiles. The simulator allows users to customize tile colors, visualize available tiles in different environments and export tiles for purchase.
Author: Candice Canoso
Version: 2.0
Author URI: http://www.candicecanoso.com/
*/

defined( 'ABSPATH' ) or die ( 'I\'m a plugin! Please don\'t access me directly!' );


define( 'GOOGLE_RECAPTCHA_KEY', '6LdzYj8UAAAAAJx5OaeksLg9InYV0xblKW3XGDki' );
define( 'GOOGLE_RECAPTCHA_SECRET', '6LdzYj8UAAAAABLv4uxjKShf5niAZKxtoTCAbluA' );

define( 'BORDER_CATEGORY_SLUG', 'border-collection' );



function admin_style(  ){
	wp_enqueue_style( 'artise-simulator-admin-style', plugins_url( 'assets/css/admin.css', __FILE__ ) );

	wp_enqueue_script( 'block-ui', plugins_url( 'artise-simulator/assets/js/jquery.blockUI.js' ), array( 'jquery' ) );
	
}
add_action( 'admin_enqueue_scripts', 'admin_style' );


function register_styles(  ){
	wp_register_style( 'fonts', 'https://fonts.googleapis.com/css?family=Raleway:300,400,700' );
}

add_action( 'init', 'register_styles' );



function enqueue_global_scripts(  ){
	wp_enqueue_style( 'fonts' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_global_scripts' );



require_once( 'includes/includes.php' );


require_once( 'pages.php' );


?>