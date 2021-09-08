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
