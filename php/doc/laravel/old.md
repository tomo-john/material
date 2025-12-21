# old()の使い方

- PHPのメソッドではない
- Laravelが用意しているグローバルヘルパー関数

```php
<?php
old('name', $dog->name)
```

- 直前のリクエストの`old('name')`があればそれを返す
- なければ第二引数(`$dog->name`)を返す

ユーザーの入力した値(old) => DBの値(モデル) => 何もなければnull

## old()の仕組み

### バリデーション失敗時

```php
<?php
$request->validate([...]);
```

Laravelは自動で:

- 入力値をセッションに保存
- リダイレクト

### 次の画面表示時

```php
<?php
old('name')
```

Laravelが:

- セッションから入力値を取り出す
- 表示する

なので自分でsessionに入れていないのに復元できる。

## old()が使える条件

- リダイレクトが必要
- 同じリクエスト内では使えない
- 主に、`store / update` => `redirect()`の流れで有効

