# 画像の保存

## publicディレクトリ

Webアプリを公開した時、閲覧者はpublicディレクトリの中にアクセスができる。

しかし他のディレクトリにはアクセスすることはできない。

ブラウザに反映させるcssやjavascript、画像ファイルはpublicディレクトリに入れておかなければならない。

ところが、画像ファイルは`storage`ディレクトリに保存することになっている。

`storage`に保存した画像を`public`を通じてアクセスするために、`public`に`storage`のシンボリックリンクを作る必要がある。

- `public`: 表示用ディレクトリ
- `storage`: 保存用ディレクトリ

下記コマンドでシンボリックリンクを作成:

```
php artisan storage:link
```

これで`public/storage`という名前のショートカットが作られ、中身が`storage/app/public`と繋がる。

- 保存先: `storage/app/public/images`: (安全な金庫)
- URL: `https://example.com/storage/images/xxx.jpg`: (ショートカット経由で公開)

## コントローラの処理の一例

```php
<?php
if (request('image')) {
    // 1. 元のファイル名を取得 (例: dog.jpg)
    $original = request()->file('image')->getClientOriginalName();
    
    // 2. ファイル名が重複しないよう、現在時刻をくっつける (例: 20260120_083015_dog.jpg)
    $name = date('Ymd_His') . '_' . $original;
    
    // 3. 画像を移動させる
    // ここでの 'storage/images' は、実は public/storage/images を指しています
    request()->file('image')->move('storage/images', $name);
    
    // 4. DBには「ファイル名」だけを保存する
    $post->image = $name;
}
```

