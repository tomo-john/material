# ページネーション

Postのindexにページネーションを適用してみる。

```php
<?php
public function index()
{
    // $posts = Post::all();
    $posts = Post::paginate(10);
    return view('post.index', compact('posts'));
}
```

`$posts = Post::paginate(10)`に変更。

=> 1ページごとに10個のpostデータを表示できる

ビュー側の処理: 

```blade
{{ $posts->links() }}
```

=> 任意の場所に上記を追加

## ページネーションのスタイルをカスタマイズ

下記コマンドを実行:

```bash
php artisan vendor:publish --tag=laravel-pagination
```

Laravelが内部で使っているページネーション用Bladeを`resources/views`にコピーしてくれる。

```text
resources/views/vendor/pagination/
├── bootstrap-4.blade.php
├── bootstrap-5.blade.php
├── simple-tailwind.blade.php
└── tailwind.blade.php
```

などが作成され、これらが編集してOKなファイル。

`resources/views/vendor/pagination/tailwind.blade.php`などを編集することでページネーションをカスタマイズすることができる。

## vendorディレクトリにファイルは直接触らない

`vendor`ディレクトリにはライブラリなどのさまざまな情報が格納されている。

プロジェクトを本番環境に反映させるときにはvendor内のファイルを持っていかない。

本番環境では、`composer.lock`ファイルの情報に従い、ライブラリの大元から必要なファイルをインストールする。

=> 中身は触ってもいいけど、コピーしたものを触ってね🐶という考え

=> 同じ名前のメソッドなどをプロジェクトディレクトリにコピーしてオーバーライドする

