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

/**
 * More タグで URL 末端に付く #more-xxxx を削除します。
 *
 * @param string $link .more-link アンカー URL .
 * @return string $link
 */
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

/**
 * デフォルトのサイトアイコンを設定します。
 * カスタマイザーで設定された場合はそちらを使用します。
 */
function filter_site_icon_meta_tags() {
	if ( has_site_icon() ) {
			return;
	}
		$url = get_stylesheet_directory_uri();
		// 出力される HTML ソースコードを見やすくするめに、最後に空白行を設置
		echo <<<EOT
<link rel="icon" href="{$url}/assets/images/cropped-site_icon-32x32.jpg" sizes="32x32" />
<link rel="icon" href="{$url}/assets/images/cropped-site_icon-192x192.jpg" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="{$url}/assets/images/cropped-site_icon-180x180.jpg" />
<meta name="msapplication-TileImage" content="{$url}/assets/images/cropped-site_icon-270x270.jpg" />
EOT;
}
add_filter( 'wp_head', 'filter_site_icon_meta_tags' );
