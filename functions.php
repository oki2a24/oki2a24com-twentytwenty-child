<?php
/**
 * Oki2a24.com, Twenty Twenty Child の関数と定義
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oki2a24.com,_Twenty_Twenty_Child
 * @since 1.0.0
 */

/**
 * スタイルを登録し、エンキューします。
 */
function theme_enqueue_styles() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), $theme_version );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
