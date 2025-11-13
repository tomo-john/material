# HTTPファイルアップロード変数

`$_FILES`はHTTP POSTメソッドでアップロードされた項目の連想配列。

## HTMLフォームのルール

```
<form action="xxx.php" method="post" enctype="multipart/form-data">
  <label>ファイルを選択:</label>
  <input type="hidden" name="MAX_FILE_SIZE" value="20000">
  <input type="file" name="file">
  <input type="submit" value="ファイル送信">
</form>
```

`<form>`タグで`enctype="multipart/form-data"`は必ず指定する必要あり。

`<input>`タグの`type="hidden"`、`name="MAX_FILE_SIZE"`は`<input type="file" name="file">`より先に書く。

=> 値はバイト数で指定

上記のHTMLフォームでアップロードされたファイルの情報であれば、`$_FILES['file']`に格納される。

- `$_FILES['file']['name']`: 元ファイル名
- `$_FILES['file']['full_path']`: ブラウザからアップロードされたファイルのフルパス
- `$_FILES['file']['type']`: ファイルのMIME型
- `$_FILES['file']['tmp_name']`: アップロードファイルがサーバー上で保存される一時ファイルの名前
- `$_FILES['file']['error']`: ファイルに関するエラーコード
- `$_FILES['file']['size']`: ファイルのバイト単位のサイズ

### エラーコード

| 定数名                  | 値  | 意味                                       |
|-------------------------|-----|--------------------------------------------|
| `UPLOAD_ERR_OK`         |  0  | 成功(エラーなし)                           |
| `UPLOAD_ERR_INI_SIZE`   |  1  | php.iniのupload_max_filesizeを超過         |
| `UPLOAD_ERR_FORM_SIZE`  |  2  | HTMLフォームで指定したMAX_FILE_SIZEを超過  |
| `UPLOAD_ERR_PARTIAL`    |  3  | ファイルが一部しかアップロードされなかった |
| `UPLOAD_ERR_NO_FILE`    |  4  | ファイルが選択されなかった                 |
| `UPLOAD_ERR_NO_TMP_DIR` |  6  | 一時フォルダがない(サーバ設定問題)         |
| `UPLOAD_ERR_CANT_WRITE` |  7  | ディスクへの書き込みに失敗                 |
| `UPLOAD_ERR_EXTENSION`  |  8  | PHP拡張モジュールによって中止された        |

## move_uploaded_file()

アップロードされた一時ファイル専用の関数。

サーバーの一時ディレクトリに保存されたアップロードファイルを任意の場所に移動する。

```
move_uploaded_file($_FILES['file']['tmp_name'], '/uploads/dog.png');
```

