# URLジェネレーター

アプリケーション内の任意のURLを簡単に生成・操作するための機能群。

URLやルートに関するヘルパー関数(`url()`, `route()`, `asset()`など)は、`URL Generator`サービスを呼び出すショートカットとして機能している。

## url($path = null)

生のURLパスを生成する。

単純にプロジェクトのベースURL(例: `http://localhost:8000`)の後に、引数で渡されたパスを結合するだけの機能。

`url('dogs')` : `http://localhost:8000/dogs`のような完全なURLが生成される。

1番シンプルで、静的なリンクやコントローラを使わないページへのリンクに最適。

ただし、ルート定義を変更しても自動でURLを修正はしてくれない。

## route($name, $parameters = [])

Laravelのルーティング設定(`routes/web.php`)に定義された名前に基づいてURLを逆引きして生成する。

`route('dogs.edit', $dog)` : `dogs/1/edit`のようなURLを生成してくれる。

URLパスを変更しても自動で新しいパスに追従してくれるので保守性が高い。

ルートに必ず名前を付けておく必要がある。

## その他の関連メソッド

### asset()

Viewで使う :dog:

Publicフォルダ内のファイルへのURLを生成:

```
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<img src="{{ asset('images/dog.png') }}">
```

こんなURLが生成される:

```
https://xxxxx/css/app.css
https://xxxxx/images/dog.png
```

### to_route

Controllerで使う :dog:

Laravle9以降で使えるシンプルなリダイレクト機能:

```
return to_route('dogs.index');
```

パラメータあり:

```
return to_route('dogs.show', $dog);
```

フラッシュメッセージもOK:

```
return to_route('dogs.index')->with('success', '登録しました！');
```

- `return to_route('dogs.index');`
- `return redirect()->route('dogs.index')`

=> どちらも同じ

