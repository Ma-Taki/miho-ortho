<?php

//--------------------------------------
// ビジュアルエディタのフォント変更
//--------------------------------------
add_editor_style('css/editor-style.css');
function custom_editor_settings( $initArray ){
$initArray['body_class'] = 'editor-area'; //オリジナルのクラスを設定する
return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

//--------------------------------------
// bodyにスラッグのクラス名
//--------------------------------------
add_filter( 'body_class', 'add_page_slug_class_name' );
function add_page_slug_class_name( $classes ) {
  if ( is_page() ) {
    $page = get_post( get_the_ID() );
    $classes[] = $page->post_name;
  }
  return $classes;
}

//--------------------------------------
// アイキャッチ画像に対応する
//--------------------------------------
function my_after_setup_theme(){
 // アイキャッチ画像を有効にする
 add_theme_support( 'post-thumbnails' ); 
 // アイキャッチ画像サイズを指定する（横：640px 縦：384）
 // 画像サイズをオーバーした場合は切り抜き
// set_post_thumbnail_size( 640, 384, true ); 
}
add_action( 'after_setup_theme', 'my_after_setup_theme' );



//--------------------------------------
//投稿冒頭のコメントで autop を無効化
//--------------------------------------
function noautop( $content ) {
    if ( strpos( $content, '<!--noautop-->' ) !== false ) {
        remove_filter( 'the_content', 'wpautop' );
        $content = preg_replace( "/\s*\<!--noautop-->\s*(\r\n|\n|\r)?/u", "", $content );
    }
    return $content;
}
add_filter( 'the_content', 'noautop', 1 );



//--------------------------------------
// 相対パス
//--------------------------------------
function delete_domain_from_attachment_url( $url ) {
 
 if ( preg_match( '/^http(s)?:\/\/[^\/\s]+(.*)$/', $url, $match ) ) {
 $url = $match[2];
 }
 return $url;
}
 
add_filter( 'wp_get_attachment_url', 'delete_domain_from_attachment_url' );



//--------------------------------------
// カスタム投稿タイプ
//--------------------------------------
add_action( 'init', 'create_post_type' );
function create_post_type() {
	
//クリニック情報
register_post_type('information', // *1　カスタム投稿タイプ名
	array(
		// *2　ラベル
		'labels' => array( 
			'name' => __('クリニック情報'), 
			'singular_name' => __('クリニック情報'),
		),
		// *3　投稿ページで使用する項目
		'supports' => array(
			'title',
		),
		// *4　その他の設定
		'public' => true,
		'publicly_queryable' => false,
		'show_ui' => true, 
		'menu_position' => 3,
		'query_var' => false,
		'rewrite' => array('slug' => 'news', 'with_front' => false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
	)
);	
	
//トップスライダー
register_post_type('mainImg', // *1　カスタム投稿タイプ名
	array(
		// *2　ラベル
		'labels' => array( 
			'name' => __('トップページ：スライド画像'), 
			'singular_name' => __('トップページ：スライド画像'),
		),
		// *3　投稿ページで使用する項目
		'supports' => array(
			'title',
			'page-attributes'
		),
		// *4　その他の設定
		'public' => true,
		'publicly_queryable' => false,
		'show_ui' => true, 
		'menu_position' => 3,
		'query_var' => false,
		'rewrite' => array('slug' => 'mainImg', 'with_front' => false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
	)
);

//トップナビ
register_post_type('topNav', // *1　カスタム投稿タイプ名
	array(
		// *2　ラベル
		'labels' => array( 
			'name' => __('トップページ：中央部メニュー'), 
			'singular_name' => __('トップページ：中央部メニュー'),
		),
		// *3　投稿ページで使用する項目
		'supports' => array(
			'title',
			'page-attributes'
		),
		// *4　その他の設定
		'public' => true,
		'publicly_queryable' => false,
		'show_ui' => true, 
		'menu_position' => 3,
		'query_var' => false,
		'rewrite' => array('slug' => 'topNav', 'with_front' => false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
	)
);


}

//カスタム投稿の並び順
function twpp_change_sort_order( $query ) {
  if ( is_admin() || ! $query->is_main_query() ) {
    return;
  }
  if ( $query->is_home() ) {
    $query->set( 'order', 'ASC' );
    $query->set( 'orderby', 'title' );
  }
}
add_action( 'pre_get_posts', 'twpp_change_sort_order' );

?>