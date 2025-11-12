# ファイルアップロード

## Step1: ファイルアップロードの基本構造

HTMLフォームでファイルをアップロードするには、`enctype="multipart/form-data"`を指定。

```
<form action="upload.php" method="post" enctype="multipart/form-data">
  <label>画像ファイルを選択してください:</label><br>
  <input type="file" name="image"><br><br>
  <input type="submit" value="アップロード">
</form>
```

PHP側では、`$_FILES`スーパーグローバル変数で受け取る。

```
<?php
// アップロードされたファイルを情報を確認
print_r($_FILES);
```

こんな配列が得られる。

```
Array ( 
  [image] => Array ( 
    [name] => dog.png                         // 元のファイル名 
    [full_path] => dog.png                    // 
    [type] => image/png                       // MIMEタイプ
    [tmp_name] => /tmp/phpejimq67cta4k8GKkelI // 一時保存されたファイルパス
    [error] => 0                              // エラーコード(0は成功)
    [size] => 3112                            // ファイルサイズ(バイト)
  ) 
)
```

## Step2: ファイル保存

PHPではアップロードされたファイルは一時フォルダに置かれる。

必要なディレクトリに移動させる必要がある。

```
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
```

