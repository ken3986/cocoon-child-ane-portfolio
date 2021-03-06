<?php //子テーマ用関数
if ( !defined( 'ABSPATH' ) ) exit;

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

//以下に子テーマ用の関数を書く

// 更新の確認
require 'lib/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://github.com/ken3986/cocoon-child-ane-portfolio',
  __FILE__,
  'cocoon-child-ane-portfolio'
);
$myUpdateChecker -> getVcsApi() -> enableReleaseAssets();


/* 投稿アーカイブページの作成 */
function post_has_archive( $args, $post_type ) {

	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'works'; //任意のスラッグ名
	}
	return $args;

}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

// 画像の自動リサイズ設定を2560px→無制限に変更
add_filter( 'big_image_size_threshold', '__return_false' );
