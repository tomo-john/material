<?php
// アップロード処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // ファイル情報を取得
  $file = $_FILES['image'];

  // エラーチェック
  if ($file['error'] === UPLOAD_ERR_OK) {
    $upload_dir = 'uploads/';
    $filename = basename($file['name']); // 元のファイル名
    $destination = $upload_dir . $filename;

    // アップロード先ディレクトリがなければ作成
    if (!file_exists($upload_dir)) {
      mkdir($upload_dir, 0777, true);
    }

    // move_uploaded_file() で移動
    if (move_uploaded_file($file['tmp_name'], $destination)) {
      echo "アップロード成功🐶</br>";
      echo "保存先: {$destination}";
    } else {
      echo "ファイルの保存に失敗しました🐶";
    }
  } else {
    echo "ファイルアップロードに失敗しました🐶";
  }
}
